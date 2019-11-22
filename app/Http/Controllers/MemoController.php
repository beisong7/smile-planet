<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController as Mailus;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
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

    public function makemail(){
        return view('admin.pages.dashboard.custom_mail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO write a code that allows sending multiple emails
        $data = $request->all();
        $f_mails = $data['email'];

        $data['user_id'] = Auth::user()->id;
        //save to memo
        Memo::create($data);

        //check if multiple mail exist
        if(strpos($f_mails, ',')){
            $array = explode(',',$f_mails);
            foreach ($array as $email){
                //send only to valid mail formats
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $object = [
                        'email'=>$email,
                        'title'=>$data['title'],
                        'content'=>$data['body'],
                        'subject'=>$data['subject']
                    ];
                    Mailus::mailler($object);
                }
            }

        }else{
            $object = [
                'email'=>$data['email'],
                'title'=>$data['title'],
                'content'=>$data['body'],
                'subject'=>$data['subject']
            ];
            Mailus::mailler($object);
        }

        return back()->withMessage('Email Sending Complete');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        //
    }


}
