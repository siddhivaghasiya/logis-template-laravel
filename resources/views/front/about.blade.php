@extends('front.common.layout')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">

                        @if (isset($content))
                            <h2>{{ $content->about_title }}</h2>
                            <p>{{ $content->about_description }}</p>
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
                    <li>{{ $content->about_title }}</li>
                @endif
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                @if (isset($content))
                    <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                        <img src="{{ asset('uploads/content/' . $content->image) }}" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                    </div>
                    <div class="col-lg-6 content order-last  order-lg-first">

                        <h3>{{ $content->title }}</h3>
                        <p>{{ $content->short_description }}</p>
                        <ul>

                            {{ $content->long_description }}

                        </ul>
                    </div>
                @endif
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter pt-0">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Workers</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">

                @if (isset($content))
                    <span>{{ $content->team_title }}</span>
                    <h2>{{ $content->team_title }}</h2>
                @endif
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                @if (isset($team))
                    @foreach ($team as $key => $v)
                        <div class="col-lg-4 col-md-6 d-flex">
                            <div class="member">
                                <img src="{{ asset('uploads/team/' . $v->image) }}" class="img-fluid" alt="">
                                <div class="member-content">
                                    <h4>{{ $v->name }}</h4>
                                    <span>{{ $v->position }}</span>
                                    <p>
                                        {{ $v->description }}
                                    </p>
                                    <div class="social">
                                        <a href="{{ $v->t_link }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                        <a href="{{ $v->f_link }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                        <a href="{{ $v->i_link }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                        <a href="{{ $v->l_link }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach
                @endif

            </div>
        </div>
    </section><!-- End Our Team Section -->

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
@endsection
