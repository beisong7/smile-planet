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

    public function edit(Partner $partner){
        return view('admin.pages.partners.edit')->with('partner', $partner);
    }

    public function store(Request $request)
    {
//        $data['status'] = 1;
        $partner = new Partner();
        $partner->name = $request->input('name');
        $partner->gallery_id = $request->input('gallery_id');
        $partner->type = $request->input('type');
        $partner->active = true;
        $partner->save();

        return redirect(route('console.partner'))->withMessage('New Partner Added Successfully');
    }

    public function update(Request $request, Partner $partner){
        $partner->name = $request->input('name');
        $partner->gallery_id = $request->input('gallery_id');
        $partner->type = $request->input('type');
        $partner->update();

        return back()->withMessage('Updated!');
    }
}
