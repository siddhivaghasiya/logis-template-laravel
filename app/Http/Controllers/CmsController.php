<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class CmsController extends Controller
{
    //
    public function index(){

        return view('admin.cms.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Cms::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('sub_title', function ($data) {
                return $data->sub_title;
            })
            ->editColumn('decription', function ($data) {
                return $data->decription;
            })

            ->editColumn('long_description', function ($data) {
                return $data->long_description;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('cms.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('cms.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'title', 'sub_title', 'description', 'long_description','status','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Cms::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Cms::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Cms::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.cms.addedit');
    }


    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Cms;
        $obj->title = $request->title;
        $obj->sub_title = $request->sub_title;
        $obj->description = $request->description;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->title,'-');

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Cms::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.cms.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Cms::where('id',Crypt::decrypt($id))->first();
        $obj->title = $request->title;
        $obj->sub_title = $request->sub_title;
        $obj->description = $request->description;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->title,'-');

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Cms::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }


    public function detail($myslug){

        $myData = \App\Models\Cms::where('slug',$myslug)->firstOrFail();

        return view('dynamic',compact('myData'));

    }
}
