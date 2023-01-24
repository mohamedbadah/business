<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMessage;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $section=Section::latest()->first();
        return view("front.home",compact("section"));
    }
    public function service(){
    $services=Service::latest()->limit(8)->get();
    return view("front.service",compact("services"));
    }
    public function blog(){
        $blogs=Blog::latest()->limit(3)->get();
        return view("front.blog",compact("blogs"));
    }

    public function contactSubmit(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject'=>'required',
            'message' => 'required',
        ]);

        $data = $request->except('_token');

        Mail::to('admin@admin.com')->send(new SendMessage($data));

        return redirect()->route('contact')->with("success","تم الارسال بنجاح");
    }

    public function contact() {
        return view('front.contact');
    }
}
