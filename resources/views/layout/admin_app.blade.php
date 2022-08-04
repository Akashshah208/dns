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
            <a class="navbar-brand" href="./index.html">
                <img src="{{asset('dist/images/logo/logo-white.svg')}}" height="50" alt="">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <span class="fas fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-lg-block d-none ms-auto">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./index.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./add-blog.html">Add Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" data-bs-toggle="modal"
                               data-bs-target="#addcategory" href="javascript:void(0)">Add Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./add-author.html">Add Author</a>
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
        <div class="d-md-flex d-block">
            <!-- ================================ -->
            <!-- Main Content Start -->
            <!-- ================================ -->
            <!-- ================================ -->
            <!-- End Main Content Start -->
            <!-- ================================ -->
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
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-lg-none d-block">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-none d-block">
                <li class="nav-item border-bottom">
                    <a href="./index.html" class="nav-link active py-1">
                        Blog
                    </a>
                </li>
                <li class="nav-item border-bottom">
                    <a href="./add-blog.html" class="nav-link active py-1">
                        Add Blog
                    </a>
                </li>
                <li class="nav-item border-bottom">
                    <a data-bs-toggle="modal" data-bs-target="#addcategory" href="javascript:void(0)"
                       class="nav-link active py-1">
                        Add Category
                    </a>
                </li>
                <li class="nav-item border-bottom">
                    <a href="./add-author.html"
                       class="nav-link active py-1">
                        Add Author
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<!-- ================================ -->
<!-- Add Category Start -->
<!-- ================================ -->
<div class="modal fade" id="addcategory" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="title" class="form-label opacity-75">Add Category <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" placeholder="Enter category" required>
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" class="btn btn-success">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ================================ -->
<!-- Add Category End -->
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
