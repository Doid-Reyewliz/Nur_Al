<?php
session_start();
require_once "db.php";

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $db = new Dbase();
    $sql = $db->query("SELECT * FROM users WHERE id = '$id'");

     foreach($sql as $key => $value){
          $login = $sql[$key]['Login'];
          $name = $sql[$key]['Name'];
          $pass = $sql[$key]['Password'];
          $gen = $sql[$key]['Gender'];
          $bday = $sql[$key]['Birthday'];
          $que = $sql[$key]['Question'];
          $ans = $sql[$key]['Answer'];
          $lang = $sql[$key]['Lang'];
     }
?>
     <!DOCTYPE html>
     <html>

     <head>
          <title>Profile</title>
          <link rel="stylesheet" type="text/css" href="sign.css">
          <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/000000/user-male-circle.png"/>
     </head>

     <body>
          <section>
               <div class="box">
                    <div class="container">
                         <div class="content">
                              <h2 class="profl">Welcome <span> <?php echo $name; ?> </span> </h2>
                              <h2 class="prof">Information: <a href="Edit.php"><img src="https://img.icons8.com/pastel-glyph/64/ffffff/edit--v1.png"/></a></h2>
                              <div class="inf">
                                        <p> <?php
                                             echo nl2br("Login: <span>" . $login .
                                                       "</span>\nPassword:<span> " . $pass .
                                                       "</span>\nGender: <span>" . $gen .
                                                       "</span>\nBirthday: <span>" . $bday .
                                                       "</span>\nQuestion: <span>" . $que .
                                                       "</span>\nAnswer: <span>" . $ans .
                                                       "</span>\nLanguages: <span>" . $lang);
                                             ?>
                                        <p>
                              </div>
                              <div class="butt">
                                   <a href="Home.php">Back</a>
                              </div>
                         </div>
                    </div>
               </div>
          </section>
     </body>

     </html>

<?php
} else {
     header("Location: Home.php");
     exit();
}
?>