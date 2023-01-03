@include('front.common.header')

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <?php
                $getsetting = \App\Models\Setting::first();
                ?>

                @if (isset($getsetting))
                    <h1>{{ $getsetting->logo }}</h1>
                @endif

            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('aboutpage.index') }}">About</a></li>
                    <li><a href="{{ route('servicepage.index') }}">Services</a></li>
                    <li><a href="{{ route('pricingpage.index') }}">Pricing</a></li>
                    <li><a href="{{ route('contactpage.index') }}">Contact</a></li>
                    <li><a class="get-a-quote" href="{{ route('quotepage.index') }}">Get a Quote</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- End Header -->



    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    @include('front.common.footer')
