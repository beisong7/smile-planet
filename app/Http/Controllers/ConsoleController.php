<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Consult;
use App\Content;
use App\Counter;
use App\Course;
use App\Coursereg;
use App\Eventreg;
use App\Facilitator;
use App\Focus;
use App\Gallery;
use App\Partner;
use App\Pform;
use App\Program;
use App\Tube;
use App\User;
use App\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;


class ConsoleController extends Controller
{
    //
    public function login(){
        return view('admin.auth.login');
    }

    public function adminlogin(Request $request){
        $key = trim($request['access']);
        $id = null;
        $user = null;
        $password = null;

        if(is_numeric($key)){
            if (Auth::attempt(['tel' => $key, 'password' => $request['password']])) {
                if(intval(Auth::user()->who) ===4){
                    return redirect(route('console.home'));
                }else{
                    Auth::logout();
                    return redirect(route('console.login'))->withErrors(array('message'=>'Invalid Credentials Given'));
                }
            } else {
                return redirect(route('console.login'))->withErrors(array('message' => 'Invalid Credentials Given'));
            }
        }
        else{
            if(Auth::attempt(['username' => $key, 'password'=> $request['password']])){
                if(intval(Auth::user()->who) === 4){
                    return redirect(route('console.home'));
                } else{
                    Auth::logout();
                    return redirect(route('console.login'))->withErrors(array('message'=>'Invalid Credentials Given'));
                }
            }else{
                return redirect(route('console.login'))->withErrors(array('message'=>'Invalid Credentials Given'))->withInput($request->input());
            }
        }
    }

    public function stafflogin(Request $request){

        $key = trim($request->input('access'));
        $id = null;
        $user = null;
        $password = null;

        if(is_numeric($key)){

            if (Auth::attempt(['tel' => $key, 'password' => $request->input('password')])) {
                if(intval(Auth::user()->who) ===3){
                    return redirect(route('console.home'));
                }else{
                    Auth::logout();
                    return back()->withErrors(array('message'=>'Invalid Credentials Given'));
                }
            } else {
                return back()->withErrors(array('message' => 'Invalid Credentials Given'));
            }

        }else{
            if(Auth::attempt(['username' => $key, 'password'=> $request->input('password')])){
                if(intval(Auth::user()->who) === 3){
                    return redirect(route('console.home'));
                } else{
                    Auth::logout();
                    return back()->withErrors(array('message'=>'Invalid Credentials Given'));
                }
            }else{
                return back()->withErrors(array('message'=>'Invalid Credentials Given'))->withInput($request->input());
            }
        }

    }


    public function updatehits(){
        set_time_limit(0);
        $visits = Counter::all();
        foreach ($visits as $hits){
            //convert created at to string to time
            $save['time'] = strtotime($hits->created_at);
            $hits->update($save);
        }
    }

    public function dashboard(){

        //filter each
        $visits = Counter::orderBy('id', 'DESC')->where('time', '>=', strtotime('today'))->get();
        $visitz = Counter::where('time', '>=', strtotime('today'))->first();

        return view('admin.pages.dashboard.index')
            ->with('visits', $visits)
            ->with('visitz', $visitz);
    }

    public function visitors(){
        $visits = Counter::orderBy('id', 'DESC')->paginate(25);
        $visitz = Counter::where('time', '>=', strtotime('today'))->first();
        return view('admin.pages.visitors.index')
            ->with('visitors', $visits)
            ->with('visitz', $visitz);
    }

    public function visitor(Counter $counter){
        $visitz = Counter::where('time', '>=', strtotime('today'))->first();
        return view('admin.pages.visitors.show')
            ->with('visitor', $counter)
            ->with('visitz', $visitz);
    }

    public function content(){

        return view('admin.pages.content.main');
    }
    public function vision(){
        $content = Content::first();
        return view('admin.pages.content.vision')
            ->with('content', $content);
    }



    public function about(){
        $content = Content::first();
        return view('admin.pages.content.about')
            ->with('content', $content);
    }
    public function mission(){
        $content = Content::first();
        return view('admin.pages.content.mission')
            ->with('content', $content);
    }
    public function corevals(){
        $content = Content::first();
        return view('admin.pages.content.core')
            ->with('content', $content);
    }

    public function aimnobj(){
        $content = Content::first();
        return view('admin.pages.content.aims_obj')
            ->with('content', $content);
    }

