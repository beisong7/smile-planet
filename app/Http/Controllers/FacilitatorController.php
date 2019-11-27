<?php

namespace App\Http\Controllers;

use App\Course;
use App\Facilit;
use App\Facilitator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\MailController as Mailus;

class FacilitatorController extends Controller
{
    public function facilitateform(Request $request){

//        $fields = $request->radio;
//        $data['gender'] = $fields;
//        $data = $request->all();
//        return $data;




        $check = Facilitator::where('email', $request['email'])->first();
        $cemail = $request['email'];
        if($check){
            return back()->withErrors(array('message'=>"This email, $cemail, is already used"));
        }else{
            $person = $request->all();

            if(Facilitator::create($person)){
                return view('pages.facilitatecomplete')
                    ->with('name', $person['fname'])
                    ->with('email', $person['email']);
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete. Try again later'));
            }
        }


    }

    public function applyfac(Request $request)
    {

        $check = Facilitator::where('email', $request['email'])->first();
        $cemail = $request['email'];
        if ($check) {
            return back()->withErrors(array('message' => "This email, $cemail, is already used"))->withInput($request->input());
        }


        $img_url = '';
        if ($request->hasFile('passport')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('passport');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            $quality = $this->setQuality($size);

            if ($size > 100000) {
//                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"));
            }



            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'applicant1/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $img_url = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

                $source = public_path('../../uploads/'.$img_url); /**  LIVE SERVER PATH  */
//                $source = public_path('uploads/'.$img_url); /** LOCAL SERVER PATH */*/

                $info = getimagesize($source);

//              seal the memory usage---savage *smiles
//              $limit = ini_get('memory_limit');
//              ini_set('memory_limit', -1);


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


            } else {
                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'));
            }

        }

