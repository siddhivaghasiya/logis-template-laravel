 @extends('front.common.layout')

 @section('content')

     <main id="main">

         <!-- ======= Breadcrumbs ======= -->
         <div class="breadcrumbs">
             <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
                 <div class="container position-relative">
                     <div class="row d-flex justify-content-center">
                         <div class="col-lg-6 text-center">

                             @if (isset($content))
                                 <h2>{{ $content->service_title }}</h2>
                                 <p>{{ $content->service_description }}</p>
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
                             <li>{{ $content->service_title }}</li>
                         @endif
                     </ol>
                 </div>
             </nav>
         </div><!-- End Breadcrumbs -->

         <!-- ======= Featured Services Section ======= -->
         <section id="featured-services" class="featured-services">
             <div class="container">

                 <div class="row gy-4">

                     @if (isset($getservice))
                         @foreach ($getservice as $key => $v)
                             <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                                 <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
                                 <div>
                                     <h4 class="title">{{ $v->title }}</h4>
                                     <p class="description">{{ $v->description }}</p>
                                     <a href="service-details.html" class="readmore stretched-link"><span>Learn
                                             More</span><i class="bi bi-arrow-right"></i></a>
                                 </div>
                             </div>
                             <!-- End Service Item -->
                         @endforeach
                     @endif

                 </div>

             </div>
         </section><!-- End Featured Services Section -->

         <!-- ======= Services Section ======= -->
         <section id="service" class="services pt-0">
             <div class="container" data-aos="fade-up">

                 <div class="section-header">

                     @if (isset($content))
                         <span>Our {{ $content->service_title }}</span>
                         <h2>Our {{ $content->service_title }}</h2>
                     @endif

                 </div>

                 <div class="row gy-4">

                     @if (isset($service))
                         @foreach ($service as $key => $v)
                             <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                 <div class="card">
                                     <div class="card-img">
                                         <img src="{{ asset('uploads/service/' . $v->image) }}" alt=""
                                             class="img-fluid">
                                     </div>
                                     <h3><a href="{{ route('service.single', $v->slug) }}"
                                             class="stretched-link">{{ $v->name }}</a></h3>
                                     <p>{{ $v->description }}</p>
                                 </div>
                             </div><!-- End Card Item -->
                         @endforeach
                     @endif

                 </div>

             </div>
         </section><!-- End Services Section -->

         <!-- ======= Features Section ======= -->
         <section id="features" class="features">
             <div class="container">

                 @if (isset($service))
                     @foreach ($service as $key => $v)
                         @if ($key % 2 == 0)
                             <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

                                 <div class="col-md-5">
                                     <img src="{{ asset('uploads/service/' . $v->image) }}" class="img-fluid" alt="">
                                 </div>
                                 <div class="col-md-7">
                                     <h3>{{ $v->title }}</h3>
                                     <p class="fst-italic">
                                         {{ $v->description }}
                                     </p>
                                     <ul>
                                         <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                             consequat.</li>
                                         <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate
                                             velit.</li>
                                         <li><i class="bi bi-check"></i> Ullam est qui quos consequatur eos accusamus.</li>
                                     </ul>
                                 </div>
                             </div><!-- Features Item -->
                         @else
                             <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                                 <div class="col-md-5 order-1 order-md-2">
                                     <img src="{{ asset('uploads/service/' . $v->image) }}" class="img-fluid" alt="">
                                 </div>
                                 <div class="col-md-7 order-2 order-md-1">
                                     <h3>{{ $v->title }}</h3>
                                     <p class="fst-italic">
                                         {{ $v->description }}
                                     </p>
                                     <p>
                                         Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                         reprehenderit in voluptate
                                         velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                         cupidatat non proident, sunt in
                                         culpa qui officia deserunt mollit anim id est laborum
                                     </p>
                                 </div>
                             </div><!-- Features Item -->
                         @endif
                     @endforeach
                 @endif
             </div>
         </section><!-- End Features Section -->

         <!-- ======= Testimonials Section ======= -->
         <section id="testimonials" class="testimonials">
             <div class="container">
                 <div class="slides-1 swiper" data-aos="fade-up">
                     <div class="swiper-wrapper">

                        @if (isset($testimonial) && !$testimonial->isEmpty())
                        @foreach ($testimonial as $key => $v)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{ asset('uploads/testimonial/' . $v->image) }}" class="testimonial-img"
                                        alt="">
                                    <h3>{{ $v->name }}</h3>
                                    <h4>{{ $v->position }}</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        {{ $v->description }}
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    @endif
                     </div>
                     <div class="swiper-pagination"></div>
                 </div>

             </div>
         </section><!-- End Testimonials Section -->

         <!-- ======= Frequently Asked Questions Section ======= -->
         <section id="faq" class="faq">
             <div class="container" data-aos="fade-up">


            <div class="section-header">
                @if (isset($content))
                    <span>{{ $content->faq_title }}</span>
                    <h2>{{ $content->faq_title }}</h2>
                @endif

            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-10">

                    <div class="accordion accordion-flush" id="faqlist">


                        @if (isset($faq) && !$faq->isEmpty())
                            @foreach ($faq as $key => $v)
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                            <i class="bi bi-question-circle question-icon"></i>
                                            {{ $v->question }} </button>
                                    </h3>
                                    <div id="faq-content-1" class="accordion-collapse collapse"
                                        data-bs-parent="#faqlist">
                                        <div class="accordion-body">
                                            {{ $v->answer }}
                                        </div>
                                    </div>
                                </div><!-- # Faq item-->
                            @endforeach
                        @endif

                    </div>

                </div>
            </div>


             </div>
         </section><!-- End Frequently Asked Questions Section -->

     </main><!-- End #main -->

 @endsection
