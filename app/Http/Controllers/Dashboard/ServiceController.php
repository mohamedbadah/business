<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        return view("dashboard.services.index",compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.services.create");
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
            'name'=>'required|string|min:2|max:25',
             'description'=>'nullable',
        ]);
       $request->merge([
        'slug'=>Str::slug($request->post("name")),
       ]);
       try{
        $data=$request->except('image');
        $data['image']=$this->uploadImage($request);
        Service::create($data);
       }catch(Exception $e){
             return redirect()->route('admin.service.index')->withErrors(['error'=>$e->getMessage()]);
       }
     
       return redirect()->route('admin.service.index')->with("success","successfully created new services");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view("dashboard.services.edit",compact("service"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'=>'required|string|min:2|max:25',
             'description'=>'nullable',
        ]);
        try{
            $request->merge([
                'slug'=>Str::slug($request->post("name")),
            ]);
            $data=$request->except('image');
            $old_image=$service->image;
            $new_image=$this->uploadImage($request);
            if($new_image){
                $data['image']=$new_image;
            }
            $service->update($data);
            if($new_image && $old_image){
                Storage::disk("public")->delete($old_image);
            }
            return redirect()->route('admin.service.index')->with("success","successfully update service");
        }catch(Exception $e){
            return redirect()->route('admin.service.index')->withErrors(['error'=>$e->getMessage()]);
        }
        
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $deleteService=$service->delete();
        if($deleteService){
            Storage::disk("public")->delete($service->image);
            return redirect()->back()->with("success","successfully deleted item");
        }
    }

    protected function uploadImage(Request $request){
        if(!$request->hasFile('image')){
            return ;
        } 
            $file=$request->file("image");
            $new_image="service".time().".".$file->getClientOriginalExtension();
            $path=$file->storeAs("uploads",$new_image,[
                'disk'=>'public'
            ]);
            return $path;
    }
}
