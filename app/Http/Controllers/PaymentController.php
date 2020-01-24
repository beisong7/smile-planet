<?php

namespace App\Http\Controllers;

use App\Client;
use App\Detail;
use App\Payment;
use App\Pform;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function prepPayment($link, $user_key){
        $client = Client::where('unid', $user_key)->first();
        if(!empty($client)){
            $course = Detail::where('link', $link)->first();
            if(!empty($course)){
                $form = Pform::where('email', $client->email)->where('detail_link', $link)->where('active', true)->first();
//                    return [$client, $item, $form];

                if(!empty($form)){
                    return view('v2.page.forms.prep_pay')
                        ->with('client', $client)
                        ->with('course', $course)
                        ->with('form', $form);
                }
            }
        }

        return redirect()->route('home');
    }

    public function redirectToGateway(Request $request){
        //todo create transaction id and add to request from front
//        return $request->all();
        $payment = new Payment();
        $payment->unid = uniqid('_PAY', false);
        $payment->reference = $request->input('reference');
        $payment->kobo =  $request->input('amount');
        $payment->amount =  $request->input('amount');
        $payment->success = false;
        $payment->link = $request->input('link');
        $payment->email = $request->input('email');
        $payment->status = "Attempting";
        $payment->start = time();
        $payment->client_key = $request->input('client_key');
        $payment->save();
        try{

            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch (\Exception $e){
            return back()->withErrors(array('errors'=>'Oops! Unable to complete. Please try again shortly.'));
        }
    }

    public function handleGatewayCallback(){

        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);

//        //handle all required callbacks
        $email = $paymentDetails['data']['customer']['email'];
        $status = $paymentDetails['data']['status'];
        $response = "failed";
        $response = $paymentDetails['data']["gateway_response"];
        $dclient = Client::where('email', $email)->first();
//
        $reference = $paymentDetails['data']["reference"];
        $payment = Payment::where('reference', $reference)->first();
//
//
        if($status==="success"){

            $payment->status = $status;
            $payment->ends = time();
            $payment->gateway_message = $response;

            $payment->update();

            return redirect()->route('payment.result', ['payment'=>$response, 'unid'=>$dclient->unid, 'link'=>$payment->link]);
        }else{

            $payment->status = $status;
            $payment->ends = time();
            $payment->gateway_message = $response;

            $payment->update();

//            return redirect()->route('payment.result', ['payment'=>'failed', 'unid'=>$dclient->unid]);

        }
//

        return redirect()->route('payment.result', ['payment'=>$response, 'unid'=>$dclient->unid]);

        //

    }

    public function paystackResponse(Request $request){

        return $request->all();

        $status = $request->input('payment');

        $link = $request->input('link');
        $unid = $request->input('unid');
        $client = Client::where('unid', $unid)->first();
        $form = Pform::where('email', $client->email)->where('detail_link',$link)->first();
        $course = Detail::where('link',$link)->first();
        $message = "";
        if($status==='success'){
            $message .= "Congratulations! Your payment was successful. Find receipts in mailbox";
        }else{
            $message .= "Oops! Your payment request failed. Kindly try again.";
        }

        return view('v2.page.forms.pay_complete')
            ->with('client', $client)
            ->with('form', $form)
            ->with('course', $course)
            ->with('message', $message);
    }
}
