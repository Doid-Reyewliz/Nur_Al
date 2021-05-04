<?php
session_start();
if ($_SESSION['role'] == 2) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Users</title>
        <link rel="stylesheet" type="text/css" href="page.css">
        <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/group.png" />
    </head>

    <header>
        <!--  Navbar  -->
        <div class="nav">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Admin.php">Courses</a></li>
                <li class="active"><a href="Users.php">Users</a></li>
            </ul>
        </div>

        <!--  Profile  -->
        <div class="profile">
            <ul>
                <li class="name">
                    <h3><?php echo $_SESSION['name']; ?></h3>
                </li>
                <li class="log">
                    <form action="Profile.php"><button type="submit">Profile</button></form>
                </li>
                <li class="log">
                    <form action="index.php"><button type="submit">Log out</button></form>
                </li>
            </ul>
        </div>
    </header>

    <body>
        <div class="table">
            <h1>All Users</h1>
            <div class="t">
                <?php
                require_once("db.php");
                $db = new Dbase();
                $q = $db->query("SELECT * FROM users");

                echo "<table><tr><th>ID</th><th>Email</th><th>Password</th><th>Name</th><th>Gender</th><th>Birthday</th><th>Question</th><th>Answer</th><th></th></tr>";
                if (!empty($q)) {
                    foreach ($q as $row) {
                        if ($row['id'] < 1) {
                            continue;
                        } else {
                            echo "<tr><td>" . $row["id"] .
                                "</td><td>" . $row["Login"] .
                                "</td><td>" . $row["Password"] .
                                "</td><td>" . $row["Name"] .
                                "</td><td>" . $row["Gender"] .
                                "</td><td>" . $row["Birthday"] .
                                "</td><td>" . $row["Question"] .
                                "</td><td>" . $row["Answer"] .
                                "</td><td>" . "<button class='trash'; data-id='$row[id]' type='submit'><img src='https://img.icons8.com/fluent/48/000000/filled-trash.png'> </img></button>" .
                                "</td></tr>";
                        }
                    }
                    echo "</table>";
                }
                ?>
            </div>
        </div>
    <?php
} else {
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
//remove
$(document).ready(function(){
    $('.trash').click(function(){
        var el = this;
        var deleteprod = $(this).data('id');
        var confirmalert = confirm("Are you sure?");

        if (confirmalert == true) {
        $.ajax({
            url: 'del.php',
            type: 'POST',
            data: { id:deleteprod },
            success: function(response){
                $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
                });
            }
            });
        }
    });
});
</script>
</html>