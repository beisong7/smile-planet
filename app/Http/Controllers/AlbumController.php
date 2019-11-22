<?php

namespace App\Http\Controllers;

use App\Album;
use App\Picture;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::paginate(25);
        return view('admin.pages.album.index')
            ->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.album.add');
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
        $name = $data['title'];
        $count = Album::where('title',$name)->get();

        if(count($count) > 0){
            return back()->withErrors(array('message'=>'This title already exist'));
        }else{
            $data['status'] = 'active';
            if(Album::create($data)){
                return redirect(route('album.index'))->withMessage('New Album Added Successfully');
            }else{
                return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('admin.pages.album.edit')
            ->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    public function addpic(Album $album)
    {
        //get all pics in album
//         $pics = Picture::where('album_id', $album->id)->get();
        $pics = $album->picture;
        return view('admin.pages.album.picadd')
            ->with('pics', $pics)
            ->with('album', $album);
    }

    public function saveAlbumPics(Request $request)
    {
        $data = $request->all();
        $img = $data['images'];

        $save['title'] = 'title';
        $save['album_id'] = intval($data['album_id']);
        $save['status'] = 'active';

        foreach ($img as $id){
            $save['gallery_id'] = intval($id);
            Picture::create($save);
        }

        $res['success'] = true;
//        $res['data'] = $data;
        return json_encode($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $data = $request->all();
        if($album->update($data)){
            return back()->withMessage('Album Updated Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        foreach ($album->picture as $pic){
            $pic->delete();
        }

        if($album->delete()){
            return back()->withMessage('Album Deleted Successfully');
        }else{
            return back()->withErrors(array('message'=>'Unkown Error Occured, Please Check and Try Again!'));
        }
    }
}
