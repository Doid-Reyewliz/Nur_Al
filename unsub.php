<?php
session_start();

if(isset($_POST['code'])){
    require_once("db.php");

    $u_email = $_SESSION['mail'];
    $c_code = $_POST['code'];
    $db = new Dbase();
    $sql =  $db->sql("DELETE FROM `user_course` WHERE user_mail = '$u_email' AND course_code = '$c_code'");
    exit;
}
exit;
?>