<?php

namespace App\Http\Controllers;

use App\Pform;
use Illuminate\Http\Request;

class PformController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pform  $pform
     * @return \Illuminate\Http\Response
     */
    public function show(Pform $pform)
    {
        //
    }

    public function enrollmentInfo($id){
        $form = Pform::where('id', $id)->first();
        return !empty($form)?view('admin.pages.application.enroll_preview')->with('form', $form):back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pform  $pform
     * @return \Illuminate\Http\Response
     */
    public function edit(Pform $pform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pform  $pform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pform $pform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pform  $pform
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = Pform::where('id', $id)->first();

        if(empty($form)){
            return back()->withMessage('Form Not Found');
        }

        $form->delete();
        return back()->withMessage('Form Deleted');
    }
}
