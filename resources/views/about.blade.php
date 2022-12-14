<!doctype html>
<html lang="en">

<head>
    <!-- ================================ -->
    <!-- Title -->
    <!-- ================================ -->
    <title>Dnsmastertools</title>

    <!-- ================================ -->
    <!-- Required Meta data -->
    <!-- ================================ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ================================ -->
    <!-- Favicon -->
    <!-- ================================ -->
    <link rel="shortcut icon" href="{{asset('dist/images/logo/favicon.png')}}" type="image/x-icon">

    <!-- ================================ -->
    <!-- Core -->
    <!-- ================================ -->
    <link rel="stylesheet" href="{{asset('assets/libs/node_modules/owl.carousel/dist/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/node_modules/owl.carousel/dist/assets/owl.theme.green.css')}}">
    <link href="{{asset('assets/libs/node_modules/simplebar/dist/simplebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/dist/css/style.css')}}">
</head>

<body data-simplebar>
<div id="prelord">
    <div class="d-flex align-items-center justify-content-center h-100">
        <img src="{{asset('dist/images/loader/12.gif')}}" height="230" alt="">
    </div>
</div>
<!-- ================================ -->
<!-- Header Start -->
<!-- ================================ -->
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg shadow-sm bg-white">
        <div class="container-fluid max-width-base">
            <a class="navbar-brand" href="{{route('index')}}">
                <img src="{{asset('dist/images/logo/dnsmastertools.png')}}" height="50" alt="">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <span class="fas fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-lg-block d-none ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('about')}}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('contact')}}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('privacyPolicy') }}" class="nav-link">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('services') }}" class="nav-link">
                                Terms of Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary text-white px-4 nav-link" aria-current="page"
                               href="{{ route('login') }}">
                                {{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->name : 'Login' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
         aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-lg-none d-block">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none d-block">
                    <li class="nav-item border-bottom">
                        <a href="{{route('about')}}" class="nav-link py-1">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('contact')}}" class="nav-link py-1">
                            Contact Us
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{ route('blog') }}" class="nav-link py-1">
                            Blog
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{ route('privacyPolicy') }}" class="nav-link py-1">
                            Privacy Policy
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{ route('services') }}" class="nav-link py-1">
                            Terms of Services
                        </a>
                    </li>
                </ul>


                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none d-block">
                    <li class="nav-item border-bottom">
                        <a href="{{route('index')}}" class="nav-link py-1">
                            MX Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('blacklist_check')}}" class="nav-link py-1">
                            Blacklist Check
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('email_server_tester')}}" class="nav-link py-1">
                            Email Server Tester
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('reverse_dns')}}" class="nav-link py-1">
                            Reverse DNS Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('dns')}}" class="nav-link py-1">
                            DNS Check
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('spf')}}" class="nav-link py-1">
                            SPF Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('dmarc')}}" class="nav-link py-1">
                            DMARC Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('ssl')}}" class="nav-link py-1">
                            SSL Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('bmi')}}" class="nav-link py-1">
                            BMI Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('cname')}}" class="nav-link py-1">
                            CNAME Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('txt')}}" class="nav-link py-1">
                            TXT Lookup
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a href="{{route('http')}}" class="nav-link py-1">
                            HTTP Lookup
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('http_s')}}" class="nav-link py-1">
                            HTTPS Lookup
                        </a>
                    </li>
                </ul>

                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary text-white nav-link py-1">
                        {{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->name : 'Login' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ================================ -->
<!-- Header End -->
<!-- ================================ -->

<!-- ================================ -->
<!-- About Us Start -->
<!-- ================================ -->
<section class="mt-7 py-6">
    <div class="container-fluid max-width-base">
        <div class="text-center">
            <h2 class="mb-5">About Us</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">
                            {{ $about->title }}
                        </h4>
                        <span class="d-block">
                                @php
                                    echo("$about->description");
                                @endphp
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================ -->
<!-- About Us End -->
<!-- ================================ -->

<!-- ================================ -->
<!-- Founder Start -->
<!-- ================================ -->
<section class="py-6">
    <div class="container-fluid max-width-base">
        <div class="text-center">
            <h2 class="mb-5">Founders Note</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="owl-carousel owl-theme">

                            @forelse($founders as $founder)
                                <div class="item">
                                    <div class="d-flex justify-content-center mb-3">
                                        <div class="d-flex justify-content-center">
                                            <img
                                                src='{{$founder->profile ? asset('uploadFile/founder/'.$founder->profile) : asset('dist/images/user/user2.jpg')}}'
                                                width="100" height="100"
                                                class="rounded-circle" alt="">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <h3 class="mb-3">
                                            {{ $founder->name }}
                                        </h3>

                                        @php
                                            echo("$founder->description");
                                        @endphp
                                    </div>
                                </div>
                            @empty
                                <p> No Data Found</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================ -->
<!-- Founder End -->
<!-- ================================ -->


<!-- ================================ -->
<!-- Footer Start -->
<!-- ================================ -->
<footer class="bg-dark py-7">
    <div class="container-fluid max-width-base">
        <div class="d-sm-flex d-block justify-content-between align-items-center">
            <img src="{{asset('dist/images/logo/logo-white.svg')}}" height="50" class="mb-4 mb-sm-0" alt="">
            <div>
                <ul class="d-flex mb-0">
                    <li class="me-2 pe-1">
                        <a href="javascript:void(0)">
                            <i class="fab fa-facebook text-white fs-6"></i>
                        </a>
                    </li>
                    <li class="me-2 pe-1">
                        <a href="javascript:void(0)">
                            <i class="fab fa-instagram text-white fs-6"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fab fa-twitter text-white fs-6"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="text-white my-6">
        <div class="d-md-flex d-block justify-content-between">
            <div class="text-white">
                ??2022 dnsmastertools All rights reserved
            </div>
            <div class="hstack mt-3 mt-md-0 gap-3">
                <div class="text-white">
                    Privacy Policy
                </div>
                <div class="vr text-white"></div>
                <div class="text-white">
                    Terms of services
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ================================ -->
<!-- Footer End -->
<!-- ================================ -->


<!-- ================================ -->
<!-- Required Script -->
<!-- ================================ -->
<script src="{{asset('assets/libs/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/node_modules/simplebar/dist/simplebar.js')}}"></script>

<!-- ================================ -->
<!-- Current Page Script -->
<!-- ================================ -->
<script src="{{asset('dist/js/custom.js')}}"></script>

<!-- ================================ -->
<!-- Current Page Script -->
<!-- ================================ -->
<script src="{{asset('assets/libs/node_modules/owl.carousel/dist/owl.carousel.js')}}"></script>
<script>
    var loader = document.getElementById("prelord");
    window.addEventListener("load", function () {
        loader.style.display = "none";
    })
</script>
<script>
    $(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            mouseDrag: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 2000,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
            }
        })
    });
</script>

</body>

</html>
