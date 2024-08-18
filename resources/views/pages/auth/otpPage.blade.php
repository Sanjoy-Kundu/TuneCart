<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/frontend')}}/images/favicon/1.png" type="image/x-icon">
    <title>OTP</title>

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/vendors/bootstrap.css">


    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/vendors/font-awesome.css">
    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/style.css">
</head>

<body>
    <!-- log in section start -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{asset('assets/frontend')}}/images/inner-page/forgot.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Enter Your 4 digits Otp</h3>
                        </div>

                        <div class="input-box">
                            <form class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="number" class="form-control" name="otp" id="otp" placeholder="Enter Your Otp">
                                        <label for="otp">Write Your Code</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">NEXT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
    <!-- Lazyload Js -->
    <script src="{{asset('assets/frontend')}}/js/lazysizes.min.js"></script>
</body>

</html>