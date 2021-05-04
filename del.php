<?php
session_start();

if(isset($_POST['code'])){
    require_once("db.php");
    $db = new Dbase();
    
    $code = $_POST['code'];
    $login = $_POST['Login'];

    $u_c = $db->sql("DELETE FROM `user_course` WHERE course_code = '$code'");
    $sql = $db->sql("DELETE FROM `course` WHERE Code = '$code'");

    exit;
}

elseif(isset($_POST['id'])){
    require_once("db.php");
    $db = new Dbase();

    $id = $_POST['id'];
    $login = $_POST['log'];

    $u_r = $db->sql("DELETE FROM `user_roles` WHERE user_mail = '$login'");
    $u_c = $db->sql("DELETE FROM `user_course` WHERE user_mail = '$login'");
    $user = $db->sql("DELETE FROM `users` WHERE id = '$id'");

    exit;
}
exit;
?>