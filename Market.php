<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Market</title>
    <link rel="stylesheet" type="text/css" href="page.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/shopping-bag.png" />
</head>

<header>
    <!--  Navbar  -->
    <div class="nav">
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="MyC.php">My Courses</a></li>
            <li class="active"><a href="Market.php">Market</a></li>
        </ul>
    </div>

    <!--  Profile  -->
    <div class="profile">
        <ul>
            <li class="name"><h3><?php echo $_SESSION['name']; ?></h3></li>
            <li class="log"><form action="Profile.php"><button type="submit">Profile</button></form></li>
            <li class="log"><form action="index.php"><button type="submit">Log out</button></form></li>
        </ul>
    </div>
</header>

<body>
    <div class="content">
        <h1>Courses</h1>

        <div id="search">
            <input name="search" class="search" type="text" placeholder=" Search">
        </div>

        <div class="courses"></div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
//search
$(document).ready(function(){
    loadData();
    function loadData(query){
        $.ajax({
            url : "search.php",
            type: "POST",
            chache: false,
            data:{query:query},
            success:function(response){
                $(".courses").html(response);
            }
        });
    }

    $(".search").keyup(function(){
        var search = $(this).val();
        if (search !="") {
            loadData(search);
        }else{
            loadData();
        }
    });
});
</script>

</html>