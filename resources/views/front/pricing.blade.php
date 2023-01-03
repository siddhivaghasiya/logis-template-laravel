@extends('front.common.layout')

@section('content')


    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">

                        @if (isset($content))
                            <h2>{{ $content->pricing_title }}</h2>
                            <p>{{ $content->pricing_description }}</p>
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
                        <li>{{ $content->pricing_title }}</li>
                    @endif
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

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

    <!-- ======= Horizontal Pricing Section ======= -->
    <section id="horizontal-pricing" class="horizontal-pricing pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <span>Horizontal Pricing</span>
                <h2>Horizontal Pricing</h2>

            </div>

            @if (isset($pricing))
                @foreach ($pricing as $key => $v)
                    <div class="row gy-4 pricing-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-3 d-flex align-items-center justify-content-center">
                            <h3>{{ $v->title }}</h3>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center justify-content-center">
                            <h4><sup>$</sup>{{ $v->amount }}<span> / month</span></h4>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center justify-content-center">
                            <ul>
                                <li><i class="bi bi-check"></i>{{ $v->long_description }}</li>

                            </ul>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center justify-content-center">
                            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                        </div>
                    </div><!-- End Pricing Item -->
                @endforeach
            @endif

        </div>
    </section><!-- End Horizontal Pricing Section -->

@endsection
