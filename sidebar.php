<ul class="list-unstyled py-3 px-2 sidebar gap-3 d-flex flex-column" style="height: 86vh;">

    <li>
        <div class="d-flex align-items-center gap-3">
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
             <h6 class="m-0 user-name text-capitalize">
                        <?php
                            echo $_SESSION['username'];
                        ?>
             </h6>
        </div>
    </li>
    <li>
        <div class="d-flex align-items-center gap-3">
            <img width="30px" src="./assets/photos-icon.png" alt="">
            <?php  include "./upload-posts-modal.php" ?>
        </div>
    </li>
    <li>
        <div class="d-flex align-items-center gap-3">
            <img width="40px" src="./assets/find.png" alt="">
            <h6>Friends</h6>
        </div>
    </li>
    <li>
        <div class="d-flex align-items-center gap-3">
            <img width="40px" src="./assets/saved.png" alt="">
            <h6>Saved</h6>
        </div>
    </li>
    <li>
        <div class="d-flex align-items-center gap-3">
            <img width="40px" src="./assets/people.png" alt="">
            <h6>Groups</h6>
        </div>
    </li>
    <li>
        <div class="d-flex align-items-center gap-3">
            <img width="40px" src="./assets/video.png" alt="">
            <h6>Video</h6>
        </div>
    </li>
    <li>
        <div class="d-flex align-items-center gap-3">
            <img width="40px" src="./assets/feeds.png" alt="">
            <h6>Feed</h6>
        </div>
    </li>
</ul>