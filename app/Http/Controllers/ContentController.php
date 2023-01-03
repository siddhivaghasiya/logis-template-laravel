<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class ContentController extends Controller
{
    //

    public function index()
    {

        $editdata = \App\Models\Content::first();

        return view('admin.content.addedit', compact('editdata'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'home_title' => 'required',
            'home_description' => 'required',
            'about_title' => 'required',
            'about_description' => 'required',
            'pricing_title' => 'required',
            'pricing_description' => 'required',
            'service_title' => 'required',
            'service_description' => 'required',
            'contact_title' => 'required',
            'contact_description' => 'required',
            'quote_title' => 'required',
            'quote_description' => 'required',
            'service_single_title' => 'required',
            'service_single_description' => 'required',
            'team_title' => 'required',
            'faq_title' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);


        $obj =  \App\Models\Content::where('id', Crypt::decrypt($id))->first();
        $obj->home_title = $request->home_title;
        $obj->home_description = $request->home_description;
        $obj->about_title = $request->about_title;
        $obj->about_description = $request->about_description;
        $obj->service_title = $request->service_title;
        $obj->service_description = $request->service_description;
        $obj->pricing_title = $request->pricing_title;
        $obj->pricing_description = $request->pricing_description;
        $obj->contact_title = $request->contact_title;
        $obj->contact_description = $request->contact_description;
        $obj->quote_title = $request->quote_title;
        $obj->quote_description = $request->quote_description;
        $obj->service_single_title = $request->service_single_title;
        $obj->service_single_description = $request->service_single_description;
        $obj->team_title = $request->team_title;
        $obj->faq_title = $request->faq_title;
        $obj->title = $request->title;
        $obj->short_description = $request->short_description;
        $obj->long_description = $request->long_description;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/content/' . $obj->image);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/content/', $filename);

            $obj->image = $filename;
        }

        $img1 = $request->file('quote_image');

        if ($request->hasFile('quote_image')) {

            @unlink('uploads/quote/' . $obj->quote_image);
            $filename1 = rand() . '.' . $img1->getClientOriginalExtension();
            $img1->move('uploads/quote/', $filename1);

            $obj->quote_image = $filename1;
        }


        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete()
    {

        $obj = \App\Models\Content::first();
        @unlink('uploads/content/' . $obj->image);

        $obj->image = null;


        $obj->save();

        return response()->json(['status' => '1']);
    }

    public function delete_quote()
    {

        $obj = \App\Models\Content::first();
        @unlink('uploads/quote/' . $obj->quote_image);

        $obj->quote_image = null;


        $obj->save();

        return response()->json(['status' => '2']);
    }
}
