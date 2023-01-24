<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=Section::latest()->limit(1)->get();
        return view("dashboard.section.index",compact("sections"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.section.create");
        
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
            'title'=>'required|string|min:2|max:25',
             'description'=>'nullable',
             'url_video'=>'url'
        ]);
       try{
        $data=$request->except('image');
        $data['image']=$this->uploadImage($request);
        $old_section=Section::latest()->first();
        $section=Section::create($data);
        if($section){
            $old_section->delete();
        }
        return redirect()->route('admin.section.index')->with("success","successfully created new section");
       }catch(Exception $e){
             return redirect()->route('admin.section.index')->withErrors(['error'=>$e->getMessage()]);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view("dashboard.section.edit",compact("section"));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'title'=>'required|string|min:2|max:25',
             'description'=>'nullable',
             'url_video'=>'url'
        ]);
        try{
            $data=$request->except('image');
            $old_image=$section->image;
            $new_image=$this->uploadImage($request);
            if($new_image){
                $data['image']=$new_image;
            }
            $section->update($data);
            if($new_image && $old_image){
                Storage::disk("public")->delete($old_image);
            }
            return redirect()->route('admin.section.index')->with("success","successfully update service");
        }catch(Exception $e){
            return redirect()->route('admin.section.index')->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }

    protected function uploadImage(Request $request){
        if(!$request->hasFile('image')){
            return ;
        } 
            $file=$request->file("image");
            $new_image="section".time().".".$file->getClientOriginalExtension();
            $path=$file->storeAs("uploads",$new_image,[
                'disk'=>'public'
            ]);
            return $path;
    }
}
