<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Market</title>
    <link rel="stylesheet" type="text/css" href="page.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/saving-book.png" />
</head>

<header>
    <!--  Navbar  -->
    <div class="nav">
        <ul>
            <li><a href="Home.php">Home</ф>
            </li>
            <li class="active"><a href="MyC.php">My Courses</a></li>
            <li><a href="Market.php">Market</a></li>
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
    <div class="content">
        <h1 class="title">My Courses</h1>
        <div class="courses">
            <?php
            require_once("db.php");
            $db = new Dbase();

            $mail = $_SESSION['mail'];
            $check = $db->sql("SELECT `course_code` FROM `user_course` WHERE `user_mail` = '$mail'");

            $course = $db->query("SELECT * FROM course");

            if (mysqli_num_rows($check) > 0) {
                $course_array = $db->query("SELECT `course_code` FROM `user_course` WHERE `user_mail` = '$mail'");
                foreach ($course_array as $key => $value) {
                    $arr[] = $course_array[$key]['course_code'];
                    $courses = implode(", ", $arr);
                }

                foreach ($course as $key => $value) {
                    if (stristr($courses, $course[$key]["Code"])) {
            ?>
                        <div class="course">
                            <div class="text">
                                <h2><?php echo $course[$key]["Name"]; ?></h2>
                                <h4><?php echo $course[$key]["Company"]; ?></h4>
                                <h4>Difficult: <span <?php if ($course[$key]["Dif"] == "Easy") echo "class='easy'";
                                                        elseif ($course[$key]["Dif"] == "Mid") echo "class='mid'";
                                                        else echo "class='hard'"; ?>><?php echo $course[$key]["Dif"]; ?><span></h4>
                            </div>

                            <button data-id='<?php echo $course[$key]['Code']; ?>' class="unsub" type="submit">Unsubscribe</button>
                        </div>
            <?php
                    }
                }
            }
            else{?>
                <h4 class="empty">You haven't subscribed to any courses yet</h4>
            <?php }

            ?>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.unsub').click(function(){
        var el = this;
        var deleteprod = $(this).data('id');
        var confirmalert = confirm("Unsubscribe from this course?");

        if (confirmalert == true) {
        $.ajax({
            url: 'unsub.php',
            type: 'POST',
            data: { code:deleteprod },
            success: function(response){
                $(el).closest('.course').fadeOut(800,function(){
                $(this).remove();
                });
            }
            });
        }
    });
});
</script>
<footer>
    <div class="top">
        <div>
            <h3>Course</h3>
            <p>About project</p>
            <p>About the projectp</p>
            <p>What we offer</p>
            <p>Guide</p>
            <p>Career</p>
            <p>Catalog</p>
            <p>Coursera Plus</p>
        </div>
        <div>
            <h3>Community</h3>
            <p>Students</p>
            <p>Partners</p>
            <p>Developers</p>
            <p>Beta testers</p>
            <p>Translators</p>
            <p>The blog</p>
            <p>Technical blog</p>
            <p>Teaching Center</p>
        </div>
        <div>
            <h3>Other</h3>
            <p>Press</p>
            <p>Investors</p>
            <p>Conditions</p>
            <p>Privacy Policy</p>
            <p>Help</p>
            <p>Availability</p>
            <p>Contacts</p>
            <p>Articles</p>
        </div>
    </div>
    <div class="bottom">
        <h3>© Course Inc., 2021 All rights reserved.</h3>
        <div>
            <img src="https://img.icons8.com/fluent/50/000000/tiktok.png" />
            <img src="https://img.icons8.com/fluent/50/000000/twitter.png" />
            <img src="https://img.icons8.com/fluent/50/000000/instagram-new.png" />
            <img src="https://img.icons8.com/fluent/50/000000/gmail--v2.png" />
        </div>
    </div>
</footer>

</html>