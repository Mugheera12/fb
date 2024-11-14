<?php

include ("./config.php");

session_start();

$f_name = $_POST["f_name"];

$l_name =$_POST["l_name"];

$date =$_POST["date"];

$month =$_POST["month"];

$year =$_POST["year"];

$gender = $_POST["gender"];

$m_mail =$_POST["m_mail"];

$password =$_POST["password"];

$dob = $date. '/' .$month . '/' . $year; 

$insert = "INSERT INTO users (f_name,l_name,dob,gender,m_mail,password) VALUES ('{$f_name}','{$l_name}','{$dob}','{$gender}','{$m_mail}','{$password}')" or die();

mysqli_query($connection,$insert);

$_SESSION["username"] = $f_name;

$_SESSION["id"] = mysqli_insert_id($connection);





header("Location: $base_url/home.php");

?>