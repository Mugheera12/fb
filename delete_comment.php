<?php

session_start();

include './config.php';

$id = $_GET['id'];

$delete_comment = "DELETE FROM comments WHERE id = $id";

mysqli_query($connection, $delete_comment);

$_SESSION['delete_comment'] = 'comments delete successfully';

header("location:{$_SERVER['HTTP_REFERER']}");

?>
