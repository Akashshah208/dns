<!doctype html>
<html lang="en">

<head>
    <!-- ================================ -->
    <!-- Title -->
    <!-- ================================ -->
    <title>Dnsmastertools Admin</title>

    <!-- ================================ -->
    <!-- Required Meta data -->
    <!-- ================================ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ================================ -->
    <!-- Favicon -->
    <!-- ================================ -->
    <link rel="shortcut icon" href="{{asset('dist/images/logo/favicon.png')}}" type="image/x-icon">

    <!-- ================================ -->
    <!-- Core -->
    <!-- ================================ -->
    <link href="{{asset('assets/libs/node_modules/simplebar/dist/simplebar.css')}}" rel="stylesheet">

    <!-- Editor -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/theme/blackboard.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/theme/monokai.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/extra-libs/summernote/summernote-lite.min.css')}}"/>


    <!-- Selectbox -->
    <link rel="stylesheet" href="{{asset('assets/extra-libs/select2/dist/css/select2.css')}}">

    <link rel="stylesheet" href="{{asset('dist/css/style_admin.css')}}">
    <style>
        @media (max-width: 991px) {
            .navbar-nav .dropdown-menu {
                position: absolute;
            }
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
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-dark">
        <div class="container-fluid max-width-base">
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <img src="{{asset('dist/images/logo/logo-white.svg')}}" height="50" alt="">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.addBlog') }}">Add Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.contactUs') }}">Contact
                                List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('admin.userData') }}">User Data</a>
                        </li>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Add
                                Contain <i class="fas fa-chevron-down fs-3 ms-2"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2 shadow">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.addCategory') }}">Add Category</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.addAuthor') }}">Add Author</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.addPrivacyPolicy') }}">Add
                                        Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.addServices') }}">Add Terms Of
                                        Services</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.addAbout') }}">Add About</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{asset('dist/images/user/user6.jpg')}}" class="rounded-circle" height="50"
                                     alt="">
                                <i class="fas fa-chevron-down fs-3 ms-2"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2 shadow">
                                <li><a class="dropdown-item" href="{{ route('admin.account') }}"><i
                                            class="far fa-user me-2"></i> Account</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                            class="fas fa-sign-out-alt me-2"></i> Log
                                        Out</a></li>
                            </ul>
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
<section class="mt-7 py-7" style="background: rgba(0, 0, 0, 0.05);">
    <div class="container-fluid max-width-base">
        <!-- ================================ -->
        <!-- Main Content Start -->
        <!-- ================================ -->
    @yield('content')
            <!-- ================================ -->
            <!-- End Main Content Start -->
            <!-- ================================ -->
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
                ??2022 dnsmastertools All rights reserved
            </div>
            <div class="hstack mt-3 mt-md-0 gap-3">
                <div class="text-white">
                    <a class="nav-link" aria-current="page" href="{{ route('privacyPolicy') }}">Privacy
                        Policy</a>
                </div>
                <div class="vr text-white"></div>
                <div class="text-white">
                    <a class="nav-link" aria-current="page" href="{{ route('services') }}">Terms of services</a>
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
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-lg-none d-block">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none d-block">
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.index') }}">Blog</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.addBlog') }}">Add Blog</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.contactUs') }}">Contact
                        List</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.userData') }}">User Data</a>
                </li>
                <li class="nav-item border-bottom">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Add
                        Contain <i class="fas fa-chevron-down fs-3 ms-2"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2 shadow">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.addCategory') }}">Add Category</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.addAuthor') }}">Add Author</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.addPrivacyPolicy') }}">Add
                                Privacy Policy</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.addServices') }}">Add Terms Of
                                Services</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.addAbout') }}">Add About</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{asset('dist/images/user/user6.jpg')}}" class="rounded-circle" height="50"
                             alt="">
                        <i class="fas fa-chevron-down fs-3 ms-2"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2 shadow">
                        <li><a class="dropdown-item" href="{{ route('admin.account') }}"><i
                                    class="far fa-user me-2"></i> Account</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                    class="fas fa-sign-out-alt me-2"></i> Log
                                Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<!-- ================================ -->
<!-- Required Script -->
<!-- ================================ -->
<script src="{{asset('assets/libs/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/node_modules/simplebar/dist/simplebar.js')}}"></script>

<!-- ================================ -->
<!-- Required Script -->
<!-- ================================ -->
<script src="{{ asset('js/reply_comment.js') }}"></script>


<!-- ================================ -->
<!-- Current Page Script -->
<!-- ================================ -->
<script src="{{asset('dist/js/custom.js')}}"></script>
<script src="{{asset('assets/extra-libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('dist/js/forms/select2/select2.init.js')}}"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.41.0/mode/xml/xml.min.js"></script>
<script src="{{asset('assets/extra-libs/summernote/summernote-lite.min.js')}}"></script>

<!-- ================================ -->
<!-- Current Page Script -->
<!-- ================================ -->
<script>
    var loader = document.getElementById("prelord");
    window.addEventListener("load", function () {
        loader.style.display = "none";
    })
</script>

<script>
    /************************************/
    //default editor
    /************************************/
    $('.summernote').summernote({
        height: 250, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false, // set focus to editable area after initializing summernote
    });
</script>

</body>

</html>
