<?php
include("./config.php");

$select = "SELECT posts.id AS post_id,posts.caption,posts.image,users.id AS 
           user_id,users.f_name,users.l_name FROM posts JOIN users ON posts.user_id = users.id
           ORDER BY (posts.id) DESC";

$result = mysqli_query($connection, $select);

while ($row = mysqli_fetch_assoc($result)) {


?>


    <div class="card shadow rounded-2 border-0 my-2">
        <div class="d-flex align-items-center justify-content-between p-2">
            <div class="d-flex align-items-center gap-3">
                <img width="30px" height="30px" class="rounded-circle" src="https://www.transparentpng.com/download/user/gray-user-profile-icon-png-fP8Q1P.png" alt="">
                <h6 class="text-capitalize">
                    <?php
                    echo $row["f_name"] . '' . $row['l_name'];
                    ?>
                </h6>
            </div>
            <i class="bi bi-three-dots fs-2"></i>
        </div>

        <div class="caption px-3">
            <p class="text-secondary emphasis">
                <?php echo $row['caption'] ?>
            </p>
        </div>
        <a href="./single-post.php?post_id=<?php echo $row['post_id']?>&post_image=<?php echo $row['image']?>&username=<?php echo $row['f_name']."".$row['l_name']?>&caption=<?php echo $row['caption'] ?>">
            <img src="./post-images/<?php echo $row['image'] ?>" width="100%">
        </a>

        <div class="react-info d-flex p-2 justify-content-between">
            <div class="likes">
                <h6 class="m-0">
                    300 Likes
                </h6>
            </div>
            <div class="comments">
                <h6 class="m-0">
                    <?php
                        $count = "SELECT COUNT(id) AS total FROM comments WHERE post_id = {$row['post_id']}";
                        $res = mysqli_query($connection, $count);
                        $comment_count = mysqli_fetch_assoc($res);
                        if($comment_count['total'] <=1){
                            echo $comment_count['total']. 'comment';
                        }else{
                            echo $comment_count['total']. 'comments';
                        }
                        
                    ?>
                </h6>
            </div>
        </div>


        <hr class="mt-2">

        <div class="d-flex align-items-center pb-3 px-3 justify-content-between gap-2">
            <div class="d-flex gap-2" style="cursor: pointer;">
                <div class="react-icon">
                    <i class="bi bi-hand-thumbs-up"></i>
                </div>
                <div class="react-text">Like</div>
            </div>
            <div class="d-flex gap-2 comment-btn" style="cursor: pointer;">
                <div class="react-icon">
                    <i class="bi bi-chat"></i>
                </div>
                <div class="react-text">Comment</div>
            </div>
            <div class="d-flex gap-2" style="cursor: pointer;">
                <div class="react-icon">
                    <i class="bi bi-share"></i>
                </div>
                <div class="react-text">Share</div>
            </div>
            <div class="d-flex gap-2" style="cursor: pointer;">
                <div class="react-icon">
                    <i class="bi bi-download"></i>
                </div>
                <div class="react-text">Save</div>
            </div>
        </div>

        <form action="./add-comment.php" method="POST" class="d-flex comment-form p-2">
            <?php
            if (isset($_SESSION['image'])) {
                if ($_SESSION['image'] == NULL) {
                    echo "<img width='30px' class='rounded-circle' height='30px' src='https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg' alt='Facebook user'>";
                } else {
                    echo "<img width='30px' height='30px' src='{$_SESSION['image']}' alt='Facebook user'>";
                }
            } else {
                echo "<img width='30px' class='rounded-circle' height='30px' src='https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg' alt='Facebook user'>";
            }
            ?>
            <div class="d-flex w-100 form-control rounded-pill">
                <input type="hidden" name="post_id" value="<?php echo $row['post_id'] ?>">
                <input type="text" name="comment" id="commentInput" class="w-100 border-0 rounded-pill" style="outline-width: 0;" placeholder="Comment <?php echo $_SESSION['username'] ?>">
                <button class="bg-transparent border-0">
                    <i class="bi bi-send" id="sendIcon"></i>
                </button>
            </div>
        </form>

    </div>

<?php

}
?>