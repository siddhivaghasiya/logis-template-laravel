@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i>    <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
                </li>
                <li class="ab">
                      <a href="{{ route('faq.index') }}">FAQ Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit FAQ
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i>   <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
        "></i>
            </li>
            <li class="ab">
                <a href="{{ route('faq.index') }}">FAQ Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add FAQ
            </li>

        </ul>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit FAQ
                    @else
                        Add FAQ
                    @endif

                    <hr>

                    <p class="card-description">FAQ info</p>

                    @if (isset($editdata))
                    {{ Form::model($editdata, [
                        'id' => 'faq',
                        'class' => 'FromSubmit form-horizontal',
                        'data-redirect_url' => route('faq.index'),
                        'url' => route('faq.update', Crypt::encrypt($editdata->id)),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @else
                    {{ Form::open([
                        'id' => 'faq',
                        'class' => 'FromSubmit form-horizontal',
                        'url' => route('faq.store'),
                        'data-redirect_url' => route('faq.index'),
                        'name' => 'faq',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Question</label>
                        <div class="col-sm-9">
                            {!! Form::text('question', null, [
                                'id' => 'question',
                                'placeholder' => 'Enter question',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('question'))
                                <span class="text-danger">{{ $errors->first('question') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Answer</label>
                        <div class="col-sm-9">
                            {!! Form::text('answer', null, [
                                'id' => 'answer',
                                'placeholder' => 'Enter answer',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('answer'))
                                <span class="text-danger">{{ $errors->first('answer') }}</span>
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

                    <a href="{{ route('faq.index') }}" class="btn btn-danger">Cancle</a>

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
