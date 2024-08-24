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
                                    <a href="{{url('forgot-password')}}" target="_blank" style="float:left" class="forgot-password">Forgot Password?</a>
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

<script>



    async function userLogin(){


//validation 

let email = document.getElementById("email").value;
let password = document.getElementById("password").value;


if(email === ""){
    errorToast("Email field is required");
}else if(password === ""){
    errorToast("Password field is required");
}





let postBody = {
"email" : document.getElementById("email").value,
"password" : document.getElementById("password").value
}
//console.log(postBody);

let res = await axios.post("/user-login",postBody);
if(res.data["status"] === "success"){
    setToken(res.data["token"]);
    //console.log(res.data["userInfo"]["role"]);
    //console.log(res.data["userInfo"]["role"]);
    successToast(res.data["message"]);
    if(res.data["userInfo"]["role"] === "customer"){
      window.location.href ="/dashboard/customer"
    } else if(res.data["userInfo"]["role"] === "admin"){
        window.location.href ="/dashboard/admin"
    }else if(res.data["userInfo"]["role"] === "vendor"){
        window.location.href ="/dashboard/vendor"
    }
}else{
    errorToast(res.data["message"]);
}
}

</script>