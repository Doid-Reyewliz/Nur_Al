<?php
session_start();
require_once "db.php";
$db = new Dbase();

$output = "";

//for Admin
if($_SESSION['role'] == 2){
    if(isset($_POST['query'])){
        $search = $_POST['query'];
        $sql = $db->sql("SELECT * FROM course WHERE Name LIKE '%$search%' OR Company LIKE '%$search%'");
    }
    else{
        $sql = $db->sql("SELECT * FROM course ORDER BY id ASC");
    }

    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .=  "<div class='course'>
                            <div class='Text'>
                                <h2>{$row['Name']}</h2>
                                <h4>{$row['Company']}</h4>
                                <h4>Difficult: <span>{$row['Dif']}</span></h4>
                            </div>
                            <button class='rem' data-id='{$row['Code']}' type='submit'>Remove</button>
                        </div>";
        }
        echo $output;
    }
    else{
        echo "<h3>No values</h3>";
    }
}

//for Moderator
elseif($_SESSION['role'] == 3){
    if(isset($_POST['query'])){
        $search = $_POST['query'];
        $sql = $db->sql("SELECT * FROM course WHERE Name LIKE '%$search%' OR Company LIKE '%$search%'");
    }
    else{
        $sql = $db->sql("SELECT * FROM course ORDER BY id ASC");
    }

    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= "<div class='course'>
                            <div class='edit'>
                                <input id='name' type='text' name='name' value='{$row['Name']}'>
                                <input id='comp' type='text' name='comp' value='{$row['Company']}'>
                                <input id='dif' type='text' name='dif' value='{$row['Dif']}'>
                                <input id='code' type='text' name='code' value='{$row['Code']}'>
                                <input id='id' hidden type='text' name='id' value='{$row['id']}'>
                                <button class='b_edit' type='submit'>Edit</button>
                            </div>
                        </div>";
        }
        echo $output;
    }
    else{
        echo "<h3>No values</h3>";
    }
}

//for User
else{
    if(isset($_POST['query'])){
        $search = $_POST['query'];
        $sql = $db->sql("SELECT * FROM course WHERE Name LIKE '%$search%' OR Company LIKE '%$search%'");
    }
    else{
        $sql = $db->sql("SELECT * FROM course ORDER BY id ASC");
    }

    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .=  "<div class='course'>
                            <div class='Text'>
                                <h2>{$row['Name']}</h2>
                                <h4>{$row['Company']}</h4>
                                <h4>Difficult: <span>{$row['Dif']}</span></h4>
                            </div>
                            <form action='sub.php' method='POST'>
                                <input hidden name='code' type='text' value='{$row['Code']}'>
                                <input hidden name='mail' type='text' value='{$_SESSION['mail']}'>
                                <button class='sub' type='submit'>Subscribe</button>
                            </form>
                        </div>";
        }
        echo $output;
    }
    else{
        echo "<h3>No values</h3>";
    }
}

?>