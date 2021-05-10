<?php

if((isset($_POST['name']) && isset($_POST['comp']) && isset($_POST['dif']) && !empty($_POST['code']) && !empty($_POST['name']) && !empty($_POST['comp']) && !empty($_POST['dif']) && !empty($_POST['code']))){
    require_once("db.php");
    $db = new Dbase();
    
    $name = $_POST['name'];
    $comp = $_POST['comp'];
    $dif = $_POST['dif'];
    $code = $_POST['code'];

    $sql =  $db->sql("INSERT INTO `course`(`id`, `Name`, `Company`, `Dif`, `Code`) VALUES ('','$name','$comp','$dif','$code')");
    header("Location: Mod.php");
}
else{
    header("Location: Mod.php?error=One or More fields are empty");
}
?>