    public function reach(){
        $content = Content::first();
        return view('admin.pages.content.presence')
            ->with('content', $content);
    }

    public function swwd(){
        $content = Content::first();
        return view('admin.pages.content.whatwedo')
            ->with('content', $content);
    }

    public function e_tech(){
        $content = Focus::first();
        return view('admin.pages.focus.tech')
            ->with('content', $content);
    }
    public function e_mentor(){
        $content = Focus::first();
        return view('admin.pages.focus.monitor')
            ->with('content', $content);
    }
    public function e_coach(){
        $content = Focus::first();
        return view('admin.pages.focus.lifecoach')
            ->with('content', $content);
    }
    public function e_vocation(){
        $content = Focus::first();
        return view('admin.pages.focus.vocation')
            ->with('content', $content);
    }
    public function e_entrep(){
        $content = Focus::first();
        return view('admin.pages.focus.entrepreneur')
            ->with('content', $content);
    }
    public function e_leader(){
        $content = Focus::first();
        return view('admin.pages.focus.leader')
            ->with('content', $content);
    }
    public function e_ourFocus(){
        $content = Focus::first();
        return view('admin.pages.focus.career')
            ->with('content', $content);
    }
    public function e_mind(){
        $content = Focus::first();
        return view('admin.pages.focus.body_spirit')
            ->with('content', $content);
    }

    public function banner(){
        $banner = Banner::all()->where('type', 'static');
        $slider = Banner::all()->where('type', 'slider');
        return view('admin.pages.banners.index')
            ->with('banner', $banner)
            ->with('slider', $slider);
    }

    public function gallery(){

        $media = Gallery::orderBy('id', 'DESC')->paginate(40);

        return view('admin.pages.gallery.index')
            ->with('media', $media);
    }

