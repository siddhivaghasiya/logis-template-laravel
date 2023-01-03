@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i
                        class="mdi mdi-record
            "></i>
                </li>

                <li class="ab active">
                    Edit Setting
                </li>

            </ul>
        </div>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp;
                        Edit Setting


                    <hr>

                    <p class="card-description">Setting info</p>

                    @if (isset($editdata))
                        {{ Form::model($editdata, [
                            'id' => 'setting',
                            'class' => 'FromSubmit form-horizontal',
                            'data-redirect_url' => route('setting.index'),
                            'url' => route('setting.update', Crypt::encrypt($editdata->id)),
                            'method' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-9">
                            {!! Form::text('logo', null, [
                                'id' => 'logo',
                                'placeholder' => 'Enter logo',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('logo'))
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Copyright</label>
                        <div class="col-sm-9">
                            {!! Form::text('copyright', null, [
                                'id' => 'copyright',
                                'placeholder' => 'Enter copyright',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('copyright'))
                                <span class="text-danger">{{ $errors->first('copyright') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            {!! Form::text('location', null, [
                                'id' => 'location',
                                'placeholder' => 'Enter location',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('location'))
                                <span class="text-danger">{{ $errors->first('location') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email </label>
                        <div class="col-sm-9">
                            {!! Form::text('email', null, [
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Number</label>
                        <div class="col-sm-9">
                            {!! Form::text('number', null, [
                                'id' => 'number',
                                'placeholder' => 'Enter number',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, [
                                'id' => 'status',
                                'placeholder' => 'select status',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>


                    {!! Form::submit('submit', ['class' => 'btn btn-primary', 'id' => 'saveBtn']) !!}

                    <a href="{{ route('admin') }}" class="btn btn-danger">Cancle</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        $('form.FromSubmit').submit(function(event) {


            event.preventDefault();
            var formId = $(this).attr('id');
            // if ($(this).valid()) {

            var formAction = $(this).attr('action');
            var $btn = $('#' + formId + ' button[type="submit"]').button('loading');
            var redirectURL = $(this).data("redirect_url");
            $.ajax({
                type: "POST",
                url: formAction,
                data: new FormData(this),
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                success: function(response) {
                    if (response.status == 1 && response.msg != "") {
                        window.location = redirectURL;
                    }
                },
                error: function(jqXhr) {
                    // var errors = $.parseJSON(jqXhr.responseText);
                    //     showErrorMessages(formId, errors);
                    // $btn.button('reset');
                }
            });
            return false;
            // };
        });

    </script>
@endsection
