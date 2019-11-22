<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(intval(Auth::user()->who)===4 || Auth::user()->job === 'HRO'){
            $courses = Course::orderBy('id', 'DESC')->paginate(15);
            return view('admin.pages.course.index')
                ->with('courses', $courses);
        }else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.course.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $check = Course::where('title', $data['title'])->first();

        if(count($check)>0){
            return back()->withErrors(array('message'=>'Unable to Complete. Course already Exist. Please Change the Course Title'));
        }

        if(Course::create($data)){
            return redirect(route('console.courses'))->withMessage('New Course Added Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        return view('admin.pages.course.preview')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->all();
        if($course->update($data)){
            return back()->withMessage('Course Updated Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        if($course->delete()){
            return back()->withMessage('Course Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unkown Error Occured, Please Check and Try Again!'));
        }
    }
}
