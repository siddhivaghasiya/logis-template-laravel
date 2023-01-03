@extends('front.common.layout')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">

                        @if (isset($content))
                            <h2>{{ $content->quote_title }}</h2>
                            <p>{{ $content->quote_description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    @if (isset($content))
                        <li>{{ $content->quote_title }}</li>
                    @endif
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Get a Quote Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
        <div class="container" data-aos="fade-up">

            <div class="row g-0">

                @if (isset($content))
                    <div class="col-lg-5 quote-bg" style="background-image: url({{ asset('uploads/quote/'.$content->quote_image) }});"></div>
                @endif

                <div class="col-lg-7">

                    {{ Form::open([
                        'id' => 'quote',
                        'class' => 'FromSubmit php-email-form',
                        'url' => route('quote.store'),
                        'data-redirect_url' => route('quotepage.index'),
                        'name' => 'quote',
                        'enctype' => 'multipart/form-data',
                    ]) }}

                    @csrf

                    <h3>Get a quote</h3>
                    <p>Vel nobis odio laboriosam et hic voluptatem. Inventore vitae totam. Rerum repellendus enim linead
                        sero park flows.</p>

                    <div class="row gy-4">

                        <div class="col-md-6">
                            {!! Form::text('city', null, [
                                'id' => 'city',
                                'placeholder' => 'City of Departure',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="city_error"></span>
                        </div>

                        <div class="col-md-6">
                            {!! Form::text('delivery_city', null, [
                                'id' => 'delivery_city',
                                'placeholder' => 'Delivery City',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="delivery_city_error"></span>
                        </div>

                        <div class="col-md-6">
                            {!! Form::text('weight', null, [
                                'id' => 'weight',
                                'placeholder' => 'Total Weight (kg)',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="weight_error"></span>
                        </div>

                        <div class="col-md-6">
                            {!! Form::text('dimension', null, [
                                'id' => 'dimension',
                                'placeholder' => 'Dimensions (cm)',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="dimension_error"></span>
                        </div>

                        <div class="col-lg-12">
                            <h4>Your Personal Details</h4>
                        </div>

                        <div class="col-md-12">
                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'placeholder' => 'name',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="name_error"></span>
                        </div>

                        <div class="col-md-12 ">
                            {!! Form::text('email', null, [
                                'id' => 'email',
                                'placeholder' => 'email',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="email_error"></span>
                        </div>

                        <div class="col-md-12">
                            {!! Form::text('phone', null, [
                                'id' => 'phone',
                                'placeholder' => 'phone',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="phone_error"></span>
                        </div>

                        <div class="col-md-12">
                            {!! Form::textarea('message', null, [
                                'id' => 'message',
                                'placeholder' => 'message',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="message_error"></span>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit">Get a quote</button>
                        </div>

                    </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>
    </section><!-- End Get a Quote Section -->


    <script>
        $('form.FromSubmit').submit(function(event) {


            event.preventDefault();
            var formId = $(this).attr('id');
            //  if ($(this).valid()) {

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

                    console.log(jqXhr);

                    var errors = $.parseJSON(jqXhr.responseText);
                    showErrorMessages(formId, errors);

                }
            });
            return false;
            //  };
        });

        function showErrorMessages(formId, errorResponse) {

            $.each(errorResponse.errors, function(key, value) {

                // console.log(key);

                $.each(value, function(key2, value2) {

                    console.log(key, value2);
                    $("#" + key + '_error').html(value2);
                });



            });

        }
    </script>
@endsection
