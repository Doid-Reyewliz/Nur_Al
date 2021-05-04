<?php

session_start();

require_once("db.php");
$db = new Dbase();

$id = $_SESSION['id'];
$log = $_POST['log'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$gen = $_POST['gen'];
$bday = $_POST['bday'];
$quest = $_POST['quest'];
$ans = $_POST['ans'];
$_SESSION['mail'] = $_POST['log'];

if (empty($_POST['check'])) {
	$lang = " ";
	echo $ch;
} else {
	$lang[] = implode(", ", $_POST['check']);
}

for($i=0; $i<sizeof($lang); $i++){
	$sql = $db->sql("UPDATE users SET `Login`='$log',`Password`='$pass',`Name`='$name',`Gender`='$gen',`Birthday`='$bday',`Question`='$quest',`Answer`='$ans',`Lang`='$lang[$i]' WHERE id = $id");
	header("Location:Profile.php");
}
?>