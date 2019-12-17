<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(25);
        return view('admin.pages.faq.index')
            ->with('faqs',$faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faq.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new Faq();
        $faq->qst = $request->input('qst');
        $faq->unid = uniqid('_faq-', false);
        $faq->ans = $request->input('ans');
        $faq->active = true;

        $faq->save();

        return redirect()->route('faq.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show($unid)
    {
        $faq = Faq::whereUnid($unid)->first();
        return view('admin.pages.faq.show')
            ->with('faq', $faq);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unid)
    {
        $faq = Faq::whereUnid($unid)->first();
        if(!empty($faq)){
            $faq->qst = $request->input('qst');
            $faq->ans = $request->input('ans');
            $faq->update();

            return back()->withMessage('Updated');
        }

        return back()->withErrors(array('error'=>'Not found'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($unid)
    {
        $faq = Faq::whereUnid($unid)->first();
        if(!empty($faq)){
            $faq->active = false;
            $faq->update();
        }

        return back()->withErrors(array('error'=>'Not found'));
    }

    public function disable($unid)
    {
        $faq = Faq::whereUnid($unid)->first();
        if(!empty($faq)){
            $faq->active = false;
            $faq->update();
            return back()->withMessage('Completed');
        }

        return back()->withErrors(array('error'=>'Not found'));
    }

    public function enable($unid)
    {
        $faq = Faq::whereUnid($unid)->first();
        if(!empty($faq)){
            $faq->active = true;
            $faq->update();
            return back()->withMessage('Completed');
        }

        return back()->withErrors(array('error'=>'Not found'));
    }
}
