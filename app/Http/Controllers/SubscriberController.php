<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController as Mailus;

class SubscriberController extends Controller
{
    public function subscribe(Request $request){


        $email = $request->all();
        //check for the email

        $email = $email['email'];

        $exist = Subscriber::where('email', $email)->first();

        if(empty($email)){
            return back()->withErrors(array('message'=>'Please enter a valid email address : '.$email));
        }else{
            if(count($exist) > 0){
                return $this->sendMail($email, $exist->control_code);
            }
            else{
                $data['email'] = $email;
                $data['count'] = 0;
                $data['last_receive'] = time();
                $code = $this->makeSalt();
                $data['control_code'] = $code;

                if(Subscriber::create($data)){
                    return $this->sendMail($email, $code);
                }else{
                    return redirect(route('home.sponsorship'))->withErrors(array('message'=>'Unable to Complete Request. Please Try Again Later. Thank you.'));
                }
            }
        }



    }

    public function makeSalt(){
        $charset = 'qa*%MJU74CD+!_@)EedcjmXZAQ0zxTRs($kiolp19YHFV28vfrWSwPtgbnhNBGyOKIu365&^';
        $saltLen = 16;
        $randSalt = "";
        for ($i = 0; $i < $saltLen; $i++){
            $randSalt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }

        return $randSalt;
    }

    public function sendMail($email, $code){

//      send mail to user

        $subject = "Thanks for Subscribing to smileplanetef.org.";
        $unsub = "https://smileplanetef.org/subscribe_undo/$code/$email";
//        $unsub = "smileplanetef.org/subscribe_undo/' . $code . '/'.$email";

        $htmlContent = "
        <p>Thank you for Subscribing to smileplanetef.org newsletters!</p>
                            <table cellspacing='0' style=' width: 100%; height: 200px;'>

                                <tr style='background-color: #e0e0e0;'>
                                    <th>From:</th><td>newsweekly@smileplanetef.org</td>
                                </tr>
                                <tr>
                                    <th>Website:</th><td><a href='smileplanetef.com'>smileplanetef.org</a></td>
                                </tr>

                            </table>
                            <h5></h5>
                            <small>if you did not subcribe to this service, click <a href='".$unsub."'> here</a></small>
        ";

        //new no spam settings

        $object = [
            'email'=>$email,
            'title'=>'Thanks for Volunteering.',
            'content'=>$htmlContent,
            'subject'=>$subject
        ];
        Mailus::mailler($object);

        $msg = "Thank you for Subscribing to smileplanetef.org. An email has been sent to " . $email ." to verify your subscription";
        return back()->withMessage($msg);

        // Send email
//        $msg = "Thank you for Subscribing to smileplanetef.org. An email has been sent to " . $email ." to verify your subscription";
//        if(mail($to,$subject,$htmlContent, $headersMail)){
//            return back()->withMessage($msg);
//        }else{
//            return back()->withErrors(array('message'=>'Please enter a valid email address : '.$email));
//        }

//        return back()->withMessage($msg);
//                $request->session()->flash('alert-success', $msg);
//        return back()->withMessage($msg);

    }

}
