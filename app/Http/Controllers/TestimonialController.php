<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class TestimonialController extends Controller
{
    //

    public function index(){

        return view('admin.testimonial.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Testimonial::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('description', function ($data) {
                return $data->description;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/testimonial') . '/' . $data->image . '">';
            })

            ->editColumn('name', function ($data) {
                return $data->name;
            })


            ->editColumn('position', function ($data) {
                return $data->position;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })



            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('testimonial.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('testimonial.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id','description', 'image', 'name','position', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Testimonial::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Testimonial::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Testimonial::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.testimonial.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'description' => 'required',
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Testimonial;
        $obj->description = $request->description;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/testimonial/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/testimonial/', $filename);

            $obj->image = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Testimonial::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.testimonial.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'description' => 'required',
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Testimonial::where('id',Crypt::decrypt($id))->first();
        $obj->description = $request->description;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/testimonial/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/testimonial/', $filename);

            $obj->image = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Testimonial::where('id',Crypt::decrypt($id))->first();

        @unlink('uploads/testimonial/' . $obj->image);

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
