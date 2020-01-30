<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(intval(Auth::user()->who)===4 || Auth::user()->job === 'HRO'){
            $sliders = Slider::paginate(20);
            return view('admin.pages.slider.index')
                ->with('sliders', $sliders);
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
        return view('admin.pages.slider.add');
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
        if(empty($request->input('filepath'))){
            return back()->withErrors(array('error'=>'Image is highly required!'))->withInput($request->input());
        }

        $slider = new Slider();
        $slider->image = $request->input('filepath');
        $slider->writeup1 = $request->input('writeup1');
        $slider->writeup2 = $request->input('writeup2');
        $slider->creator = Auth::user()->id;
        $slider->active = true;
        $request->input('show_logo')==='on'?$slider->show_logo=true:$slider->show_logo=false;
        $request->input('show_btn')==='on'?$slider->show_btn=true:$slider->show_btn=false;
        $slider->save();

        return redirect()->route('slider.index')->withMessage('New Slider Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.slider.show')->with('slider', $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

        if(empty($request->input('filepath'))){
            return back()->withErrors(array('error'=>'Image is highly required!'))->withInput($request->input());
        }

        $slider->image = $request->input('filepath');
        $slider->writeup1 = $request->input('writeup1');
        $slider->writeup2 = $request->input('writeup2');
        $request->input('show_logo')==='on'?$slider->show_logo=true:$slider->show_logo=false;
        $request->input('show_btn')==='on'?$slider->show_btn=true:$slider->show_btn=false;

        $slider->update();

        return back()->withMessage('Slider Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(!empty($slider)){
            //unlink file path
            try{
                unlink($slider->image);
            }catch (\Exception $e){

            }
            $slider->delete();
        }

        return back()->withMessage('Completed.');
    }
}
