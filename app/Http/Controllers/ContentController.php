<?php

namespace App\Http\Controllers;

use App\Content;
use App\Gallery;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function save(Request $request){
        $data = $request->all();
        if(!empty($data['f_what_we_do_img'])){
            $durl = Gallery::find($data['f_what_we_do_img']);
            $data['f_what_we_do_img'] = $durl->url;

        }else{
            unset($data['f_what_we_do_img']);
        }

        if(!empty($data['f_aims_obj_img'])){
            $durl = Gallery::find($data['f_aims_obj_img']);
            $data['f_aims_obj_img'] = $durl->url;

        }else{
            unset($data['f_aims_obj_img']);
        }

        if(!empty($data['f_reach_img'])){
            $durl = Gallery::find($data['f_reach_img']);
            $data['f_reach_img'] = $durl->url;

        }else{
            unset($data['f_reach_img']);
        }
        $content = Content::first();
        if($content){
            if($content->update($data)){
                return back()->withMessage('Operation Successful');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete Request. Please Try Again Later'));
            }
        }else{
            if(Content::create($data)){
                return back()->withMessage('Operation Successful');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete Request. Please Try Again Later'));
            }
        }
    }
}