        if(empty($img_url)){
            return back()->withErrors(array('errors'=>'Required. Passport. Kindly attach a passport.'));
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
        $data = $request->all();

        $data['dob'] = $request->input('dob_y').'-'.$request->input('dob_m').'-'.$request->input('dob_d');
        $data['hearhow'] = $nhear;
        $special_key = $this->makeSalt();
        $data['status'] = 'no';
        $data['verify'] = 'no';
        $data['formkey'] = $special_key;
        $data['passport'] = $img_url;

        if(Facilitator::create($data)){


            return $this->sendMail($data['email'], $special_key);

        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'));
        }
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

    public function makeSalt(){
        $charset = 'Q1a_As2Zd1Xf_S3g2WhEj_4Dk3ClV_z5Fq4RxTw6_GcB5eN7_vHr6Yb8_U7tJnM9_y8KmIu0_LiOp_P9ZoQ';
        $saltLen = 36;
        $randSalt = "";
        for ($i = 0; $i < $saltLen; $i++){
            $randSalt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }
        return $randSalt;
    }

    public function sendMail($email, $code){

        $subject = "Smile Planet Facilitator Application Confirmation";

        $link = "https://smileplanetef.org/validate/facilitator/".$code;

        $htmlContent = "

                    Thank you for applying as a Facilitator /Counsellor in Smile Planet Entrepreneurs Hub (SPEH) & 
                    Smile Planet Foundation (SPF) Click the validate button below to enable the completion of your 
                    application and you will be provided the opportunity to upload your current Curriculum Vitae. 
                    This is a confirmation that your application to be a Facilitator /Counsellor with Smile Planet 
                    Entrepreneurs Hub (SPEH) & Smile Planet Foundation (SPF) has been received. 
                    <br>
                    <h5 style='text-align: center;padding: 10px 15px; background-color: purple;color: white;border-radius: 7px'> 
                        <a href='$link' target='_blank' style='padding: 5px 7px; background-color: purple;border-radius: 5px;color: #fff'>Validate</a>
                    </h5>
                    
                    ";

        $object = [
            'email'=>$email,
            'title'=>'Facilitator /Counsellor Validation',
            'content'=>$htmlContent,
            'subject'=>$subject
        ];
        Mailus::mailler($object);

        return view('pages.success.faccomplete')->with('email', $email);
    }

    public function validation($key){

        if(!empty($key)){

            $facilitator = Facilitator::where('formkey', $key)->first();
            if($facilitator){

                //trap already validated users

                $data['verify'] = 'yes';

                if($facilitator->update($data)){
                    return view('pages.success.fac_mail_val')
                        ->with('facilitator', $facilitator);
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

    public function completefform($key){
        if(!empty($key)){

            $facilitator = Facilitator::where('formkey', $key)->first();
            $courses = Course::all();
            if($facilitator){
                return view('pages.success.completefform')
                    ->with('courses', $courses)
                    ->with('facilitator', $facilitator);

            }else{
                return redirect(route('home'));
            }

        }else{
            return redirect(route('home'));
        }
    }

    public function preview(Facilitator $facilitator){
//        return $facilitator;
        if(!empty($facilitator)){
            return view('admin.pages.application.fac_preview')
                ->with('person', $facilitator);
        }
        return back()->withErrors(array('error'=>'No Resource Found'));

    }

    public function destroy(Facilitator $facilitator){
        // remove image if exist
        if(is_file('uploads/'.$facilitator->image)){
            File::delete('uploads/'.$facilitator->image);
        }


        if(!empty($facilitator)){
            if($facilitator->delete()){
                return back()->withMessage('Record Deleted Successfully');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
            }
        }else{
            return redirect(route('console.app.fac'));
        }
        //remove record

    }

    public function faccomform(Request $request, Facilitator $facilitator){

//        return $request->all();
        if(!empty($facilitator)){


            $areatofac_data = $request->areatofac;
            $areatofac  = '';
            if(!empty($areatofac_data)){
                foreach ($areatofac_data as $key=>$value) {
                    if($key+1 === count($areatofac_data)){
                        $areatofac = $areatofac . $value;
                    }else{
                        $areatofac  = $areatofac . $value . '_';
                    }

                }
            }

            if(empty($areatofac)){
                return back()->withErrors(array('errors'=>'You need to select areas of interest. '));
            }

            $data['areatofac'] = $areatofac;

            $yourdays_data = $request->yourdays;
            $yourdays  = '';

            if(!empty($yourdays_data)){
                foreach ($yourdays_data as $key=>$value) {
                    if($key+1 === count($yourdays_data)){
                        $yourdays = $yourdays . $value;
                    }else{
                        $yourdays  = $yourdays . $value . '_';
                    }
                }
            }

            if(empty($yourdays)){
                return back()->withErrors(array('errors'=>'Please indicate the days of the week are convenient for you.'));
            }

            $data['yourdays'] = $yourdays;

            $data['beava']= $request['beava'];
            $data['beava2']= $request['beava2'];
            $data['state']= $request['state'];

            $areaqualify_data = $request->areaqualify;
            $areaqualify  = '';

            if(!empty($areaqualify_data)){
                $lock = 0;
                foreach ($areaqualify_data as $key=>$value) {
                    $lock++;
                    if($key+1 === count($areaqualify_data)){
                        $areaqualify = $areaqualify . $value;
                    }else{
                        $areaqualify  = $areaqualify . $value . '_';
                    }
                }

                if($lock > 2){
                    return back()->withErrors(array('errors'=>'You can only select at most two options on functional areas you feel most qualified to offer support. '));
                }
            }


            if(empty($areaqualify)){
                return back()->withErrors(array('errors'=>'You need to select areas most qualified. '));
            }

            $data['areaqualify'] = $areaqualify;

            $areasector_data = $request->areasector;
            $areasector  = '';
            if(!empty($areasector_data)){
                foreach ($areasector_data as $key=>$value) {
                    if($key+1 === count($yourdays_data)){
                        $areasector = $areasector . $value;
                    }else{
                        $areasector  = $areasector . $value . '_';
                    }
                }
            }


            if(empty($areasector)){
                return back()->withErrors(array('errors'=>'You need to indicate sector/industry areas you are interested in. '));
            }

            $data['areasector'] = $areasector;

            $courset_data = $request->courset;
            $courset  = '';
            $c_lock = 0;

            if(!empty($courset_data)){
                foreach ($courset_data as $key=>$value) {
                    $c_lock++;
//                $courset .= $value.'_';
                    if($key+1 === count($courset_data)){
                        $courset .= $value;
                    }else{
                        $courset .= $value.'_';
                    }
                }

                if($c_lock > 2){
                    return back()->withErrors(array('errors'=>'You can only select at most two options on courses you may wish to be a facilitator. '));
                }
            }

//            return $courset;
            $data['courset'] = $courset;
            $data['courset2'] = $request['courset2'];

            $data['facilitator_id'] = $facilitator->id;

            if(empty($courset)){
                return back()->withErrors(array('errors'=>'Please select at least one course you are interested in.'));
            }

            //trap doubleApplication
            if($facilitator->hasApplied()){
                return redirect(route('home'));
            }

            if(Facilit::create($data)){
                return redirect(route('fac.form.complete'));
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
            }

        }else{
            return redirect(route('home'));
        }

    }

    public function facformcomplete(){
        return view('pages.success.fac_form_complete');
    }
}
