<div class="underlay position-fixed top-0 z-3 d-flex justify-content-center align-items-center w-100"
    style="background: rgba(0 ,0, 0, 0.5); height: 100vh; width: 100vw;transform:translateY(-100%)"></div>


<nav class="d-flex p-2 gap-4 justify-content-between align-items-center">
    <div class="n-left">
        <div class="d-flex gap-2">
            <img width="40px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Facebook_Logo_2023.png/768px-Facebook_Logo_2023.png" alt="facebooklogo">
            <div class="d-flex search  form-control align-items-center border rounded-pill gap-2">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search facebook" class="border-0">
            </div>
        </div>
    </div>
    <div class="n-center w-100">
       <div class="d-flex gap-5 justify-content-between justify-content-md-center">
            <a href=""><i class="bi bi-house fs-2"></i></a>
            <a href=""><i class="bi bi-play-btn fs-2"></i></a>
            <a href=""><i class="bi bi-shop-window fs-2"></i></a>
            <a href=""><i class="bi bi-people-fill fs-2"></i></a>
            <a href=""><i class="bi bi-controller fs-2"></i></a>
        </div>
    </div>
    <div class="n-right">
        <div class="d-flex gap-2">
             <!-- User Info with Dropdown -->
            <div class="dropdown">
                <div class="d-flex user-info gap-2 align-items-center" style="cursor: pointer;" id="dropdownUserInfo" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                        if(isset($_SESSION['image'])){
                        if($_SESSION['image'] == NULL){
                            echo "<img width='30px' class='rounded-circle' height='30px' src='https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg' alt='Facebook user'>";
                        }else{
                            echo"<img width='30px' height='30px' src='{$_SESSION['image']}' alt='Facebook user'>";
                        }
                    }else{
                        echo "<img width='30px' class='rounded-circle' height='30px' src='https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg' alt='Facebook user'>";
                    }
                    ?>
                    <!-- <img width="30px" height="30px" src="https://www.transparentpng.com/download/user/gray-user-profile-icon-png-fP8Q1P.png" alt="Facebook user"> -->
                    <h6 class="m-0 user-name text-capitalize">
                        <?php
                            echo $_SESSION['username'];
                        ?>
                    </h6>
                </div>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUserInfo">
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="bi bi-question-circle"></i> Help</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2" href="./logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="p-2 rounded-circle text-black" style="clip-path: circle();background:#E4E6EB">
                    <i class="bi bi-plus"></i>
                </div>
                <div class="p-2 rounded-circle text-black" style="clip-path: circle(); background:#E4E6EB">
                    <i class="bi bi-chat"></i>
                </div>
                <div class="p-2 rounded-circle text-black" style="clip-path: circle(); background:#E4E6EB">
                    <i class="bi bi-bell"></i>
                </div>
                <div class="p-2 rounded-full text-black" style="clip-path: circle(); background:#E4E6EB">
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="list-icon">
        <i class="bi bi-list fs-2"></i>
    </div>
</nav>
