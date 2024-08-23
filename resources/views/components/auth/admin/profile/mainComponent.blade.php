<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Dashboard</h3>
        {{-- <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Warning Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Success Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        <h4>Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr align="center">
                                <td><h4>Name</h4></td>
                                <td><input type="text" id="name" class="form-control" readonly></td>
                            </tr>
                            <tr align="center">
                                <td><h4>Email</h4></td>
                                <td><input type="email" id="email" class="form-control" readonly></td>
                            </tr>
                            <tr align="center">
                                <td><h4>Mobile</h4></td>
                                <td><input type="tel" id="mobile" class="form-control" readonly></td>
                            </tr>
                            <tr align="center">
                                <td><h4>Role</h4></td>
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
                        <h4>Update Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr align="center">
                                <td><h4>Name</h4></td>
                                <td><input type="text" id="updateName" class="form-control" name="name"></td>
                            </tr>
                            <tr align="center">
                                <td><h4>Email</h4></td>
                                <td><input type="email" readonly id="updateEmail" class="form-control"></td>
                            </tr>
                            <tr align="center">
                                <td><h4>Mobile</h4></td>
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
</script>