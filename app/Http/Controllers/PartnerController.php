<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();

        return view('admin.pages.partners.index')
            ->with('partners', $partners);
    }

    public function create()
    {
        return view('admin.pages.partners.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
//        $data['status'] = 1;
        if(Partner::create($data)){
            return redirect(route('console.partner'))->withMessage('New Partner Added Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }

    }
}
