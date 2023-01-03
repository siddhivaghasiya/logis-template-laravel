<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class ContactController extends Controller
{
    //

    public function index(){

        return view('admin.contact.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Contact::select("*");


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

            ->editColumn('subject', function ($data) {
                return $data->subject;
            })

            ->editColumn('message', function ($data) {
                return $data->message;
            })

            ->addColumn('action', function ($data) {

                $string = ' <a href="javascript:void(0)" data-link="' . route('contact.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a>  <a href="'.route('contact.view',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-eye"></i> </a>';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'email', 'subject', 'message','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Contact::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Contact::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Contact::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }


    public function view($id){

         $editdata = \App\Models\Contact::where('id',Crypt::decrypt($id))->first();

        return view('admin.contact.view',compact('editdata'));
    }


    public function delete($id){

        $obj = \App\Models\Contact::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
