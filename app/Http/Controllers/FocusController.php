<?php

namespace App\Http\Controllers;

use App\Focus;
use Illuminate\Http\Request;

class FocusController extends Controller
{
    //
    public function save(Request $request){
        $data = $request->all();

        $content = Focus::first();
        if($content){
            if($content->update($data)){
                return back()->withMessage('Operation Successful');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete Request. Please Try Again Later'));
            }
        }else{
            if(Focus::create($data)){
                return back()->withMessage('Operation Successful');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete Request. Please Try Again Later'));
            }
        }
    }
}
