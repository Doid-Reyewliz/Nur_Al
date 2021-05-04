<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="sign.css">
    <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/add-user-male.png" />
</head>

<body>
    <section>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2>Sign Up</h2>
                    <form action="rg.php" method="POST">
                        <?php if (isset($_GET['error'])) { ?>
                            <span class="error"><?php echo $_GET['error']; ?></span>
                        <?php } ?>
                        <input name="log" id="log" type="email" placeholder="Email">
                        <input name="name" id="name" type="text" placeholder="Username">

                        <input name="pass" id="pass" type="password" placeholder="Password"> <br>

                        <input name="gen" type="radio" id="gen" value="Male">
                        <label>Male</label>
                        <input name="gen" type="radio" id="gen" value="Female">
                        <label>Female</labelfor=>
                        <input name="gen" type="radio" id="gen" value="Other">
                        <label>Other</label>
                        <br>

                        <label for="bday">Birthday:</label>
                        <input id="bday" name="bday" type="date">

                        <select name="quest" id="quest">
                            <option value="" disabled selected>Choose Question</option>
                            <option value="Name of your first pet">Name of your first pet</option>
                            <option value="Your University">Your University</option>
                            <option value="Favorite country">Favorite country</option>
                        </select>

                        <input name="ans" id="ans" type="text" placeholder="Your Answer">

                        <label>Languages That you know: </label> <br>
                        <ul>
                            <li>
                                <input name="check[]" type="checkbox" id="check" value="C++">
                                <label>C++</label>
                                <input name="check[]" type="checkbox" id="check" value="Java">
                                <label>Java</label>
                                <input name="check[]" type="checkbox" id="check" value="Web">
                                <label>Web</label>
                                <input name="check[]" type="checkbox" id="check" value="Python">
                                <label>Python</label>
                            </li>
                        </ul>

                        <input id="submit" type="submit" value="Register">
                        <input id="reset" type="reset" value="Reset">
                        <br>

                        <p>Have an accouunt ? <a href="index.php">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>