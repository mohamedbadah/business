<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::latest()->get();
        return view("dashboard.blogs.index",compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:png,jpg',
            'logo'=>'image|mimes:png,jpg'
        ]);
        try{
            $request->merge([
                'slug'=>Str::slug($request->post("name")),
            ]);
            $data=$request->except('image','logo');
            $data['image']=$this->uploadImage($request,"image");
            $data['logo']=$this->uploadImage($request,"logo");
            // dd($data);
            Blog::create($data);
         return redirect()->route('admin.blog.index')->with("success","successfully created new blog");
        }catch(Exception $e){
         return redirect()->route('admin.blog.index')->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view("dashboard.blogs.edit",compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        try{
         $request->merge([
            'slug'=>Str::slug($request->post("name")),
         ]);
         $data=$request->except("logo","image");
         $new_image=$this->uploadImage($request,"image");
         $old_image=$blog->image;
         if($new_image){
            $data['image']=$new_image;
         }
         $new_logo=$this->uploadImage($request,"logo");
         $old_logo=$blog->logo;
         if($new_logo){
            $data['logo']=$new_logo;
         }
         $blog->update($data);
         if($new_image && $old_image){
            Storage::disk("public")->delete($old_image);
         }
         if($new_logo && $old_logo){
            Storage::disk("public")->delete($old_logo); 
         }
         return redirect()->route("admin.blog.index")->with("success","successfully update blog");

        }catch(Exception $e){
            return redirect()->route("admin.blog.index")->withErrors(["error"=>$e->getMessage()]);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $deleteBlog=$blog->delete();
        if($deleteBlog){
            Storage::disk("public")->delete($blog->image);
            Storage::disk("public")->delete($blog->logo);
            return redirect()->back()->with("success","successfully deleted item");
        }
        
    }

    protected function uploadImage(Request $request,$image){
        if(!$request->hasFile($image)){
            return ;
        } 
            $file=$request->file($image);
            $new_image="blog".rand().".".$file->getClientOriginalExtension();
            $path=$file->storeAs("uploads",$new_image,[
                'disk'=>'public'
            ]);
            return $path;
    }
}
