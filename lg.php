<?php
session_start();
require_once("db.php");
if (isset($_POST['log']) && isset($_POST['pass'])) {

	$log = $_POST['log'];
	$pass = $_POST['pass'];
	
	if (empty($log)) {
		header("Location: index.php?error=Login is required");
		exit();
	}
	else if(empty($pass)){
		header("Location: index.php?error=Password is required");
		exit();
	}
	else{
		$db = new Dbase();

		$users = $db -> query("SELECT * FROM users WHERE Login='$log' AND Password='$pass'");

		if (!empty($users)) {

			$role = $db->query("SELECT * FROM user_roles WHERE user='$log'");
			
			foreach($users as $i => $values){
				foreach($role as $j => $values){
					if($role[$j]['role'] == '1'){
						$_SESSION['id'] = $users[$i]['id'];
						$_SESSION['role'] = $role[$j]['role'];
						$_SESSION['mail'] = $log;
						$_SESSION['name'] = $users[$i]['Name'];
						setcookie("log", $log, time() + 20, "/");
						setcookie("pass", $pass, time() + 20, "/");
						header("Location: Home.php");
						exit();
					}
					else if($role[$j]['role'] == '2') {
						$_SESSION['id'] = $users[$i]['id'];
						$_SESSION['role'] = $role[$j]['role'];
						$_SESSION['mail'] = $log;
						$_SESSION['name'] = $users[$i]['Name'];
						setcookie("log", $log, time() + 20, "/");
						setcookie("pass", $pass, time() + 20, "/");
						header("Location: Admin.php");
						exit();
					}
					else if($role[$j]['role'] == '3'){
						$_SESSION['id'] = $users[$i]['id'];
						$_SESSION['role'] = $role[$j]['role'];
						$_SESSION['mail'] = $log;
						$_SESSION['name'] = $users[$i]['Name'];
						setcookie("log", $log, time() + 20, "/");
						setcookie("pass", $pass, time() + 20, "/");
						header("Location: Mod.php");
						exit();
					}
				}
			}

		}else{
			header("Location: index.php?error=Incorect Login or Password");
			exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
