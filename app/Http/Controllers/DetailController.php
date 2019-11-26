<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Pform;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(!empty($request->input('type'))){
            $type = $request->input('type');
            $details = Detail::where('type', $type)->select(['title', 'link', 'type', 'creator_id', 'created_at', 'active'])->paginate(15);
        }
        else{

            $details = Detail::select(['title', 'link', 'type', 'creator_id', 'created_at', 'active'])->paginate(15);


        }

        return view('admin.pages.content.v2.index')->with('details', $details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.content.v2.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return $request->all();

        if(empty($request->input('info'))){
            return back()->withErrors(array('errors'=>'Details is required!'))->withInput($request->input());
        }
        $image = '';

        $detail = new Detail();

        //check if link already exist before saving
        $detail->title = $request->input('title');
        $detail->info = $request->input('info');
        $detail->relative = $request->input('relative');
        $detail->link = 't_'.str_replace(' ', '_', $detail->title);

        $exist = Detail::where('link', $detail->link)->first();

        if($exist){
            return back()->withErrors(array('errors'=>'Title already exist! Select another title.'))->withInput($request->input());
        }

        if ($request->hasFile('image')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('image');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            if ($size > 600000) {
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
            }

            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $image = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

                //send email of account creation on synergy

            } else {

                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

            }
        }

        $detail->image = $image;
        $detail->creator_id = Auth::user()->id;
        $detail->type = $request->input('type');
        $detail->use_reg = $request->input('use_reg');



        $detail->save();

        return redirect()->route('content.v2')->withMessage('New Content Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $detail = Detail::where('link', $title)->first();
//        return url($detail->image);

        if(!empty($detail)){
            return view('admin.pages.content.v2.edit')->with('detail', $detail);
        }else{
            return redirect()->route('content.v2')->withMessage('Unable to find resource');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $link)
    {
        $detail = Detail::where('link', $link)->first();


        if(!empty($detail)){


            if(empty($request->input('info'))){
                return back()->withErrors(array('errors'=>'Details is required!'))->withInput($request->input());
            }
            $image = '';

            //check if link already exist before saving
            $detail->title = $request->input('title');
            $detail->info = $request->input('info');

            if ($request->hasFile('image')) {

                $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

                $photo = $request->file('image');

//            $filename = $photo->getClientOriginalName();


                $extension = $photo->getClientOriginalExtension();

                $extension = strtolower($extension);

                $size = $photo->getClientSize();

                if ($size > 600000) {
                    return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
                }

                $time = Carbon::now();

                $check = in_array(strtolower($extension), $allowedfileExtension);

                $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

                if ($check) {

                    $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                    $detail->image = $directory . '/' . $filename;

                    $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

                    //send email of account creation on synergy

                } else {

                    return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

                }
            }


            $detail->type = $request->input('type');
            $detail->relative = $request->input('relative');
            $detail->use_reg = $request->input('use_reg');

            $detail->update();

            return back()->withMessage('Update Successful!');

        }else{
            return back()->withMessage('Unable to find resource');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }

    public function toggle($link){
        $detail = Detail::where('link', $link)->first();

        if(empty($detail)){
           return back()->withMessage('No resource found.');
        }

        $detail->active?$detail->active=false:$detail->active=true;
        $detail->update();
        $msg = $detail->active?"Active":"Inactive";

        return back()->withMessage("Operation Successful, Details now ". $msg);

    }

    public function coursereg($link, $type){
        //find the course, if it exist and is active, continue else terminate
        $course = Detail::where('type', $type)->where('link', $link)->where('use_reg', 'yes')->where('active', true)->first();
        if(!empty($course)){
            return view('v2.page.forms.course_reg')->with('course', $course);
        }
        return back()->withMessage("Not found");
    }

    public function complete_course_reg(Request $request, $link, $type){
        //find the course, if it exist and is active, continue else terminate
        $course = Detail::where('type', $type)->where('link', $link)->where('use_reg', 'yes')->where('active', true)->first();
        if(!empty($course)){

            $email = $request->input('email');

            $exist = Pform::where('email', $email)->where('active', true)->first();

            if(empty($exist)){
                $pform = new Pform();
                $pform->first_name = $request->input('first_name');
                $pform->surname = $request->input('surname');
                $pform->other_name = $request->input('other_name');
                $pform->email = $email;
                $pform->phone = $request->input('phone');
                $pform->bus_type = $request->input('bus_type');
                $pform->bus_name = $request->input('bus_name');
                $pform->bus_category = $request->input('bus_category');
                $pform->bus_phone = $request->input('bus_phone');
                $pform->bus_email = $request->input('bus_email');
                $pform->bus_address = $request->input('bus_address');
                $pform->num_employee = $request->input('num_employee');
                $pform->bus_certs = $this->mashUp($request->input('bus_certs'));
                $pform->prog_attended = $request->input('prog_attended');
                $pform->seen = false;
                $pform->active = true;
                $pform->time = time();
                $pform->detail_link = $link;
                $pform->detail_type = $type;

                $pform->save();

                //send email to client

                $msg = "Thank You for indicate interest in this course/Training you will be contact within 12Hours by our program coordinator through a call. You welcome to Smile Planet. For further enquires kindly call +2347033461426, +2349098002014 ";
                return redirect()->route('detail.course.reg', [$link, $type])->withMessage($msg);
            }
            return back()->withErrors(array('error'=>"You already applied before for this course."));
        }
        return back()->withErrors(array('error'=>'Registration failed. Refresh page and Try again.'));
    }

    public function mashUp($certs){
        $out = '';
        if(!empty($certs)){
            foreach ($certs as $cert){
                $out.=$cert.', ';
            }
        }
        return $out;
    }
}

