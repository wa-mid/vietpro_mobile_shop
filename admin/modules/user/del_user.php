<?php
session_start();
define("SECURITY",true);
$user_id = $_GET['user_id'];
include_once("../../../config/connect.php");
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    mysqli_query($connect,"DELETE FROM user WHERE user_id = '$user_id'");
    header("location: ../../index.php?page_layout=user");
}
else{
    header("location: ../../index.php");
}
?>