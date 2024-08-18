<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/frontend')}}/images/favicon/1.png" type="image/x-icon">
    <title>Sign Up</title>

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
                        <img src="{{asset('assets/frontend')}}/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To TuneCart</h3>
                            <h4>SignUp Your Account</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                        <label for="name">Your Name *</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                        <label for="email">Email Address *</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Your Number">
                                        <label for="email">Your Number *</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        <label for="password">Password *</label>
                                    </div>
                                </div>

                                {{-- <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="d-none checkbox_animated check-box" type="checkbox"id="flexCheckDefault">
                                        </div>
                                        <a href="forgot.html" style="float:left" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">SignUp</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

               

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Already Have an Account.</h4>
                            <a href="{{url('/login')}}" target="_blank">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
    <!-- Lazyload Js -->
    <script src="{{asset('assets/frontend')}}/js/lazysizes.min.js"></script>
    <script src="{{asset('function/js/signupCalculation.js')}}"></script>
</body>

</html>