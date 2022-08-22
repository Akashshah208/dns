<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dnsmastertools</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        hr {
            margin: 24px 0;
            opacity: 0.4;
        }

        .fw-bold {
            font-weight: bold;
        }

        .card-body {
            padding: 30px;
        }

        @media (max-width: 767px) {
            .card-body {
                padding: 25px;
            }
        }

        .card {
            margin: 15px;
            max-width: 600px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: white;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-center {
            justify-content: center;
        }

        .bg-secondary {
            background-color: #6c757d;
        }

        .text-secondary {
            color: #6c757d;
        }

        .text-primary {
            color: #0d6efd;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 24px;
        }

        .fs-5 {
            font-size: 20px;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-2 {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

<section>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{asset('dist/images/logo/logo.svg')}}" height="50" alt="dnsmastertools">
                    <hr>
                    <div class="mb-4">
                        <p class="d-block title text-primary fs-5 fw-bold mb-2 form-label">First Name</p>
                        <p class="text-dark mb-0">{{ $contact->first_name }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">Last Name</p>
                        <p class="text-dark">{{ $contact->last_name }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">Email id</p>
                        <p class="text-dark">{{ $contact->email }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">Phone Number</p>
                        <p class="text-dark">{{ $contact->phone_no }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">State</p>
                        <p class="text-dark">{{ $contact->state }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">City</p>
                        <p class="text-dark">{{ $contact->city }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">Zip Code</p>
                        <p class="text-dark">{{ $contact->zip_code }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="d-block text-primary fs-5 fw-bold mb-2 form-label">Message</p>
                        <p class="text-dark">
                            {{ $contact->message }}
                        </p>
                    </div>
                    <hr>
                    <div>
                        <p class="mb-0">©2022 dnsmastertools All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>
