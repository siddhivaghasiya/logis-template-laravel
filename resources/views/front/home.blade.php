@extends('front.common.layout')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                @if (isset($content))
                    <h2 data-aos="fade-up">{{ $content->home_title }}</h2>
                    <p data-aos="fade-up" data-aos-delay="100">{{ $content->home_description }}</p>
                @endif

                <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                    data-aos-delay="200">
                    <input type="text" class="form-control" placeholder="ZIP code or CitY">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
            </div>

        </div>
    </div>
</section><!-- End Hero Section -->

@section('content')

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="row gy-4">

                @if (isset($service))
                    @foreach ($service as $key => $v)
                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                            <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
                            <div>
                                <h4 class="title">{{ $v->title }}</h4>
                                <p class="description">{{ $v->description }}</p>
                                <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- End Service Item -->
                    @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about pt-0">
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

                @if (isset($getservice))
                    @foreach ($getservice as $key => $v)
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

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="zoom-out">

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3>Call To Action</h3>
                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.</p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            @if (isset($getservice))
                @foreach ($getservice as $key => $v)
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

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">

                @if (isset($content))
                    <span>{{ $content->pricing_title }}</span>
                    <h2>{{ $content->pricing_title }}</h2>
                @endif

            </div>

            <div class="row gy-4">

                @if (isset($pricing))
                    @foreach ($pricing as $key => $v)
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="pricing-item">
                                <h3>{{ $v->title }}</h3>
                                <h4><sup>$</sup>{{ $v->amount }}<span> / month</span></h4>
                                <ul>
                                    <li><i class="bi bi-check"></i>{{ $v->long_description }}</li>

                                </ul>
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>
                        </div><!-- End Pricing Item -->
                    @endforeach
                @endif

            </div>

        </div>
    </section><!-- End Pricing Section -->

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
