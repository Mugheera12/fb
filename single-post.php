<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./boot-css.php" ?>
    <title>Document</title>
    <style>
        .zoomable {
            transform-origin: center;
            transition: transform 0.2s ease;
        }
        .expanded {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 1000;
            background-color: black;
        }
        .expanded .post_image img {
            height: 540px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
<?php

if(isset($_SESSION['delete_comment'])){

?>


<div style="transition: all 0.6s;" class="flash-massage z-3 position-fixed top-0 end-0 py-2 px-5 bg-danger text-white fw-semibold">

<?php echo $_SESSION['delete_comment'] ?>

</div>


<?php 

}

unset($_SESSION['delete_comment'])

?>

    <div class="container-fluid">
        <div class="row">
            <div id="postContainer" class="col-md-9 col-sm-7 bg-black zoomable" style="height: 100vh;">
                <div class="d-flex justify-content-between align-items-center text-white">
                    <div class="d-flex gap-2 p-2">
                        <i class="bi bi-x-lg" onclick="history.back()"></i>
                        <img width="30px" height="30px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Facebook_Logo_2023.png/768px-Facebook_Logo_2023.png" alt="">
                    </div>
                    <div class="d-flex gap-3 p-2">
                        <i class="bi bi-zoom-in" onclick="zoomIn()"></i>
                        <i class="bi bi-zoom-out" onclick="zoomOut()"></i>
                        <i class="bi bi-arrows-angle-expand" onclick="toggleExpand()"></i>
                    </div>
                </div>
                <div class="post_image" id="postImageContainer">
                    <img src="./post-images/<?php echo $_GET['post_image'] ?>" width="70%" height="500px" alt="" class="mx-auto d-block" style="object-fit: contain;">
                </div>
            </div>
            <div id="sidebar" class="col-md-3 col-sm-5 p-2">
                <div class="d-flex align-items-center gap-2 justify-content-end">
                    <div class="p-2 rounded-circle text-black" style="clip-path: circle(); background:#E4E6EB">
                        <i class="bi bi-plus"></i>
                    </div>
                    <div class="p-2 rounded-circle text-black" style="clip-path: circle(); background:#E4E6EB">
                        <i class="bi bi-chat"></i>
                    </div>
                    <div class="p-2 rounded-circle text-black" style="clip-path: circle(); background:#E4E6EB">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="p-2 rounded-circle text-black" style="clip-path: circle(); background:#E4E6EB">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
                <hr class="m-1">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="user-image">
                            <img width="30px" height="30px" class="rounded-circle" src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <h6 class="m-0 text-capitalize">
                                <?php echo $_GET['username'] ?>
                            </h6>
                            <h6 class="text-secondary m-0">
                                7h. <i class="bi bi-globe"></i>
                            </h6>
                        </div>
                    </div>
                    <i class="bi bi-three-dots"></i>
                </div>
                <p class="text-secondary">
                    <?php echo $_GET['caption']; ?>
                </p>
                <hr class="m-1">
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
                </div>
                <?php 

include './config.php';

$select2 = "SELECT users.id AS user_id,users.f_name,users.l_name,users.image,comments.id AS comment_id,comments.comment FROM comments JOIN users ON comments.user_id = users.id JOIN posts ON comments.post_id = posts.id WHERE comments.post_id
 = {$_GET['post_id']}";

    $comment_result = mysqli_query($connection,$select2);

    if(mysqli_num_rows($comment_result) > 0 ){

        while($row_comment = mysqli_fetch_assoc($comment_result)){

?>


<div class="d-flex my-2 gap-3 ">

    <?php

    if (isset($_SESSION['image'])) {

        if ($_SESSION['image'] == NULL) {

        echo "<img width='40px' height='40px' class='rounded-circle'  src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2TgOv9CMmsUzYKCcLGWPvqcpUk6HXp2mnww&s'>";

        } else {

            echo "<img width='40px' height='40px' class='rounded-circle'  src='{$_SESSION['image']}'>";

        }

    } else {

        echo "<img width='40px' height='40px' class='rounded-circle'  src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2TgOv9CMmsUzYKCcLGWPvqcpUk6HXp2mnww&s'>";

    }


    ?>


    <div class="d-flex align-items-center gap-3">

        <div class=" px-2 pt-1 rounded" style="background-color: #c9c9ca;">

            <h6 class="m-0 p-0">

                <?php echo $row_comment['f_name'] . ' ' .   $row_comment['l_name']; ?>

            </h6>

            <p class="m-0 p-0 ">

                <?php echo $row_comment['comment']; ?>

            </p>

        </div>

        <div class="pop-up position-relative m-3">

            <i class="bi bi-three-dots pop-up-opener" style="cursor: pointer;"></i>

            <div style="left: -297px; top: 120%; width: 300px; background-color: #ffffff; " class="pop-over d-none p-1 px-2 text-capitalize position-absolute shadow-lg rounded">

                <ul class="list-unstyled m-0 p-2 d-flex flex-column" >

                    <li style="cursor: pointer;" class="comments-li p-1">edit</li>

                    <a class="text-decoration-none text-dark" href="./delete_comment.php?id=<?php echo $row_comment['comment_id']?>">

                        <li style="cursor: pointer;" class="comments-li p-1">delete</li>

                    </a>

                </ul>

            </div>

        </div>


    </div>





</div>




<?php 



        }

    }else{

        echo "<p>NO Comments</p>";

    }

?>
            </div>
        </div>
    </div>

    <script>
        let scale = 1;
        let isExpanded = false;

        function zoomIn() {
            scale += 0.05;
            applyZoom();
        }

        function zoomOut() {
            if (scale > 0.1) {
                scale -= 0.1;
                applyZoom();
            }
        }

        function applyZoom() {
            document.getElementById('postImageContainer').style.transform = `scale(${scale})`;
        }

        function toggleExpand() {
            const postContainer = document.getElementById('postContainer');
            const sidebar = document.getElementById('sidebar');
            isExpanded = !isExpanded;
            if (isExpanded) {
                postContainer.classList.add('expanded');
                sidebar.classList.add('hidden');
            } else {
                postContainer.classList.remove('expanded');
                sidebar.classList.remove('hidden');
            }
        }
    </script>
    <script>
        let pop_openers = document.querySelectorAll('.pop-up-opener')

let pop_overs = document.querySelectorAll('.pop-over')

let massage = document.querySelector('.flash-massage');

pop_openers.forEach((item,index)=>{

item.addEventListener('click',()=>{

    pop_overs[index].classList.toggle ('d-none')

})

} )


setTimeout(() => {

massage.style.transform = 'translateX(120%)'

}, 2000);

    </script>
</body>

</html>

