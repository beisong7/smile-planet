<?php

namespace App\Http\Controllers;

use App\ads;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $ads = ads::paginate(20);
        return view('admin.pages.ads.index')
            ->with('ads', $ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.ads.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!empty($request->input('target'))){
            $data = array();
            $data = $request->all();


            if ($request->hasFile('l_img')) {

                $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

                $photo = $request->file('l_img');

//            $filename = $photo->getClientOriginalName();


                $extension = $photo->getClientOriginalExtension();

                $extension = strtolower($extension);

                $size = $photo->getSize();

//            return $size;

                if ($size > 200000) {
                    return back()->withErrors(array('message'=>"This Image is too large. Compress and try again."))->withInput($request->input());
                }

                $time = Carbon::now();

                $check = in_array(strtolower($extension), $allowedfileExtension);

                $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

                if ($check) {

                    $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                    $data['l_img'] = $directory . '/' . $filename;

                    $photo->storeAs($directory, $filename, 'public');



//              release memory... lol
//              ini_set('memory_limit', $limit);

                } else {

                    return back()->withErrors(array('message' => 'Your Image must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

                }
            }
            if ($request->hasFile('p_img')) {

                $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

                $photo = $request->file('p_img');

//            $filename = $photo->getClientOriginalName();


                $extension = $photo->getClientOriginalExtension();

                $extension = strtolower($extension);

                $size = $photo->getSize();

//            return $size;

                if ($size > 200000) {
                    return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
                }

                $time = Carbon::now();

                $check = in_array(strtolower($extension), $allowedfileExtension);

                $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

                if ($check) {

                    $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                    $data['p_img'] = $directory . '/' . $filename;

                    $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

                } else {

                    return back()->withErrors(array('message' => 'Your Image must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

                }
            }

            $data['active'] = false;

            if(ads::create($data)){
                return redirect(route('ads.manage'))->withMessage('New Product Added.');
            }else{
                return back()->withErrors(array('error'=>'Unable to Complete! Try again.'))->withInput($request->input());
            }


//            return $request->all();
        }

        else{
            return back()->withErrors(array('error'=>'One or more fields entry is wrong or empty!'))->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function activate(ads $ads){
        if(!empty($ads)){
            $data['active']=true;
            //check if any other ads is active
            $active = ads::where('active', true)->first();
//            return var_dump($active);

            if(!empty($active) > 0){
                return back()->withErrors(array('error'=>'One or more Ads are active'));
            }
            if($ads->update($data)){
                return back()->withMessage('One Ads Activated.');
            }else{
                return back();
            }

        }else{
            return back();
        }
    }

    public function deactivate(ads $ads){
        if(!empty($ads)){
            $data['active']=false;
            if($ads->update($data)){
                return back()->withMessage('One Ads Deactivated.');
            }else{
                return back();
            }

        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(ads $ads)
    {
        //
    }
}
