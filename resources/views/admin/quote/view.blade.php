@extends('admin.layout')
@section('content')

    <div>
        <ul class="ab">
            <li class="ab">
                <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
            </li>
            <li class="ab">
                <a href="{{ route('contact.index') }}">Quote Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
              View  Quote
            </li>

        </ul>
    </div>


    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    &nbsp;
                    View Get A Quote
                </h4>
                <hr>

                <p class="card-description">Get A Quote Info</p>

                @if (isset($editdata))

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">City :-</label>
                    <div class="col-sm-9">
                        {{ $editdata->city }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Delivery City :-</label>
                    <div class="col-sm-9">
                        {{ $editdata->delivery_city }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Weight :-</label>
                    <div class="col-sm-9">
                        {{ $editdata->weight }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Dimension :-</label>
                    <div class="col-sm-9">
                        {{ $editdata->dimension }}
                    </div>
                </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->name }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->email }}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phone :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->phone }}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Message :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->message }}

                        </div>
                    </div>
                @endif

                <a href="{{ route('quote.index') }}" class="btn btn-danger">Cancle</a>
            </div>
        </div>
    </div>


@endsection
