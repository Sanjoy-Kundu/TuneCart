<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Dashboard</h3>
      
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        <h5>Your Profile</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr align="center">
                                <td><h6>Name</h6></td>
                                <td><input type="text" id="name" class="form-control" readonly></td>
                            </tr>
                            <tr align="center">
                                <td><h6>Email</h6></td>
                                <td><input type="email" id="email" class="form-control" readonly></td>
                            </tr>
                            <tr align="center">
                                <td><h6>Mobile</h6></td>
                                <td><input type="tel" id="mobile" class="form-control" readonly></td>
                            </tr>
                            <tr align="center">
                                <td><h6>Role</h6></td>
                                <td><input type="text" id="role" class="form-control" readonly></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        <h5>Update Your Profile</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr align="center">
                                <td><h6>Name</h6></td>
                                <td><input type="text" id="updateName" class="form-control" name="name"></td>
                            </tr>
                            <tr align="center">
                                <td><h6>Email</h6></td>
                                <td><input type="email" readonly id="updateEmail" class="form-control"></td>
                            </tr>
                            <tr align="center">
                                <td><h6>Mobile</h6></td>
                                <td><input type="tel" id="updateMobile" class="form-control" name="mobile"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-primary" onclick="onUpdate()">UPDATE PROFILE</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        <h5>Upload Your Image</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr align="center">
                                <td><h6>Image</h6></td>
                                <td>
                                    <input type="file" id="user_profile" class="form-control" name="user_profile" ecntype="multipart/form-data">
                                </td>
                                <tr>
                                    <td></td>
                                    <td><button class="btn btn-primary" onclick="onUploadProfileImage()">UPLOAD IMAGE</button></td>
                                </tr>
                            </tr>
                     
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        <h5>Update Your Password</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                       
                            <tr align="center">
                                <td><h6>New Password</h6></td>
                                <td>
                                    <input type="password" id="newPassword" class="form-control" name="new_password" placeholder="Enter Your New Password">
                                </td>
                            </tr>
                            <tr align="center">
                                <td><h6>Confirm Password</h6></td>
                                <td>
                                    <input type="password" id="confirmPassword" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-primary" onclick="onUpdatePassword()">UPDATE PASSWORD</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</main>

<script>
    getProfile()
    async function getProfile(){
        try{
            let res = await axios.get("/user-profile", HeaderToken());
            console.log(res.data["userInfo"]["name"]);
            console.log(res.data["userInfo"]["email"]);
            console.log(res.data["userInfo"]["mobile"]);
            console.log(res.data["userInfo"]["role"]);
            //profile value show 
            document.getElementById('name').value = res.data["userInfo"]["name"]
            document.getElementById('email').value = res.data["userInfo"]["email"]
            document.getElementById('mobile').value = res.data["userInfo"]["mobile"]
            document.getElementById('role').value = res.data["userInfo"]["role"]

            
            //update profile value input filed 
            document.getElementById('updateName').value = res.data["userInfo"]["name"]
            document.getElementById('updateEmail').value = res.data["userInfo"]["email"]
            document.getElementById('updateMobile').value = res.data["userInfo"]["mobile"]


        }catch(e){
            console.log(e);
        }
    }    



    //profile update
    async function onUpdate(){
        let name = document.getElementById('updateName').value;
        let mobile = document.getElementById('updateMobile').value;

        let userUpdateInfo = {
            name:name,
            mobile:mobile
        }

        try{
            let res = await axios.post("/user-profile-update", userUpdateInfo);
            //console.log(res)
            if(res.data["status"] === "success"){
                successToast(res.data["message"]);
                await getProfile(); //just refresh page
            }
            //console.log(res.data);

        }catch(e){
            console.log(e);
        }
    }


    //profile update password 
    async function onUpdatePassword(){

      let  newPassword = document.getElementById("newPassword").value;
      let  confirmPassword = document.getElementById("confirmPassword").value;

       if(newPassword === ""){
        errorToast("New Password Field is required");
      }else if(confirmPassword === ""){
        errorToast("Confirm Password Field is required");
      }else if(confirmPassword !== newPassword){
        errorToast("Your Confirm Password and New Password Doesnot match");
      }


        let postPasswordBody = {password:confirmPassword}
        console.log(postPasswordBody);
        // try{
        //     let res =  await axios.post('/user-password-reset', postPasswordBody)
        //     console.log(res)
        //     if(res.data["status"] === "success"){
        //         successToast(res.data["message"]);
        //         await getProfile();
        //         window.location.href ="/login";
        //     }
        // }catch(e){
        //     console.log(e)
        // }
        
      
    }








 









       



     
        
    
</script>