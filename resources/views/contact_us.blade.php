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
<!-- Contact us Start -->
<!-- ================================ -->
<section class="py-7 mt-7">
    <div class="container-fluid max-width-base">
        @if (session()->has('result'))
            <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show" role="alert">
                <strong>{{ session('result')['message'] }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-5">
                <h2>Let's talk</h2>
                <p class="mb-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores dolores maxime ipsam repellat
                    quas totam alias eligendi nam libero cum optio quo recusandae sapiente rerum eos, doloremque
                    fugit magni repudiandae.
                </p>
                <form action="{{ route('storeContact') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label opacity-75">First Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="firstName" id="firstName"
                                       placeholder="Enter First Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label opacity-75">Last Name <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="lastName" id="lastName"
                                       placeholder="Enter Last Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formEmail" class="form-label opacity-75">Email <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="email" id="formEmail" placeholder="Enter Email"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="formEmail" class="form-label opacity-75">Phone Number <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="phone_no" id="formEmail"
                               placeholder="Enter Phone No" max="10" min="10" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label opacity-75">State <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="state" id="state"
                                       placeholder="Enter State" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label opacity-75">City <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="city" id="city"
                                       placeholder="Enter City" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label opacity-75">Zip Code <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="zip_code" id="zip_code"
                                       placeholder="Enter Zip Code" required>
                            </div>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label class="form-label opacity-75">Your Message <span class="text-danger">*</span></label>
                        <textarea cols="30" rows="5" name="message" placeholder="Enter your message here"
                                  class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="bg-white p-3 shadow mt-lg-0 mt-4 rounded-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118106.57849166066!2d73.10287440258264!3d22.322246337704442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8ab91a3ddab%3A0xac39d3bfe1473fb8!2sVadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1660372107708!5m2!1sen!2sin"
                        width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================ -->
<!-- Contact us End -->


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
