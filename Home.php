<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="page.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/home-page.png" />
</head>

<header>
    <!--  Navbar  -->
    <div class="nav">
        <ul>
            <li class="active"><a href="Home.php">Home</a></li>
            <?php if ($_SESSION['role'] == 2) { ?> <!-- Admin -->
                <li><a href="Admin.php">Courses</a></li>
                <li><a href="Users.php">Users</a></li>
            <?php } elseif ($_SESSION['role'] == 3) { ?> <!-- Moderator -->
                <li><a href="Mod.php">Courses</a></li>
            <?php } else { ?> <!-- User -->
                <li><a href="MyC.php">My Courses</a></li>
                <li><a href="Market.php">Market</a></li>
            <?php } ?>
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
    <div class="ads">
        <div class="first">
            <h1>Learn on your schedule</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga cumque velit perferendis soluta debitis sunt accusantium repellendus adipisci laboriosam? Molestias nobis similique perferendis. Repellendus impedit sit tempora officia consequuntur quia.</p>
            <button>Read More</button>
        </div>
        <div class="image">
            <img src="char.png" alt="">
        </div>
    </div>
    <div class="content">
        <h1 class="title">New Courses</h1>
        <div class="courses">
            <?php
            require_once "db.php";
            $db = new Dbase();

            $product_array = $db->query("SELECT * FROM `course` ORDER BY id DESC");
            if (!empty($product_array)) {
                for ($i = 0; $i < 3; $i++) {
            ?>
                    <div class="course">
                        <div class="Text">
                            <h2><?php echo $product_array[$i]["Name"]; ?></h2>
                            <h4><?php echo $product_array[$i]["Company"]; ?></h4>
                            <h4>Difficult: <span <?php if ($product_array[$i]["Dif"] == "Easy") echo "class='easy'";
                                                       elseif ($product_array[$i]["Dif"] == "Mid") echo "class='mid'";
                                                       else echo "class='hard'"; ?>><?php echo $product_array[$i]["Dif"]; ?><span></h4>
                        </div>

                        <form action="sub.php" method="POST">
                            <input hidden name="code" type="text" value="<?php echo $course_array[$key]['Code']; ?>">
                            <input hidden name="mail" type="text" value="<?php echo $_SESSION['mail']; ?>">
                            <button class="sub" type="submit">Subscribe</button>
                        </form>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div>

    </div>
</body>
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