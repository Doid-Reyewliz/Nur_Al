<?php
    require_once("db.php");
    $db = new Dbase();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $comp = $_POST['comp'];
    $dif = $_POST['dif'];
    $code = $_POST['code'];

    $sql = $db->sql("UPDATE course SET `Name`='$name',`Company`='$comp',`Dif`='$dif',`Code`='$code' WHERE id=$id");

    header("Location:Mod.php");
?>