    public function upload(Request $request){



        // Creating a new time instance, we'll use it to name our file and declare the path
        $time = Carbon::now();

//        return json_encode($request);

        // Requesting the file from the form
        $image = $request->file('file');


        // Getting the extension of the file
        $extension = $image->getClientOriginalExtension();

        //get file size
        $size = $image->getClientSize();

        //get file original name
        $flname = $image->getClientOriginalName();



        // Creating the directory, for example, if the date = 18/10/2017, the directory will be 2017/10/
        $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');

        // Creating the file name: random string followed by the day, random number and the hour
        $filename = str_random(5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;

        // This is our upload main function, storing the image in the storage that named 'public'
        $upload_success = $image->storeAs($directory, $filename, 'public');

        // If the upload is successful, return the name of directory/filename of the upload.
        if ($upload_success) {
//            return response()->json($upload_success, 200);
            $url = $directory . '/' . $filename;
            $data['url'] =$url ;
            $data['size'] = $size;
            $data['file_name'] = $flname;
            $data['type'] = $extension;
            if(Gallery::create($data)){
                //get file id
                $file = Gallery::orderBy('id', 'DESC')->where('url', $url)->first();
                $res['success'] = $upload_success;
                $res['id'] = $file->id;
                $res = json_encode($res);
                return response()->json($res, 200);
            }else{
                $res['success'] = $upload_success;
                $res = json_encode($res);
                return response()->json($res, 200);
            }

        }
        // Else, return error 400
        else {
            return response()->json('hmm', 200);
            return response()->json('error', 400);
        }


    }

    public function allgallery(Request $request){
        $all = $request->all();
        $id = $all['id'];
        $media = Gallery::find($id);

        if($media){
            $media['success'] = true;
            return json_encode($media);
        }else{
            $data['success'] = false;
            return json_encode($data);
        }
    }

    public function getimggallery(Request $request){


        $amount = $request['amount'];
        $used = $request['used'];
        $lastID = $request['lastID'];
        //total
        $total = count(Gallery::all());


        if(intval($used) === 0){
            $media = Gallery::orderBy('id', 'DESC')->take($amount)->get();
        }else{
            $media = Gallery::orderBy('id', 'DESC')->where('id', '<',intval($lastID))->take($amount)->get();
        }

        $used+=$amount;

        //remain
        $remain = $total - $used;


        //calculate last ID
        $len = 0;
        if(!empty($media)){
            $len = count($media);

            $lastID = $media[$len-1]->id;
        }

        if($media){
            $data['result'] = $media;
            $data['success'] = true;
            $data['remain'] = $remain;
            $data['lastID'] = $lastID;
            $data['length'] = $len;

            return json_encode($data);
        }else{
            $data['success'] = false;
            $data['result'] = false;
            return json_encode($data);
        }
    }


    public function facilitator(){
        $facilitators = Facilitator::paginate(30);
        return view('admin.pages.application.facilitators')
            ->with('facilitators', $facilitators);
    }

    public function volunteer(){
        $volunteers = Volunteer::all();
        return view('admin.pages.application.volunteer')
            ->with('volunteers', $volunteers);
    }

    public function admins(){
        $admins = User::where('who', '>=' , 3)->paginate(15);
        return view('admin.pages.admin.index')
            ->with('admins', $admins);
    }

    public function eabout(){
        $content = Content::first();
        return view('admin.pages.content.eabout')
            ->with('content', $content);
    }

    public function logout(Request $request){
        if(Auth::user()->who === 2){
            Auth::logout();
            return redirect(route('console.login'));
        }else{
            Auth::logout();
            return redirect(route('home'));
        }
    }

    public function newadmin(){
        if(intval(Auth::user()->who)===4){
            return view('admin.pages.admin.add');
        }else{
            return back()->withErrors(array('message'=> 'You do not have permission to perform this operation.'));
        }
    }

    function makeSalt(){
        $charset = 'qa*%MJU74CD+!_@)#EedcjmXZAQ0zxTRs($kiolp19YHFV28vfrWSwPtgbnhNBGyOKIu365&^';
        $saltLen = 9;
        $randSalt = "";
        for ($i = 0; $i < $saltLen; $i++){
            $randSalt .= $charset[mt_rand(0, strlen($charset) - 1)];
        }

        return $randSalt;
    }

    public function storeadmin(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $username = $data['username'];
        $count = User::where('email', $email)->first();
        $count2 = User::where('username', $username)->first();
        $salt_reg = $this->makeSalt();
        $data['dsalt'] = $salt_reg;
        $data['password'] = $request->input('password');
        $data['ptoken'] = hash('sha256', $salt_reg . $request->input('password'));
        if(count($count) > 0 || count($count2)){
            return back()->withErrors(array('message'=> 'Oops! An admin already exist with the given credentials'));
        }else{
            if(User::create($data)){
                return redirect(route('console.admins'))->withMessage('New Admin Added Successfully');
            }else{
                return back()->withErrors(array('message'=> 'Oops! Something went wrong. Try gain later'));
            }
        }

    }

    public function deladmin(User $user){

        if($user->delete()){
            return back()->withMessage('User Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unkown Error Occured, Please Check and Try Again!'));
        }
    }

    public function ashowadmin(User $user){
        if(Auth::user()->who >3 || Auth::user()->id === $user->id){
            if(count($user)>0){
                return view('admin.pages.admin.preview')->with('admin',$user);
            }else{
                return back();
            }
        }else{
            return back()->withErrors(array('message'=>'you cannot manage this account'));
        }
    }

    public function updateadmin(Request $request, User $user){
        $data = $request->all();
        $email = $data['email'];
        $username = $data['username'];
        $count = User::where('email', $email)->first();
        $count2 = User::where('username', $username)->first();
        $salt_reg = $this->makeSalt();
        $data['dsalt'] = $salt_reg;


        if(count($count) > 0){
            //process passwords
            //todo - valid password check
            if(Auth::user()->who === 4 || Auth::user()->id === $user->id ){

                $data['password'] = $request->input('np');
                $data['ptoken'] = hash('sha256', $salt_reg . $request->input('np'));

                if($user->update($data)){

                    return redirect(route('console.admins'))->withMessage('Admin Updated Added Successfully');
                }else{
                    return back()->withErrors(array('message'=> 'Oops! Something went wrong. Try gain later'));
                }


            }else{
                return back()->withErrors(array('message'=> 'Oops! Something went wrong. Try gain later'));
            }

        }else{
            return redirect(route('console.admins'))->withErrors(array('message'=> 'No records found'));
        }
    }

    public function youtube(){
        if(Auth::user()->who ===4 || Auth::user()->job === ''){
            $tubes = Tube::paginate(20);

            return view('admin.pages.tube.index')
                ->with('tubes', $tubes);
        }else{
            return back();
        }
    }

