<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class TeamController extends Controller
{
    //

    public function index(){

        return view('admin.team.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Team::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('description', function ($data) {
                return $data->description;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/team') . '/' . $data->image . '">';
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

                $string = '<a href="'.route('team.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('team.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id','description', 'image', 'name','position', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Team::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Team::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Team::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.team.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'description' => 'required',
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
            't_link' => 'required',
            'f_link' => 'required',
            'i_link' => 'required',
            'l_link' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Team;
        $obj->description = $request->description;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->t_link = $request->t_link;
        $obj->f_link = $request->f_link;
        $obj->i_link = $request->i_link;
        $obj->l_link = $request->l_link;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/team/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/team/', $filename);

            $obj->image = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Team::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.team.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'description' => 'required',
            'image' => 'required',
            'name' => 'required',
            'position' => 'required',
            't_link' => 'required',
            'f_link' => 'required',
            'i_link' => 'required',
            'l_link' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Team::where('id',Crypt::decrypt($id))->first();
        $obj->description = $request->description;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->t_link = $request->t_link;
        $obj->f_link = $request->f_link;
        $obj->i_link = $request->i_link;
        $obj->l_link = $request->l_link;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/team/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/team/', $filename);

            $obj->image = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Team::where('id',Crypt::decrypt($id))->first();

        @unlink('uploads/team/' . $obj->image);

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
