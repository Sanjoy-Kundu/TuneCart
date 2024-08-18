<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/frontend')}}/images/favicon/1.png" type="image/x-icon">
    <title>Log In</title>

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/vendors/bootstrap.css">


    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/vendors/font-awesome.css">
    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/css/style.css">


    {{-- axios and config custom file --}}
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    {{-- toastify js --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



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
                            <h4>Log In Your Account</h4>
                        </div>

                        <div class="input-box">
                            <section class="row g-4">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="d-none checkbox_animated check-box" type="checkbox"id="flexCheckDefault">
                                        </div>
                                        <a href="forgot.html" target="_blank" style="float:left" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" onclick="userLogin()">Log
                                        In</button>
                                </div>
                            </section>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <img src="{{asset('assets/frontend')}}/images/inner-page/google.png" class="blur-up lazyload"
                                            alt=""> Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="{{asset('assets/frontend')}}/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Log In with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Don't have an account?</h4>
                            <a href="{{url('/signup')}}" target="_blank">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
    <!-- Lazyload Js -->



    <script>

        async function userLogin(){
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            
            if(email.length === 0){
                errorToast("Email is required");
            }

            if(password.length === 0){
                errorToast("Password is required");
            }

            if(password.length<8){
                errorToast("Password length must be 8 character");
            }




            let postData = {
                email:email,
                password:password
            }

            let res = await axios.post("/user-login",postData);
            console.log(res.data["status"] === "success");
            if(res.data["status"] === "success"){
                successToast(res.data["message"])
            }else{
                errorToast("Invalid Email");
            }
        }
    </script>












    <script src="{{asset('assets/frontend')}}/js/lazysizes.min.js"></script>
</body>

</html>