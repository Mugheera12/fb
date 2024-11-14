<div class="underlay d-flex justify-content-center align-items-center position-fixed top-0" 
      style="background: rgba(0, 0, 0, 0.7);z-index: 3;height:100vh;width:100vw;">
    <div class="card my-reg-form shadow p-4 col-lg-5 bg-white">
    <img width="100px" class="mx-auto" src="https://static.xx.fbcdn.net/rsrc.php/y1/r/4lCu2zih0ca.svg" alt="">
        <form action="./register-user.php" method="POST">
            <i class="bi bi-x-lg fs-3" style="position: absolute;right:10px;top:10px"></i>
            <h2 class="text-center">Create a new account</h2>
            <p class="text-secondary text-center">It's quick and easy.</p>
            <hr>
            <div class="d-flex gap-2">
                <input type="text" class="form-control p-2" name="f_name" placeholder="First name" required>
                <input type="text" class="form-control p-2" name="l_name" placeholder="sur name " required>
            </div>
            <label for="">Date of birth <span class="bg-secondary text-white">?</span></label>
            <div class="d-flex gap-2">
                <select name="date" id="" class="form-control">
                    <?php 
                        for ($i=1; $i<31;$i++){
                            echo"<option value=$i>".$i."</option>";
                        }
                    ?>
                </select>
                <select name="month" id="" class="form-control">
                    <?php
                         $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov',"Dec"];
                         foreach ($months as $item){
                            echo  "<option value=$item>".$item."</option>";
                         }
                    ?>
                </select>
                <select name="year" id="" class="form-control">
                    <?php
                    for ($i= 2024; $i>1905;$i--){
                        echo "<option value=$i>".$i."</option>";
                    }
                    ?>
                </select>
            </div>
            <label for="">Gender <span class="bg-secondary text-white">?</span></label>
            <div class="d-flex gap-2 justify-content-between align-items-center">
                <div class="border justify-content-between d-flex p-2 w-100 rounded-2">
                <label for="">Female</label>
                <input type="radio" name="gender" value="female" class="form-check">
                </div>
                <div class="border justify-content-between d-flex p-2 w-100 rounded-2"> 
                <label for="">Male</label>
                <input type="radio" name="gender" value="male" class="form-check">
                </div>
            </div>
            <input type="text" name="m_mail" placeholder="Mobile number or Email address" class="form-control p-2 my-2" required>
            <input type="password" name="password" placeholder="Password" class="form-control p-2 my-2" required>
            <p class="text-sm">
            People who use our service may have uploaded your contact information to Facebook.
            </p>
            <p class="text-sm">
            By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.
            </p>
            <button class="text-white btn w-50 mx-auto d-block" style="background: #36A420;">Sign up</button>
            <a href="#" class="hm">Already an Account?</a>
        </form>
    </div>
</div>