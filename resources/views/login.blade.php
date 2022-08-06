<!doctype html>
<html lang="en">

<head>
    <!-- ================================ -->
    <!-- Title -->
    <!-- ================================ -->
    <title>DNSmastertools</title>

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
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
</head>

<body data-simplebar>
<div id="prelord">
    <div class="d-flex align-items-center justify-content-center h-100">
        <img src="{{asset('dist/images/loader/12.gif')}}" height="230" alt="">
    </div>
</div>

<!-- ================================ -->
<!-- Content Start -->
<!-- ================================ -->
<section class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="w-100">
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-4 col-md-5">
                <div class="card shadow mb-0 border-0 rounded-0">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div class="py-4">
                            @if (session()->has('result'))
                                <div class="alert alert-{{ session('result')['type'] }} alert-dismissible fade show"
                                     role="alert">
                                    <strong>{{ session('result')['message'] }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="text-center mb-5">
                                <a href="{{ route('index') }}">
                                    <img src="{{asset('dist/images/logo/favicon.png')}}" height="60" alt="">
                                </a>
                                <h3 class="mt-3">Welcome to DNSmastertools</h3>
                            </div>

                            <form action="{{ route('doLogin') }}" method="POST">
                                @csrf
                                <div class="form-floating border rounded-3 mb-3">
                                    <input type="email" class="border-0 form-control text-primary"
                                           id="floatingInput3" placeholder="Email Address" name="email">
                                    <label for="floatingInput3" class="rounded-pill">Email Address</label>
                                </div>
                                <div class="form-floating border rounded-3 mb-3">
                                    <input type="password" class="border-0 form-control text-primary"
                                           id="floatingInput4" placeholder="Enter password" name="password">
                                    <label for="floatingInput4" class="rounded-pill">Enter password</label>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================ -->
<!-- Content End -->
<!-- ================================

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
<script>
    var loader = document.getElementById("prelord");
    window.addEventListener("load", function () {
        loader.style.display = "none";
    })
</script>

</body>

</html>
