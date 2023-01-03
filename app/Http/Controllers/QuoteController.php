<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class QuoteController extends Controller
{
    //

    public function index(){

        return view('admin.quote.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Quote::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('email', function ($data) {
                return $data->email;
            })

            ->editColumn('phone', function ($data) {
                return $data->phone;
            })

            ->editColumn('message', function ($data) {
                return $data->message;
            })

            ->addColumn('action', function ($data) {

                $string = ' <a href="javascript:void(0)" data-link="' . route('quote.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a>  <a href="'.route('quote.view',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-eye"></i> </a>';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'email', 'phone', 'message','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Quote::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Quote::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Quote::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }


    public function view($id){

         $editdata = \App\Models\Quote::where('id',Crypt::decrypt($id))->first();

        return view('admin.quote.view',compact('editdata'));
    }


    public function delete($id){

        $obj = \App\Models\Quote::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
