<?php
include("./config.php");

session_start();

//check wheather user exist

$m_mail = $_POST['m_mail'];

$password = $_POST['password'];

$select= "SELECT * FROM users WHERE m_mail = '{$m_mail}' AND password = '{$password}'" or die();

$checkUser = mysqli_query($connection,$select);

//if user exist

if(mysqli_num_rows($checkUser)> 0){
    $row = mysqli_fetch_assoc($checkUser);
    $_SESSION["username"] = $row["f_name"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["image"] = $row["image"];
    $_SESSION["success_login"] = 'Welcome'. $row['f_name'];
    header("Location: $base_url/home.php");
}else{
    $_SESSION["login_error"]='Invalid Credentials';
    header("Location:$base_url");
}
?>