<?php
session_start();
include("./config.php");
$caption = $_POST['caption'];
$image_name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$user_id = $_SESSION['id'];

move_uploaded_file($tmp_name,"./post-images/$image_name");

$insert = "INSERT INTO posts (caption,image,user_id) VALUES ('{$caption}', '{$image_name}',$user_id)";

try {
    mysqli_query($connection, $insert) ;

    $_SESSION['post_success'] = 'Post Uploaded Successfully';

    header("Location: {$_SERVER['HTTP_REFERER']}");
} catch (\Throwable $th) {
    print_r($error);
}   

?>