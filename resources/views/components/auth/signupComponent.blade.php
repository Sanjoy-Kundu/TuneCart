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
                        <section class="row g-4" id="registration-form">
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
                            <div class="col-12">
                                <button onclick="onRegistration()" class="btn btn-animation w-100 justify-content-center">SignUp</button>
                            </div>
                        </section>
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

<script>

    async function onRegistration(){


        //validation 
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let mobile = document.getElementById("mobile").value;
        let password = document.getElementById("password").value;


        if(name.length === 0){
            errorToast("Name field is required");
        }else if(email.length === 0){
            errorToast("Email field is required");
        }else if(mobile.length === 0){
            errorToast("Mobile field is required");
        }else if(mobile.length === 0){
            errorToast("Please Enter a valid mobile number");
        }else if(password.length === 0){
            errorToast("Password field is required");
        }





        let postBody = {
        "name" : document.getElementById("name").value,
        "email" : document.getElementById("email").value,
        "mobile" : document.getElementById("mobile").value,
        "password" : document.getElementById("password").value
        }
        //console.log(postBody);

        let res = await axios.post("/user-registration",postBody);
        if(res.data["status"] === "success"){
            successToast(res.data["message"]);
           window.location.href ="/login"
        }else{
            errorToast(res.data["message"]);
        }
    }

</script>