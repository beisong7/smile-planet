<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Gallery;
use Illuminate\Http\Request;

class BannerController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $target = $data['target'];

        $store['target'] = $target;
        $store['type'] = 'static';
        $store['title'] = $data['title'];
        $store['gallery_id'] = $data['gallery_id'];
        $idimg = $data['gallery_id'];


        $lenght = Banner::where('type','static')->where('target',$target)->first();

//        return json_encode(['lenght', count($lenght)]);


        if(count($lenght) > 0){

            if($lenght->update($store)){

                $file = Banner::orderBy('id', 'DESC')->where('target', $target)->first();
                $file['url'] = $file->gallery->url;

                $data['result'] = $file;
                $data['info'] = $lenght;
                $data['success'] = true;

                return json_encode($data);
            }else{
                $data['success'] = false;
                $data['result1'] = $lenght;
                return json_encode($data);
            }

        }

        else{

            if(Banner::create($store)){

                $file = Banner::orderBy('id', 'DESC')->where('target', $target)->first();
                if($file){

                    $file['url'] = $file->gallery->url;

                    $data['result'] = $file;
                    $data['info'] = $lenght;
                    $data['success'] = true;

                    return json_encode($data);
                }else{
                    $data['success'] = false;
                    $data['result2'] = false;
                    return json_encode($data);
                }
            }

            else{
                return json_encode(['lenght', 'failed to save']);
            }
        }

    }


    public function storeslide(Request $request){
        $data = $request->all();
        $res['result'] = [];

        foreach($data['arr'] as $id){
            //save or replace
            $id = intval($id);
            $store['target'] = $data['target'];
            $store['type'] = 'slider';
            $store['title'] = $data['target'];
            $store['gallery_id'] = $id;

            $target = $data['target'];

            $match = ['type' => 'slider', 'gallery_id'=>$id];

            //->get() = gets all values
            //->first() = gets the first of the values

            $exist = Banner::where('type','slider')->where('gallery_id',$id)->where('target',$target)->first();


            if($exist){
                //do nothing
            }else{
                if(Banner::create($store)){
                    $file = Banner::orderBy('id', 'DESC')->where($match)->first();
                    $file['url'] = $file->gallery->url;
                    array_push($res['result'], $file);
                }
            }
        }



        if(count($res['result']) > 0){
            $res['success'] = true;
            return json_encode($res);
        }else{
            $res['success'] = false;
            return json_encode($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    public function remover(Request $request){

        $data = $request->all();

        $banner = Banner::find($data['id']);
        $res['result'] = $banner;

        if($banner->delete()){
            $res['success'] = true;
            return json_encode($res);
        }else{
            $res['success'] = false;
            return json_encode($res);
        }
    }

    public function getimage(Request $request){
        $data = $request->all();
        $banner = Gallery::find($data['gallery_id']);
        $res['result'] = $banner;
        if($banner){
            $res['success'] = true;
            return json_encode($res);
        }else{
            $res['success'] = false;
            return json_encode($res);
        }

    }


}
