<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::paginate(15);
        return view('admin.pages.team.index')
            ->with('people', $people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.team.add');
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


        if(People::create($data)){
            return redirect(route('people.index'))->withMessage('New Person Added Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $person)
    {
//        return $person;
        return view('admin.pages.team.edit')
            ->with('person', $person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $person)
    {
        if($person->update($request->all())){
            return back()->withMessage('Person Updated Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $person)
    {
        if($person->delete()){
            return back()->withMessage('Person Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }
}
