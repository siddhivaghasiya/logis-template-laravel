<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class HomeController extends Controller
{
    //
    public function index()
    {

        $content = \App\Models\Content::first();
        $service = \App\Models\Service::where('status',1)->take(3)->get();
        $getservice = \App\Models\Service::where('status',1)->get();
        $testimonial = \App\Models\Testimonial::where('status',1)->get();
        $pricing = \App\Models\Pricing::where('status',1)->get();
        $faq = \App\Models\Faq::where('status',1)->get();

        return view('front.home',compact('content','service','getservice','testimonial','faq','pricing'));
    }

    public function service()
    {
        $content = \App\Models\Content::first();
        $getservice = \App\Models\Service::where('status',1)->take(3)->get();
        $service = \App\Models\Service::where('status',1)->get();
        $testimonial = \App\Models\Testimonial::where('status',1)->get();
        $faq = \App\Models\Faq::where('status',1)->get();

        return view('front.service',compact('getservice','service','content','testimonial','faq'));
    }

    public function servicesingle($id)
    {
        $content = \App\Models\Content::first();
        $getservice = \App\Models\Service::where('slug', $id)->first();
        $service = \App\Models\Service::where('status',1)->get();

        return view('front.service-single', compact('getservice','service','content'));
    }

    public function about()
    {
        $content = \App\Models\Content::first();
        $team = \App\Models\Team::where('status',1)->get();
        $testimonial = \App\Models\Testimonial::where('status',1)->get();
        $faq = \App\Models\Faq::where('status',1)->get();


        return view('front.about',compact('content','team','testimonial','faq'));
    }
    public function pricing()
    {
        $content = \App\Models\Content::first();
        $pricing = \App\Models\Pricing::where('status',1)->get();


        return view('front.pricing',compact('content','pricing'));
    }

    public function contact()
    {
        $content = \App\Models\Content::first();
        $setting = \App\Models\Setting::first();


        return view('front.contact',compact('content','setting'));
    }

    public function contactstore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $obj = new \App\Models\Contact;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->subject = $request->subject;
        $obj->message = $request->message;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function quote()
    {
        $content = \App\Models\Content::first();

        return view('front.quote',compact('content'));
    }

    public function quotestore(Request $request){

        $request->validate([
            'city' => 'required',
            'delivery_city' => 'required',
            'weight' => 'required',
            'dimension' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $obj = new \App\Models\Quote;
        $obj->city = $request->city;
        $obj->delivery_city = $request->delivery_city;
        $obj->weight = $request->weight;
        $obj->dimension = $request->dimension;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->message = $request->message;

        $obj->save();

        return response()->json(['status' => 1]);
    }
}
