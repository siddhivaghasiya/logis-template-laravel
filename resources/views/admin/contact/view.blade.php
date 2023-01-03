@extends('admin.layout')
@section('content')

    <div>
        <ul class="ab">
            <li class="ab">
                <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
            </li>
            <li class="ab">
                <a href="{{ route('contact.index') }}">Contact Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                View Contact
            </li>

        </ul>
    </div>


    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    &nbsp;
                    View Contac
                </h4>
                <hr>

                <p class="card-description">Contact Info</p>

                @if (isset($editdata))
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
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Subject :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->subject }}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Message :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->message }}

                        </div>
                    </div>
                @endif
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
