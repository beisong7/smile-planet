<?php

namespace App\Http\Controllers;

use App\Album;
use App\Banner;
use App\Category;
use App\Content;
use Illuminate\Http\Request;

class FoundationController extends Controller
{
    public function index()
    {
        $banner = Banner::where('type', 'slider')->get();
        $content = Content::first();
        return view('foundation.pages.home')
            ->with('banner', $banner)
            ->with('content', $content);
    }

    public function what_we_do(){
        $content = Content::first();
        return view('foundation.pages.whatwedo')
            ->with('content', $content);
    }
    public function objectives(){
        $content = Content::first();
        return view('foundation.pages.aimsandobjectives')
            ->with('content', $content);
    }

    public function albums(){
        $albums = Album::orderBy('id', 'DESC')->where('type', 'humanitarian')->paginate(12);
        return view('foundation.pages.albums')
            ->with('albums', $albums);
    }
    public function album_view($title){
        $album = Album::where('title', $title)->first();
        $pic = $album->picture;
        return view('foundation.pages.albumview')
            ->with('picture',$pic)
            ->with('album',$album);
    }

    public function ourwork($topic){

        if(!empty($topic)){
            $details = Category::where('group', 'ourwork')->where('topic',$topic)->first();
            if(count($details) > 0)
                return view("foundation.pages.category")->with('details', $details);
            else
                return back();
        }else{
            return view('errors.404');
        }
    }
    public function campaign($topic){

        if(!empty($topic)){
            $details = Category::where('group', 'campaign')->where('topic',$topic)->first();
            if(count($details) > 0)
                return view("foundation.pages.category")->with('details', $details);
            else
                return back();
        }else{
            return view('errors.404');
        }
    }

}
