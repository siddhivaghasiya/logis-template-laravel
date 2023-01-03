<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class FaqController extends Controller
{
    //

    public function index(){

        return view('admin.faq.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Faq::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('question', function ($data) {
                return $data->question;
            })

            ->editColumn('answer', function ($data) {
                return $data->answer;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('faq.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('faq.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'question', 'answer', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Faq::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Faq::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Faq::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.faq.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Faq;
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Faq::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.faq.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Faq::where('id',Crypt::decrypt($id))->first();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Faq::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
