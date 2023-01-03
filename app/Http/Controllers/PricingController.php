<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class PricingController extends Controller
{
    //
    public function index(){

        return view('admin.pricing.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Pricing::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('amount', function ($data) {
                return $data->amount;
            })

            ->editColumn('long_description', function ($data) {
                return $data->long_description;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('pricing.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('pricing.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'title', 'amount', 'long_description','status','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Pricing::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Pricing::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Pricing::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.pricing.addedit');
    }


    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Pricing;
        $obj->title = $request->title;
        $obj->amount = $request->amount;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Pricing::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.pricing.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Pricing::where('id',Crypt::decrypt($id))->first();
        $obj->title = $request->title;
        $obj->amount = $request->amount;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Pricing::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }



}
