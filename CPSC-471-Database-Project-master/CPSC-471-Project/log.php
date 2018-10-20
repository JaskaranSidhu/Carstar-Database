<?php
// Jaskaran, Lamess, Shannon
$link = mysqli_connect("localhost", "root", "", "cpsc471db");

if(!$link) {
  die('Unable to connect'. mysqli_error($link));
}
?>
<!DOCTYPE html>
<html>
    <head>
          <title>CARSTAR Log In </title>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <center>
            <div class = "heading">
                <img src="https://d2oeydowngaei1.cloudfront.net/resources/front/images/carstar-logo.png">
            </div>
            <div class="login">
            <form name="Login form" method="post" action="">
                <table>
                  <tr>
                    <td><b>Username</b></td>
                    <td><input type="text" name="user" placeholder="Username" required></td>
                  </tr>
                  <tr>
                    <td><b>Password</b></td>
                    <td><input type="password" name="pass" placeholder="Password" required></td>
                  </tr>
                  <tr>
                    <td colspan="2" align = "center">
                      <input type="submit" name="submitLogin" value="Log in">
                    </td>
                  </tr>
                </table>
            </form>
            </div>
        </center>
   
        <?php

        $flag = True;
        $query="SELECT * FROM employee";
        $result = mysqli_query($link, $query);

        if(isset($_POST["submitLogin"])) {
          while($employee=mysqli_fetch_assoc($result)) {
            if($employee['Username'] == $_POST['user'] && $employee['Password'] == $_POST['pass']) {
              $flag = False;
              header('Location: Home.php');
            }
          }
          if($flag == True){
            header('Location: FailedLog.php');
          }
        }

        ?>
    </body>
</html>
