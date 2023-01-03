 @extends('front.common.layout')

 @section('content')
     <!-- ======= Breadcrumbs ======= -->
     <div class="breadcrumbs">
         <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
             <div class="container position-relative">
                 <div class="row d-flex justify-content-center">
                     <div class="col-lg-6 text-center">

                        @if (isset($content))

                        <h2>{{ $content->service_single_title }}</h2>
                         <p>{{ $content->service_single_description }}</p>

                        @endif

                     </div>
                 </div>
             </div>
         </div>
         <nav>
             <div class="container">
                 <ol>
                     <li><a href="{{ route('home') }}">Home</a></li>
                     <li>{{ $content->service_single_title }}</li>
                 </ol>
             </div>
         </nav>
     </div><!-- End Breadcrumbs -->

     <!-- ======= Service Details Section ======= -->
     <section id="service-details" class="service-details">
         <div class="container" data-aos="fade-up">

             <div class="row gy-4">

                 <div class="col-lg-4">
                     <div class="services-list">
                         @if (isset($service))
                             @foreach ($service as $key => $v)
                                 <a href="#" class="active">{{ $v->name }}</a>
                             @endforeach
                         @endif
                     </div>

                     @if (isset($getservice))
                         <h4>{{ $getservice->title }}</h4>
                         <p>{{ $getservice->description }}</p>
                 </div>

                 <div class="col-lg-8">
                     <img src="{{ asset('uploads/service/' . $getservice->image) }}" alt=""
                         class="img-fluid services-img">
                     <h3>{{ $getservice->sub_title }}</h3>
                     <p>
                         {{ $getservice->long_description }}
                     </p>
                 </div>
                 @endif
             </div>

         </div>
     </section><!-- End Service Details Section -->
 @endsection
