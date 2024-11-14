<?php
    session_start();
    include("./config.php");
    $comment = $_POST['comment'];
    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

    $add_comment = "INSERT INTO comments (comment,user_id,post_id) VALUES ('{$comment}',$user_id,$post_id)";

    mysqli_query($connection, $add_comment) ;

    $_SESSION['comment_success'] = 'Comment added Sucessfully';

    header("Location:{$_SERVER['HTTP_REFERER']}");
?>