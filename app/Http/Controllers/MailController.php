<?php

namespace App\Http\Controllers;

use App\Mail\MailDemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    static function shootmail($email, $subject, $message, $username)
    {
        $objDemo = new \stdClass();
        $objDemo->sender = 'SmilePlanetEF';
        $objDemo->receiver = $username;
        $objDemo->subject = $subject;
        $objDemo->message = $message;

        Mail::to($email)->send(new MailDemon($objDemo));
    }

    static function sendMail($email, $subject, $message){



//                send mail to user
        $fromMail = 'SmilePlanetEF <noreply@smileplanetef.org> ';
        $boundary = str_replace(" ", "", date('l jS \of F Y h i s A'));

        $to = $email;


        $htmlContent = "
                    <html>
                        <head>
                            <style>
                                html, body{
                                    background-color: #eeeeee;
                                    color: #333;
                                    font-family: sans-serif;
                                    font-weight: 100;
                                    margin: 0;
                                }
                            </style>
                        </head>
                        <body>
                           
                            <table cellspacing='0' style=' width: 100%; height: 200px;'>

                                <tr style='background-color: #511650;'>
                                    <th colspan='2' style='padding: 0 20px;'><span style='font-size: 20px; color: #dedede'>SMILE PLANET ENTREPRENEUR FOUNDATION</span></th>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <p style='text-align: center;padding: 0 50px; margin-bottom:  50px;'>$message</p>
                                        <hr>
                                        
                                    </td>
                                </tr>

                            </table>
                        </body>
                    </html>";

        //new no spam settings

        $headersMail = '';

        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: Smile Planet EF \r\n";

        $headersMail .= 'MIME-Version: 1.0' . "\r\n";

        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

        $headersMail .= 'Content-Transfer-Encoding: base64' . "\r\n\r\n";



        if(mail($to,$subject,$htmlContent, $headersMail)){
            return view('pages.success.volunteercomplete')->with('email', $email);
        }else{
            return view('pages.success.volunteercomplete')->with('email', $email)->withErrors(array('message'=>'Application Complete, unable to send mail to : '.$email));
        }

//        return view('pages.success.volunteercomplete')->with('email', $email);

    }

    static function mailler($object){

//        return $object['message'];

        $title = $object['title'];
        $content = $object['content'];

        @Mail::send('mail.body', ['title' => $title, 'content'=>$content], function($message) use ($object) {



//            $message->cc($object['cc'], $name = null);
//            $message->bcc($object['bcc'], $name = null);
            $message->subject($object['subject']);
            $message->to($object['email']);
        });
    }

    static function mailler2($object){

//        return $object['message'];

        $title = $object['title'];
        $content = $object['content'];

        @Mail::send($object['view'], ['title' => $title, 'content'=>$content], function($message) use ($object) {



//            $message->cc($object['cc'], $name = null);
//            $message->bcc($object['bcc'], $name = null);
            $message->subject($object['subject']);
            $message->to($object['email']);
        });
    }

    public function testmail(){
        $object = [
            'content'=>'This is the test message',
            'title'=>'Test Point',
            'subject'=>'Test mailer with html',
            'email'=>'beisongabc@gmail.com'
        ];

        return $this->mailler($object);
    }


}
