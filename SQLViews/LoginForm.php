<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="CSSStuff/StyleSheet.css">
<title>Log In</title>
</head>

<body>

<section class = "Log-in form">
  <h2>Login</h2>
  <form action = "includes/login_inc.php" method="post">
    <input type = "text" name = "UserName" placeholder = "Username..."> <br>
    <input type = "password" name = "Pwd" placeholder = "Password..."> <br>


    <button type = "Submit" name = "Submit">Log In</button>
  </form>

  <?php
    if(isset($_GET["error"])){
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields</p>";
      }

      else if ($_GET["error"] == "nouser") {
        echo "<p>Invalid User Name</p>";
      }

      else if ($_GET["error"] == "wrongpass") {
        echo "<p>Invalid password!</p>";
      }
    }
  ?>

</section>

</body>

</html>
