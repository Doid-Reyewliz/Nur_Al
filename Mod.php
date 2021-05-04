<?php
session_start();
if ($_SESSION['role'] == 3) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Settings</title>
    <link rel="stylesheet" type="text/css" href="page.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/settings.png" />
</head>

<header>
    <!--  Navbar  -->
    <div class="nav">
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li class="active"><a href="Mod.php">Courses</a></li>
        </ul>
    </div>

    <!--  Profile  -->
    <div class="profile">
        <ul>
            <li class="log">
                <h3 class="name"><?php echo $_SESSION['name']; ?></h3>
            </li>
            <li class="log">
                <form action="Profile.php"><button type="submit">Profile</button></form>
            </li>
            <li class="log">
                <form action="index.php" method="POST"><button type="submit">Log out</button></form>
            </li>
        </ul>
    </div>
</header>

<body>
    <div class="content">
        <h1>Manage Courses</h1>
        <div id="search">
            <input name="search" class="search" type="text" placeholder=" Search">
        </div>

        <?php if (isset($_GET['edit'])) {echo "<span class='edit'; style='width: 300px; margin-left: 40%; padding-top: 0; font-size: 18px;'>" . $_GET['edit'] . "</span>";}?>
        <br>
        <div class="new">
            <div class="course">
                <form class="add_new" action="add.php" method="POST">
                    <input name="name" type="text" placeholder="Name" autocomplete="off">
                    <input name="comp" type="text" placeholder="Company" autocomplete="off">
                    <input name="dif" type="text" placeholder="Difficult" autocomplete="off">
                    <input name="code" type="text" placeholder="Code" autocomplete="off">
                    <div>
                        <button type="submit">Add</button>
                        <?php if (isset($_GET['error'])) {
                            echo "<span class='error'>" . $_GET['error'] . "</span>";
                        } ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="courses">
        </div>
    </div>
<?php
}

else {
    echo "<body style= 'background-image: linear-gradient(to bottom left, #ffa249, #9e00f6);'><h1 style='
    color: #fff;
    margin-top: 15%;
    margin-left: 23%;
    width: 50%;
    padding: 2%;
    text-align: center;
    background: #9e00f6;
    backdrop-filter: blur(5px);
    border-radius: 20px;
    background: rgba(255, 255, 255, .1);
    box-shadow: 0 25px 45px rgba(0, 0, 0, .1);
    border: 3px solid rgba(255, 255, 255, .5);
    border-right: 3px solid rgba(255, 255, 255, .2);
    border-bottom: 3px solid rgba(255, 255, 255, .2);

    '>How did you end up here? <br>Anyway, you don't have an <b>access</b> to this page !<h1>
    <a style='
    margin-left: 41%;
    color: #fff;
    padding: .6%;
    margin-top: 1%;
    text-decoration:none; background: #9e00f6;
    backdrop-filter: blur(5px);
    border-radius: 10px;
    background: rgba(255, 255, 255, .1);
    box-shadow: 0 25px 45px rgba(0, 0, 0, .1);
    border: 3px solid rgba(255, 255, 255, .5);
    border-right: 3px solid rgba(255, 255, 255, .2);
    border-bottom: 3px solid rgba(255, 255, 255, .2);' href='Home.php'>Go to Home page </a>
    
    </body>";
}
?>
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

//edit

</script>

</html>