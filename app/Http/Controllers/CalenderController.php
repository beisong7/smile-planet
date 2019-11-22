<?php

namespace App\Http\Controllers;

use App\Calender;
use Illuminate\Http\Request;
use Auth;

class CalenderController extends Controller
{
    public function index(){
        if(Auth::user()->who ===4 || Auth::user()->job === ''){
            $table = Calender::paginate(25);
            return view('admin.pages.calender.index')
                ->with('tables', $table);
        }else{
            return back();
        }

    }

    public function create(){
        return view('admin.pages.calender.add');
    }

    public function preview(Calender $calender){
        return view('admin.pages.calender.preview')->with('calender', $calender);
    }

    public function store(Request $request){
        $data = $request->all();
        if(empty($data['venue'])){$data['venue'] = 'loading';}


        $theme = $data['theme'];


        if(empty($theme)){
            return back()->withErrors(array('message'=>'Sorry. Please a theme is required.'));
        }else{
            if(Calender::create($data)){
                return redirect(route('console.calender'))->withMessage('New Event Date Added Successfully');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
            }
        }
    }

    public function update(Calender $calender,Request $request)
    {
        $data = $request->all();

        if(empty($data['venue'])){$data['venue'] = 'loading';}


//        return $data;

        if($calender->update($data))
        {
            return back()->withMessage('Event Date updated Updated');
        }else{
            return back()->withErrors(array('message'=> 'Unable to complete, try again later'));
        }
    }
}
