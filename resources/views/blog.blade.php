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
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
    <style>
        .dark-link {
            color: #252530;
            transition: all 0.4s ease-in-out;
        }
    </style>
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
                            <a class="nav-link" aria-current="page" href="{{ route('privacyPolicy') }}">Privacy
                                Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('services') }}">Terms of services</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary text-white px-4 nav-link" aria-current="page"
                               href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ================================ -->
<!-- Header End -->
<!-- ================================ -->

<!-- ================================ -->
<!-- Content Start -->
<!-- ================================ -->
<section class="mt-7 py-7">
    <div class="container-fluid max-width-base">

        <div class="text-center mb-4">
            <h1>Master Blog</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session()->has('result'))
                    <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('result')['message'] }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('blog') }}" method="GET">
                    <div class="input-group mb-8 rounded-pill border p-2 overflow-hidden">
                        <input type="search" class="border-0 rounded-pill form-control" placeholder="Search blog..."
                               aria-label="Search blog..." name="keyword" aria-describedby="button-addon2"
                               value="{{ $keyword }}">
                        <button
                            class="btn btn-primary ms-1 d-flex align-items-center justify-content-center rounded-pill"
                            type="submit" id="button-addon2"><i class="fas fa-search me-2"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @forelse($blogs as $blog)
                <div class="col-md-6 col-lg-4 d-flex align-items-strech">
                    <div class="card bg-transparent shadow-sm border-0 overflow-hidden w-100">
                        <a href="{{ route('blogDetails', $blog->id) }}">
                            <div class="overflow-hidden">
                                <img
                                    src='{{$blog->banner ? asset('uploadFile/blogBanner/'.$blog->banner) : asset('dist/images/user/user2.jpg')}}'
                                    class="zoom-in img-fluid" alt="">
                            </div>
                        </a>
                        <div class="card-body">
                            <h4 class="mb-3">
                                <a href="{{ route('blogDetails', $blog->id) }}" class="dark-link">
                                    {{ $blog->title }}
                                </a>
                            </h4>
                            <span class="text-secondary">By <a href="{{ route('blogDetails', $blog->id) }}"
                                                               target="_blank"
                                                               class="me-1">{{ $blog->author ? $blog->author->name : 'Unknown Author'}}</a>
                                {{ date_format($blog->created_at, "M d, Y") }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                No Data Found
            @endforelse
        </div>
    </div>
</section>
<!-- ================================ -->
<!-- Content End -->
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
                ©2022 dnsmastertools All rights reserved
            </div>
            <div class="hstack mt-3 mt-md-0 gap-3">
                <div class="text-white">
                    privacy policy
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

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
     aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Lookups</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-lg-none d-block">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none d-block">
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{route('about')}}">About Us</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{route('contact')}}">Contact Us</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('privacyPolicy') }}">Privacy
                        Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('services') }}">Terms of services</a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none d-block">
                <li class="nav-item border-bottom">
                    <a href="{{route('index')}}" class="nav-link active py-1">
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
                <a class="btn btn-primary text-white px-4 nav-link" aria-current="page"
                   href="{{ route('login') }}">
                    {{ \Illuminate\Support\Facades\Auth::user() ? \Illuminate\Support\Facades\Auth::user()->name : 'Login' }}
                </a>
            </div>
        </div>
    </div>
</div>


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
