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
                    Edit Content
                </li>

            </ul>
        </div>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Content
                    @endif

                    <hr>

                    <p class="card-description">Content info</p>

                    @if (isset($editdata))
                        {{ Form::model($editdata, [
                            'id' => 'content',
                            'class' => 'FromSubmit form-horizontal',
                            'data-redirect_url' => route('content.index'),
                            'url' => route('content.update', Crypt::encrypt($editdata->id)),
                            'method' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('home_title', null, [
                                'id' => 'home_title',
                                'placeholder' => 'Enter home title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('home_title'))
                                <span class="text-danger">{{ $errors->first('home_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('home_description', null, [
                                'id' => 'home_description',
                                'placeholder' => 'Enter home description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('home_description'))
                                <span class="text-danger">{{ $errors->first('home_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('about_title', null, [
                                'id' => 'about_title',
                                'placeholder' => 'Enter about title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('about_title'))
                                <span class="text-danger">{{ $errors->first('about_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('about_description', null, [
                                'id' => 'about_description',
                                'placeholder' => 'Enter about description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('about_description'))
                                <span class="text-danger">{{ $errors->first('about_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pricing Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('pricing_title', null, [
                                'id' => 'pricing_title',
                                'placeholder' => 'Enter pricing title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('pricing_title'))
                                <span class="text-danger">{{ $errors->first('pricing_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pricing Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('pricing_description', null, [
                                'id' => 'pricing_description',
                                'placeholder' => 'Enter pricing description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('pricing_description'))
                                <span class="text-danger">{{ $errors->first('pricing_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('service_title', null, [
                                'id' => 'service_title',
                                'placeholder' => 'Enter service title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('service_title'))
                                <span class="text-danger">{{ $errors->first('service_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('service_description', null, [
                                'id' => 'service_description',
                                'placeholder' => 'Enter service description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('service_description'))
                                <span class="text-danger">{{ $errors->first('service_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('contact_title', null, [
                                'id' => 'contact_title',
                                'placeholder' => 'Enter contact title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('contact_title'))
                                <span class="text-danger">{{ $errors->first('contact_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('contact_description', null, [
                                'id' => 'contact_description',
                                'placeholder' => 'Enter contact description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('contact_description'))
                                <span class="text-danger">{{ $errors->first('contact_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quote Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('quote_title', null, [
                                'id' => 'quote_title',
                                'placeholder' => 'Enter quote title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('quote_title'))
                                <span class="text-danger">{{ $errors->first('quote_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quote Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('quote_description', null, [
                                'id' => 'quote_description',
                                'placeholder' => 'Enter quote description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('quote_description'))
                                <span class="text-danger">{{ $errors->first('quote_description') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Single Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('service_single_title', null, [
                                'id' => 'service_single_title',
                                'placeholder' => 'Enter service single title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('service_single_title'))
                                <span class="text-danger">{{ $errors->first('service_single_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Single
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('service_single_description', null, [
                                'id' => 'service_single_description',
                                'placeholder' => 'Enter service single description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('service_single_description'))
                                <span class="text-danger">{{ $errors->first('service_single_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Team Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('team_title', null, [
                                'id' => 'team_title',
                                'placeholder' => 'Enter team title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('team_title'))
                                <span class="text-danger">{{ $errors->first('team_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Faq Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('faq_title', null, [
                                'id' => 'faq_title',
                                'placeholder' => 'Enter faq title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('faq_title'))
                                <span class="text-danger">{{ $errors->first('faq_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('image', null, [
                                'id' => 'image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/content/') }}/{{ $editdata->image }}" alt=""
                                    width="30%" height="30%" class="ab hide_image">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_image">Delete</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('title', null, [
                                'id' => 'title',
                                'placeholder' => 'Enter title',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label"> About Short
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('short_description', null, [
                                'id' => 'short_description ',
                                'placeholder' => 'Enter Description',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label"> About Long
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::text('long_description', null, [
                                'id' => 'long_description',
                                'class' => 'form-control editor-tinymce',
                            ]) !!}
                            @if ($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quote Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('quote_image', null, [
                                'id' => 'quote_image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/quote/') }}/{{ $editdata->quote_image }}" alt=""
                                    width="30%" height="30%" class="ab hide_imageqoute">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_imagequote">Delete</a>
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

        $(".delete_image").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.image') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '1') {

                        $('.hide_image').hide();
                        $('.delete_image').hide();

                    }
                }
            });

        });

        $(".delete_imagequote").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.image_quote') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '2') {

                        $('.hide_imageqoute').hide();
                        $('.delete_imagequote').hide();

                    }
                }
            });

        });
    </script>
@endsection
