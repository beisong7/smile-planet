<?php

namespace App\Http\Controllers;

use App\ads;
use App\Banner;
use App\Blog;
use App\Calender;
use App\Category;
use App\Content;
use App\Detail;
use App\Partner;
use App\People;
use App\Program;
use App\Slider;
use App\Tube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function lost(){
        return view('errors.404');
    }

    public function index()
    {
        $brands = Partner::all();
        $banners = Banner::where('type','static')->get();
//        return $banners;
        $upcoming = Program::where('dates', '>', strtotime('today'))->orderBy('dates', 'DESC')->take(3)->get();
        $adds = ads::where('active', true)->first();
        if(!empty($upcoming)){
            $upcoming = Program::orderBy('dates', 'DESC')->take(3)->get();
        }


        $stab = 3 - count($upcoming);

        foreach($upcoming as $key=>$val)
        {
            $upcoming[$key]['list'] = strtotime($val['date']) - strtotime('today');
        }




//        return $upcoming;
        $arr = array();
        $hold = array();
        foreach ($upcoming as $item){
            if($item->list <= 0){
                array_push($hold, $item);
            }else{
                array_push($arr, $item);
            }
        }
        usort($arr, function($a, $b){
            return $a['list'] - $b['list'] ;
        }); // this sorting works

        if(count($hold)>0){
            foreach ($hold as $item){
                array_push($arr, $item);
            }
        }

        if($stab < 3){
            $upcoming2 = Program::where('dates', '<=', strtotime('today'))->orderBy('dates', 'DESC')->take($stab)->get();
            foreach($upcoming2 as $key=>$val)
            {
                $upcoming2[$key]['list'] = strtotime($val['date']) - strtotime('today');
            }

            foreach ($upcoming2 as $item){
                array_push($arr, $item);
            }

        }
//

//
//        // reverse the sort to see result
//        $arr = array_reverse($arr);

//        return $arr; //test output

        $calender = Calender::orderBy('date', 'ASC')->take(5)->get();
        $tubes = Tube::orderBy('id', 'ASC')->take(3)->get();
        return view('pages.home')
            ->with('banners', $banners)
            ->with('brands', $brands)
            ->with('calender', $calender)
            ->with('tubes', $tubes)
            ->with('ming', $adds) //
            ->with('upcoming', $arr);
    }

    public function index2(){
        $newyear = 'January '. (intval(date('Y')) + 1);
        $ts = strtotime($newyear);

//        $upcoming = Program::where('dates', '>', strtotime('today'))->orderBy('dates', 'DESC')->take(3)->get();
        $upcoming = Program::where('dates', '<', $ts)->orderBy('dates', 'DESC')->select(['id', 'title', 'dates', 'venue'])->take(4)->get();
        $banners = Slider::where('active', true)->take(6)->get();
        return view('v2.page.home.index')
            ->with('banners', $banners)
            ->with('events', $upcoming);
    }

    public function about($type, $link){

        $data = Detail::where('link', $link)->where('type', $type)->first();

        //prevent errors
        if(empty($data)){return redirect()->route('home');}
        //load all group member
        $members = Detail::where('active', true)->where('type', $data->type)->select(['link', 'type', 'title'])->get();

        return !empty($data)?
            view('v2.page.about.index')
                ->with('details', $data )
                ->with('members', $members)
            : redirect()->route('home');
//
//        $content = Content::first();
//        return view('pages.about')->with('content', $content);
    }

    public function sponsorship(){
        return view('pages.sponsorship');
    }
    public function location(){
        $content = Content::first();
        return view('pages.location')->with('content', $content);
    }

    public function corevals(){

        $content = Content::first();
        $content = $content['corevals'];
        return view('pages.corevals')->with('corevals', $content);
    }

    public function contact(){

        return view('pages.contact');
    }

    public function vision(){

        $content = Content::first();

        $content1 = $content['vision'];

        $content2 = $content['mission'];

        return view('pages.vision')->with('vision', $content1)->with('mission', $content2);
    }

    public function project(){
        $allevents = Program::orderBy('date', 'DESC')->where('status', 1)->paginate(10);
        return view('pages.project')
            ->with('allevents', $allevents);
    }

    public function project_show($title){
        $program = Program::where('title', $title)->first();

        return view('pages.showproject')
            ->with('program', $program);
    }

    public function eventreg($title){
        $program = Program::where('title', $title)->first();

        return view('entrepreneur.pages.registerevent')
            ->with('program', $program);
    }

    public function facilitator(){
        return view('pages.facilitator');
    }

    public function volunteer(){
        return view('pages.volunteer');
    }

    public function team_trustee(){
        $people = People::where('office', 'trustee')->get();
        return view('pages.team.trustee')
            ->with('people',$people);
    }

    public function team_exco(){
        $people = People::where('office', 'exco')->get();
        return view('pages.team.exco')
            ->with('people',$people);
    }

    public function team_fac(){
        $people = People::where('office', 'facilitator')->get();
        return view('pages.team.facilitator')
            ->with('people',$people);
    }

    public function team_vol(){
        $people = People::where('office', 'volunteer')->get();
        return view('pages.team.volunteer')
            ->with('people',$people);
    }

    public function calenderview(Calender $calender){

        if($calender)
            return view('pages.calender.view')->with('calender',$calender);
        else
            return view('errors.404');

    }

    public function calenderall(){

        $calenders = Calender::orderBy('date', 'ASC')->get();

        if($calenders)
            return view('pages.calender.viewall')->with('calenders',$calenders);

    }

    public function calenderdelete(Request $request, Calender $calender){
        if($calender->delete()){
            return back()->withMessage('Calender Updated Successfully');
        }else {
            return back()->withErrors(array('message' => "Oops! You have already registered for this event!"));
        }
    }

    public function policies(){

        return view('pages.policies');

    }

    public function blog(){
        $blogs = Blog::paginate(12)->where('status','=',true);
//        return $blogs;
        return view('pages.blog.index')->with('blogs', $blogs)
            ->with('categories', Category::where('group','blog')->get())
            ->with('tops', Blog::where('status','=', true)->orderBy('hits','DESC')->take(5)->get());
    }

    public function blogread($slug){

        $blog = Blog::where('slug', $slug)->where('status','=',true)->first();

        if(count($blog)>0){
            //update blog
            $data['hits'] = $blog->hits+1;
            $blog->update($data);
//            return $blog;
            return view('pages.blog.read')
                ->with('blog', $blog)
                ->with('categories', Category::where('group','blog')->get())
                ->with('tops', Blog::where('status','=', true)->orderBy('hits','DESC')->take(5)->get());
        }else{
            return back();
        }

    }

    public function blogcategory($name){
        $category = Category::where('name', $name)->first();
        if(count($category)>0){
            $blogs = Blog::paginate(12)->where('status','=',true)->where('category_id',$category->id);
//        return $blogs;
            return view('pages.blog.category')->with('blogs', $blogs)
                ->with('categories', Category::where('group','blog')->get())
                ->with('name', $name)
                ->with('tops', Blog::where('status','=', true)->orderBy('hits','DESC')->take(5)->get());
        }else{
            return back();
        }

    }

    public function stafflogin(){
        return view('pages.staff.login');
    }

}