    public function newtubevideo(){

        return view('admin.pages.tube.add');
    }

    public function storetube(Request $request){
        $data = $request->all();
        $link = $data['link'];
        $pieces = explode('/', $link);
        $last_word = array_pop($pieces);
        $data['link'] = 'https://www.youtube.com/embed/' . $last_word . '?rel=0';



        if(Tube::create($data))
            return redirect(route('console.tube'))->withMessage('New Video Added Successfully');
        else
            return back()->withMessage('Oops! Something went wrong. Try gain later');
    }

    public function updatetube(Request $request, Tube $tube){
        $data = $request->all();
        $link = $data['link'];
        $pieces = explode('/', $link);
        $last_word = array_pop($pieces);
        $data['link'] = 'https://www.youtube.com/embed/' . $last_word . '?rel=0';
        if($tube->update($data))
            return back()->withMessage('Video Updated Successfully');
        else
            return back()->withErrors(array('message'=>'Unkown Error Occured, Please Check and Try Again!'));
    }

    public function showtube(Tube $tube){
        return view('admin.pages.tube.show')
            ->with('tube', $tube);
    }

    public function deltube(Tube $tube){
        if($tube->delete()){
            return back()->withMessage('Video Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unkown Error Occured, Please Check and Try Again!'));
        }
    }

    public function eventreg(){
        $events = Program::orderBy('id', 'DESC')->paginate(20);
        return view('admin.pages.application.eventregevent')
            ->with('events', $events);


    }

    public function courseRegis(){
        //get all courses
        $courses = Course::orderBy('id', 'DESC')->get();
        return view('admin.pages.application.courses')
            ->with('courses', $courses);
    }

    public function courseSrudents(Course $course){
        //
        if(!empty($course)){
            return view('admin.pages.application.coursstudent')->with('course', $course);
        }else{
            return back();
        }
    }

    public function courseappshow(Coursereg $coursereg){
        if(!empty($coursereg)){
            return view('admin.pages.application.courseApp_preview')
                ->with('person', $coursereg);
        }else{
            return back();
        }

    }

    public function courseappdel(Coursereg $coursereg){
        if(!empty($coursereg)){
            if($coursereg->delete()){
                return back()->withMessage('One Record Deleted');
            }else{
                return back()->withErrors(array('message'=>'Unkown Error Occured, Please Check and Try Again!'));
            }
        }else{
            return back();
        }
    }

    public function deventreg(Program $program){

        $eventreg = $program->users;

        return view('admin.pages.application.eventreg')
            ->with('eventreg', $eventreg)
            ->with('id', $program->id)
            ->with('title', $program->title);
    }

    public function eventregshow(Eventreg $eventreg){
        return view('admin.pages.application.eventregshow')
            ->with('eventreg', $eventreg);
    }

    public function fixdb(){
        //get all from table
        $programs=Program::all();
        foreach ($programs as $program){
            $data['dates'] = strtotime($program->date);
            $program->update($data);
        }

        return 'process complete';
    }

    // remove a registered event from the database
    public function removeEvent(Eventreg $eventreg)
    {

        if($eventreg->delete())
        {
            return back()->withMessage('Registration Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=> 'Unable to complete, try again later'));
        }
    }

    //confirm and update a participants ticket for the event
    public function ticketer()
    {
        if(Auth::user()->who ===4 || Auth::user()->job === ''){
            return view('admin.pages.dashboard.ticketer')
                ->with('person', false);
        }else{
            return back();
        }


    }

    //confirm and update a participants ticket for the event
    public function ticketCheck(Request $request)
    {
        $ticket = $request['ticket'];
//        return $ticket;

        $person = Eventreg::where('ticket',$ticket)->first();

        if(count($person)>0){
            return view('admin.pages.dashboard.ticketer')
                ->with('person', $person);
        }else{
            return view('admin.pages.dashboard.ticketer')
                ->with('person', false);
        }

    }

    //confirm a ticket
    public function ticketConfirm(Eventreg $eventreg)
    {
        $data['tverify'] = 'Yes';
        $data['tvtime'] = time();
        if($eventreg->update($data)){
            return redirect(route('ticketer'))->withMessage('Ticket Confirmed Successfully!');
        }else{
            return back()->withErrors(array('message'=> 'Unable to complete, try again later'));
        }

    }

    public function exportExcel(Program $program){

//        $eventreg = $program->users;
        //prepare the data
        $data = array();
        foreach ($program->users as $user){
            $info['Names'] = $user->title . ' ' . $user->fname . ' ' . $user->lname;
            $info['Location'] = $user->location;
            $info['gender'] = $user->gender;
            $info['Date of Birth'] = $user->dob;
            $info['Email'] = $user->email;
            $info['Certificate'] = $user->certificate;
            $info['Telephone'] = "'".$user->telephone;
            $info['Ticket Number'] = $user->ticket;

            array_push($data, $info);

        }

//        return var_dump($data);

//        $eventreg = $this->objectToArray($program->users);
//
        $filename = $program->title . "_xml".date('Y-m-d:is') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        $flag = false;
//        return var_dump($eventreg);
        foreach($data as $event) {
            if(!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($event)) . "\r\n";

                $flag = true;
            }

            echo implode("\t", array_values($event)) . "\r\n";

        }
        exit;
    }

    public function exportCourseExcel(Course $course){
//        $eventreg = $program->users;
        //prepare the data
        $data = array();
        foreach ($course->applicants() as $user){
            $info['Names'] = $user->names;
            $info['Gender'] = $user->gender;
            $info['Location'] = $user->address;
            $info['Email'] = $user->email;
            $info['Telephone'] = "'".$user->phone;
            $info['Date of Birth'] = $user->dob;
            $info['Country'] = $user->country;
            $info['Education Level'] = $user->setedu();

            $info['Next of Kin Name'] = $user->nok_name;
            $info['Next of Kin Phone'] = "'".$user->nok_phone;
            $info['Next of Kin Address'] = $user->nok_address;

            array_push($data, $info);

        }

//        return var_dump($data);

//        $eventreg = $this->objectToArray($program->users);
//
        $filename = $course->title . "_xml".date('Y-m-d:is') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        $flag = false;
//        return var_dump($eventreg);
        foreach($data as $event) {
            if(!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($event)) . "\r\n";

                $flag = true;
            }

            echo implode("\t", array_values($event)) . "\r\n";

        }
        exit;
    }

    public function othersExcel(Request $request, $name){
        //set facilitator or volunteers

        if($name==='facilitator'){
            $objects = Facilitator::class;
        }
        elseif ($name==='enrollments') {
            $objects = Pform::class;

        }
        elseif ($name==='consultation') {
            $objects = Consult::class;

        }

        else{
            $objects = Volunteer::class;
        }

        //todo : Add layer for range by date-applied here

        if($name==='enrollments'){

            $datef = $request->input('datef');
            $datet = $request->input('datet');

            $enrollments = null;

            if(!empty($datef) && !empty($datet)){
                $df = strtotime($datef);
                $dt = strtotime($datet);
                $enrollments = $objects::where('time','>=', $df)->where('time','<=', $dt)->get();

            }

            if(empty($datef) && !empty($datet)){
                $dt = strtotime($datet);
                $enrollments = $objects::where('time','<=', $dt)->get();
            }

            if(!empty($datef) && empty($datet)){
                $df = strtotime($datef);
                $enrollments = $objects::where('time','>=', $df)->get();
            }

            if(empty($datef) && empty($datet)){
                $enrollments = $objects::get();
            }
            //END RANGE LAYER

            $data = array();
            foreach ($enrollments as $user){
                $info['First Name'] = $user->first_name;
                $info['Surname'] = $user->surname;
                $info['Other Names'] = $user->other_name;
                $info['Email'] = $user->email;
                $info['Phone'] = $user->phone;
                $info['Business Type'] = $user->bus_type;
                $info['Business Name'] = $user->bus_name;
                $info['Business Category'] = $user->bus_category;
                $info['Business Phone'] = $user->bus_phone;
                $info['Business Email'] = $user->bus_email;
                $info['Business Address'] = $user->bus_address;
                $info['Staff Strength'] = $user->num_employee;
                $info['Business Certificates'] = $user->bus_certs;
                $info['Programs Attended'] = $user->prog_attended;
                $info['Application Date'] = date('F d, Y', $user->time);



                array_push($data, $info);

            }


        }

        elseif($name==='consultation'){


            $datef = $request->input('datef');
            $datet = $request->input('datet');

            $enrollments = null;

            if(!empty($datef) && !empty($datet)){
                $df = strtotime($datef);
                $dt = strtotime($datet);
                $enrollments = $objects::where('time','>=', $df)->where('time','<=', $dt)->get();

            }

            if(empty($datef) && !empty($datet)){
                $dt = strtotime($datet);
                $enrollments = $objects::where('time','<=', $dt)->get();
            }

            if(!empty($datef) && empty($datet)){
                $df = strtotime($datef);
                $enrollments = $objects::where('time','>=', $df)->get();
            }

            if(empty($datef) && empty($datet)){
                $enrollments = $objects::get();
            }
            //END RANGE LAYER

            $data = array();
            foreach ($enrollments as $user){
                $info['First Name'] = $user->first_name;
                $info['Surname'] = $user->surname;
                $info['Other Names'] = $user->other_name;
                $info['Email'] = $user->email;
                $info['Location'] = $user->location;
                $info['Phone'] = $user->phone;
                $info['Business Type'] = str_replace('_', ' ', $user->bus_type);
                $info['Business Category'] = $user->bus_category;
                $info['Business Idea'] = $user->bus_ideal;
                $info['Application Date'] = date('F d, Y', $user->time);



                array_push($data, $info);

            }



        }
        else{

//        $eventreg = $program->users;
            //prepare the data

            $objects = $objects::get();
            $data = array();
            foreach ($objects as $user){
                $info['Names'] = $user->title . ' ' . $user->fname . ' ' . $user->lname;
                $info['Location'] = $user->address;
                $info['gender'] = $user->gender;
                $info['Date of Birth'] = $user->dob;
                $info['Email'] = $user->email;
                $info['Telephone'] = "'".$user->tel1;


                array_push($data, $info);

            }

//        return var_dump($data);

//        $eventreg = $this->objectToArray($program->users);
//

        }

        $filename = "Document_excel".date('Y-m-d:is') . ".xls";
//
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");

        $flag = false;
//        return var_dump($eventreg);
        foreach($data as $event) {
            if(!$flag) {
                // display field/column names as first row
                echo implode("\t", array_keys($event)) . "\r\n";

                $flag = true;
            }

            echo implode("\t", array_values($event)) . "\r\n";

        }
        exit;
    }

    function objectToArray(&$object)
    {
        return @json_decode(json_encode($object), true);
    }

    public function removePartner(Request $request, Partner $partner){
        if($partner->delete()){
            return redirect(route('console.partner'))->withMessage('Update Successfully!');
        }else{
            return back()->withErrors(array('message'=> 'Unable to complete, try again later'));
        }

    }

    public function enrollments(Request $request){
        $datef = $request->input('datef');
        $datet = $request->input('datet');

        $model = Pform::class;
        $enrollments = null;

        if(!empty($datef) && !empty($datet)){
            $df = strtotime($datef);
            $dt = strtotime($datet);
            $enrollments = $model::where('time','>=', $df)->where('time','<=', $dt)->get();

        }

        if(empty($datef) && !empty($datet)){
            $dt = strtotime($datet);
            $enrollments = $model::where('time','<=', $dt)->get();
        }

        if(!empty($datef) && empty($datet)){
            $df = strtotime($datef);
            $enrollments = $model::where('time','>=', $df)->get();
        }

        if(empty($datef) && empty($datet)){
            $enrollments = $model::paginate(30);
        }



        return view('admin.pages.application.enrollments')
            ->with('datef', $datef)
            ->with('datet', $datet)
            ->with('enrollments', $enrollments);
    }

    public function consultation(Request $request){
        $datef = $request->input('datef');
        $datet = $request->input('datet');

        $model = Consult::class;
        $enrollments = null;

        if(!empty($datef) && !empty($datet)){
            $df = strtotime($datef);
            $dt = strtotime($datet);
            $enrollments = $model::where('time','>=', $df)->where('time','<=', $dt)->get();

        }

        if(empty($datef) && !empty($datet)){
            $dt = strtotime($datet);
            $enrollments = $model::where('time','<=', $dt)->get();
        }

        if(!empty($datef) && empty($datet)){
            $df = strtotime($datef);
            $enrollments = $model::where('time','>=', $df)->get();
        }

        if(empty($datef) && empty($datet)){
            $enrollments = $model::paginate(30);
        }



        return view('admin.pages.application.consultation')
            ->with('datef', $datef)
            ->with('datet', $datet)
            ->with('consultation', $enrollments);
    }


}
