<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('blogger');
    }


    public function index()
    {
        $blogs = Blog::paginate(20);
        return view('admin.pages.blog.index')
            ->with('blogs', $blogs);
    }

    public function addblogcat(){
        return view('admin.pages.category.add2');
    }

    public function blogcat(Request $request){
        $data = $request->all();
        $data['group'] = 'blog';
//        return $data;
        if(Category::create($data)){
            return redirect(route('blog.create'))->with('message', 'New Category Added');
        }else{
            return back()->withErrors(array('message'=>"Unable to complete. Please try again."));
        }
    }

    public function create()
    {
        $cgs = Category::where('group', 'blog')->get();
        return view('admin.pages.blog.add')->with('categories', $cgs);
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
        $data['status'] = false;

        $request->validate([
            'detail' => 'required',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required',
            'type' => 'required',
            'banner' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'tags' => 'required',
        ]);



        if ($request->hasFile('banner')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('banner');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            if ($size > 600000) {
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
            }

            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $data['banner'] = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

            } else {

                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

            }
        }
        if(Blog::create($data)){
            return redirect(route('blog.index'))->withMessage('New Unpublished Blog Post Created Successfully.');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'))->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $cgs = Category::where('group', 'blog')->get();
        return view('admin.pages.blog.show')->with('categories', $cgs)->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->all();
        $data['status'] = false;

        if ($request->hasFile('banner')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('banner');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            if ($size > 600000) {
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
            }

            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $data['banner'] = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

            } else {

                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

            }
        }

        if($blog->update($data)){
            return back()->withMessage('Article Updated.');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'))->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if(!empty($blog)){
            if($blog->delete()){
                return back()->withMessage('Blog List Updated');
            }else{
                return back();
            }
        }else{
            return back()->withErrors(array('errors'=>'records not found'));
        }
    }

    public function unpublish(Blog $blog){
        $data['status'] = false;
        if(Auth::user()->who >= 3){
            if($blog->update($data)){
                return back()->withMessage('Article Un-Published');
            }else{
                return back()->withMessage('Article Could Not Be Un-Published');
            }
        }else{
            return back()->withMessage('Article Could Not Be Un-Published');
        }

    }

    public function publish(Blog $blog){
        $data['status'] = true;
        if(Auth::user()->who >= 3){
            if($blog->update($data)){
                return back()->withMessage('Article Published');
            }else{
                return back()->withMessage('Article Could Not Be Published');
            }
        }else{
            return back()->withMessage('Article Could Not Be Published');
        }

    }
}
