<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('./boot-css.php')  ?>
    <title>Mugheerabook</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body{
            background: #F2F4F7;
        }
    </style>
</head>

        <?php
        session_start();
        include('./config.php');
        if(isset($_SESSION['username'])){
            header("Location:$base_url/home.php");
        }

        ?>


        <?php include('./register-form.php') ?>
   <div class="container">
    <div class="row align-items-center" style="height: 85vh;">
        <div class="col-lg-6 col-sm-6">
            <img width="200px" src="https://logos-world.net/wp-content/uploads/2020/05/Facebook-Logo-2019.png" alt="Pakbook logo">
            <h2 class="display-6 fw-normal">Recent logins</h2>
            <p class="text-secondary">Click your picture or add an account.</p>
        </div>
        <div class="col-lg-4 col-sm-4 shadow bg-white rounded-3 p-3 mx-auto">
            <form action="./login-user.php" class="" method="POST">

                <input type="text" name="m_mail" placeholder="Email address or phone number" class="form-control p-3 my-2">

                <div class="d-flex form-control p-3 my-2">
                    <input id="password" style="outline-width:0;" name="password" type="password" placeholder="Password" class="w-100 border-0 pass" oninput="toggleEyeIcon()">
                    <i id="togglePassword" class="bi bi-eye-slash" style="cursor: pointer; display: none;"></i>
                </div>

                <?php  
                    if(isset($_SESSION['login_error'])){
                        echo"<p class='text-danger m-0'>
                        {$_SESSION['login_error']}
                        </p>";
                    }

                    unset( $_SESSION["login_error"] );
                
                ?>

                <button class="btn btn-primary p-3 w-100 my-2">Login</button>

                <a href="" class="text-primary text-decoration-none text-center d-block my-2">Forgotten password?</a>

                <hr>

                <button type="button" class="btn btn-green text-white w-60 mx-auto d-block p-3 fw-semibold create-btn" style="background: #36A420;">Create new Account</button>

            </form>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    let create_btn =document.querySelector(".create-btn");
    let underlay =document.querySelector(".underlay");
    let  my_reg_form =document.querySelector(".my-reg-form");
    let cross =document.querySelector(".bi-x-lg")

    togglePassword.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle the eye slash icon
        this.classList.toggle('bi-eye'); // Change to normal eye
        this.classList.toggle('bi-eye-slash'); // Change back to slashed eye
    });

    function toggleEyeIcon() {
        if (passwordInput.value.length > 0) {
            togglePassword.style.display = 'block'; // Show the eye icon
        } else {
            togglePassword.style.display = 'none'; // Hide the eye icon
            passwordInput.setAttribute('type', 'password'); // Ensure the password is hidden
            togglePassword.classList.remove('bi-eye'); // Reset to eye-slash icon
            togglePassword.classList.add('bi-eye-slash');
        }
    }
    create_btn.addEventListener('click',()=>{
        underlay.style.transform = 'translateY(0)';
        setTimeout(() => {
            my_reg_form.style.transform = 'translateX(0)';
            my_reg_form.style.opacity = '1';
        }, 500);
    })
    cross.addEventListener('click',()=>{
        my_reg_form.style.transform = 'translateX(-40%)';
            my_reg_form.style.opacity = '0';
        setTimeout(() => {
            underlay.style.transform = 'translateY(-100%)';
        }, 500);
    })
</script>

</body>

</html>