<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class SocialmediaController extends Controller
{
    //

    public function index(){

        return view('admin.socialmedia.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Socialmedia::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('icon', function ($data) {
                return $data->icon;
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('link', function ($data) {
                return $data->link;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('socialmedia.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('socialmedia.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'icon', 'title', 'link', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Socialmedia::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Socialmedia::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Socialmedia::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.socialmedia.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Socialmedia;
        $obj->icon = $request->icon;
        $obj->title = $request->title;
        $obj->link = $request->link;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Socialmedia::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.socialmedia.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Socialmedia::where('id',Crypt::decrypt($id))->first();
        $obj->icon = $request->icon;
        $obj->title = $request->title;
        $obj->link = $request->link;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Socialmedia::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
