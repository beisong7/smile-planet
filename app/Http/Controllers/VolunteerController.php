<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\MailController as Mailus;


class VolunteerController extends Controller
{
    //
    public function volunteerform(Request $request){

//        $fields = $request->radio;
//        $data['gender'] = $fields;
//        $data = $request->all();
//        return $data;

        $img_url = '';

        $check = Volunteer::where('email', $request['email'])->first();
        $cemail = $request['email'];

        if($check){
            return back()->withErrors(array('message'=>"This email, $cemail, is already used"));
        }



        if($request->hasFile('passport')) {

            $allowedfileExtension=['jpg','png','bmp','jpeg',];

            $photo = $request->file('passport');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

//            if($size > 1166501){
                $quality = $this->setQuality($size);
//
//            }else{
//                $quality = 60;
//            }




            if($size > 9999999){
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"));
            }

            $time = Carbon::now();

            $check=in_array($extension,$allowedfileExtension);

            $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;

            if($check) {

                $directory = 'applicant2/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $img_url = $directory.'/'.$filename;


                $photo->storeAs($directory, $filename, 'public');

                //compress image

                $source = public_path('../../uploads/'.$img_url);
//                $source = public_path('uploads/'.$img_url);

                $info = getimagesize($source);

//                seal the memory usage---savage *smiles
//                $limit = ini_get('memory_limit');
//                ini_set('memory_limit', -1);

                if ($info['mime'] == 'image/jpeg')
                    $image = imagecreatefromjpeg($source);

                elseif ($info['mime'] == 'image/jpg')
                    $image = imagecreatefromjpeg($source);

                elseif ($info['mime'] == 'image/png')
                    $image = imagecreatefrompng($source);

                elseif ($info['mime'] == 'image/bmp')
                    $image = imagecreatefromjpeg($source);

                unlink($source);

                imagejpeg($image, $source, $quality);

//                release memory... lol
//                ini_set('memory_limit', $limit);


            }else{
                return back()->withErrors(array('message'=>'Your passport must be of types : jpeg,bmp,png,jpg. '));
            }

        }

        if(empty($img_url)){
            return back()->withErrors(array('errors'=>'Please Select a passport before proceeding.'));
        }

        $hear = $request->hearhow;
        $nhear = '';
        foreach ($hear as $key=>$value) {
            if($key+1 === count($hear)){
                $nhear = $nhear . $value;
            }else{
                $nhear = $nhear . $value . '_';
            }
        }

        $person = $request->all();
        $code = $this->makeSalt();

        $person['formkey'] = $code;

        $person['verify'] = 'no';
        $person['status'] = 'no';
        $person['formtime'] = time();
        $person['image'] = $img_url;

        $person['hearhow'] = $nhear;

        if(Volunteer::create($person)){
            //prepare mail
            return $this->sendMail($person['email'], $code);

//                        return view('pages.volunteercomplete')
//                            ->with('name', $person['fname'])
//                            ->with('email', $person['email']);
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'));
        }

    }

    public function vformcomplete($data){

    }

    function setQuality($filesize){
        if($filesize <= 1166501)
            $q = 65;

        elseif($filesize > 1166501 && $filesize <= 3166501)
            $q = 50;

        elseif($filesize > 3166501 && $filesize <= 5166501)
            $q = 40;

        elseif($filesize > 5166501 && $filesize <= 9999999)
            $q = 28;

        return $q;
    }

    public function preview(Volunteer $volunteer){
        return view('admin.pages.application.preview')
            ->with('form', $volunteer);
    }

    public function makeSalt(){
        $charset = 'Q1a_As2Zd1Xf_S3g2WhEj_4Dk3ClV_z5Fq4RxTw6_GcB5eN7_vHr6Yb8_U7tJnM9_y8KmIu0_LiOp_P9ZoQ';
        $saltLen = 16;
        $randSalt = "";
        for ($i = 0; $i < $saltLen; $i++){
            $randSalt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }

        return $randSalt;
    }

    public function sendMail($email, $code){

        $subject = "Smile Planet Volunteer Application Confirmation.";

        $link = "https://smileplanetef.org/validate/volunteer/".$code;

        $htmlContent = "
                    Thank you for applying to volunteer with Smile Planet Entrepreneurs Foundation (SPEF)
                                        click the validate button below to validate your application.
                                         <br>
                                        
                                        This is a confirmation that your application to Volunteer with Smile Planet Entrepreneurs Foundation (SPEF) 
                                        has been received. 
                                        
                                        <br>
                                       
                                        <h5 style='text-align: center;padding: 10px 15px; background-color: purple;color: white;border-radius: 7px'> 
                                            <a href='$link' target='_blank' style='padding: 5px 7px; background-color: purple;border-radius: 5px;color: #fff'> Validate </a>
                                        </h5>
                    ";

        $object = [
            'email'=>$email,
            'title'=>'Volunteer Validation',
            'content'=>$htmlContent,
            'subject'=>$subject
        ];
        Mailus::mailler($object);

        return view('pages.success.volunteercomplete')->with('email', $email);

        $msg = "Thank you for applying to volunteer with Smile Planet Entrepreneurs Foundation (SPEF).
        You will receive an automated email . An email has been sent to " . $email ." with 
        confirmation of your application for verification. We will respond via phone and/or email 
        within a week of validating your application. Thank you.";

//        if(mail($to,$subject,$htmlContent, $headersMail)){
//            return view('pages.success.volunteercomplete')->with('email', $email);
//        }else{
//            return view('pages.success.volunteercomplete')->with('email', $email)->withErrors(array('message'=>'Application Complete, unable to send mail to : '.$email));
//        }

//        return view('pages.success.volunteercomplete')->with('email', $email);

    }

    public function destroy(Volunteer $volunteer){
        // remove image if exist
        File::delete('uploads/'.$volunteer->image);


        //remove record
        if($volunteer->delete()){
            return back()->withMessage('Record Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }

    public function validation($key){

        if(!empty($key)){

            $volunteer = Volunteer::where('formkey', $key)->first();
            if($volunteer){

                $data['verify'] = 'yes';

                if($volunteer->update($data)){
                    return view('pages.success.vol_mail_val')
                        ->with('volunteer', $volunteer);
                }else{
                    return view('pages.success.mail_val_error');
                }
            }else{
                return redirect(route('home'));
            }



        }else{
            return redirect(route('home'));
        }

    }
}

//                $time = 86400;
//                $logTime = intval($volunteer->formtime) + $time;
//                $timeNow = time();

//            if($logTime > $timeNow){
//                return view('page.success.vol_mail_val')
//                    ->with('volunteer', $volunteer);
//            }else{
//                return view('page.success.mail_val_error');
//            }