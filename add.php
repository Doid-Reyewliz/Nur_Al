<?php

if((isset($_POST['name'], $_POST['comp'], $_POST['dif'], $_POST['code']))){
    require_once("db.php");
    $db = new Dbase();

    $name = $_POST['name'];
    $comp = $_POST['comp'];
    $dif = $_POST['dif'];
    $code = $_POST['code'];

    $sql =  $db->sql("INSERT INTO `course`(`id`, `Name`, `Company`, `Dif`, `Code`) VALUES ('','$name','$comp','$dif','$code')");
    exit;
}
?>