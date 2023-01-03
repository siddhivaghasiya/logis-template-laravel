@extends('front.common.layout')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">

                        @if (isset($content))

                        <h2>{{ $content->contact_title }}</h2>
                         <p>{{ $content->contact_description }}</p>

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
                        <li>{{ $content->contact_title }}</li>
                    @endif
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div>
                <iframe style="border:0; width: 100%; height: 340px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4 mt-4">

                <div class="col-lg-4">

                    @if (isset($setting))

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>{{ $setting->location }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>{{ $setting->email }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>{{ $setting->number }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    @endif

                </div>

                <div class="col-lg-8">

                    {{ Form::open([
                        'id' => 'contact',
                        'class' => 'FromSubmit',
                        'url' => route('contact.store'),
                        'data-redirect_url' => route('contactpage.index'),
                        'name' => 'contact',
                        'enctype' => 'multipart/form-data',
                    ]) }}

                    @csrf

                    <div class="row">

                        <div class="col-md-6 form-group">
                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="name_1"></span>

                        </div>

                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            {!! Form::email('email', null, [
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                                'class' => 'form-control',
                            ]) !!}
                           <span class="text-danger" id="email_1"></span>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        {!! Form::text('subject', null, [
                            'id' => 'subject',
                            'placeholder' => 'Enter subject',
                            'class' => 'form-control',
                        ]) !!}
                         <span class="text-danger" id="subject_1"></span>
                    </div>

                    <div class="form-group mt-3">
                        {!! Form::textarea('message', null, [
                            'id' => 'message',
                            'placeholder' => 'Enter message',
                            'class' => 'form-control',
                        ]) !!}
                        <span class="text-danger" id="message_1"></span>
                    </div>


                    <div class="text-center"><button class="btn btn-primary" type="submit">Send Message</button></div>
                </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->


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

                $.each(value,function(key2,value2){

                    console.log(key,value2);
                    $("#"+key+'_1').html(value2);
                });



            });

        }


    </script>
@endsection
