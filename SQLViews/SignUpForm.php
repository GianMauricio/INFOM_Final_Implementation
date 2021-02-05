<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="CSSStuff/StyleSheet.css">
<title>Signup</title>
</head>

<body>

<section class = "Sign-up form">
  <h2>Sign Up</h2>
  <p>To procceed to Home page: <a href='http://localhost/SQLViews/'>To Home Page</a></p>
  <form action = "includes/signup_inc.php" method="post">
    <input type = "text" name = "UserName" placeholder = "Username..."> <br>
    <input type = "text" name = "PlayerID" placeholder = "Your player ID"> <br>
    <input type = "password" name = "Pwd" placeholder = "Password..."> <br>
    <input type = "password" name = "ConfPwd" placeholder = "Password Again..."> <br>

    <button type = "Submit" name = "Submit">Sign Up</button>
  </form>

  <?php
    if(isset($_GET["error"])){
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields</p>";
      }

      else if ($_GET["error"] == "UwU") {
        echo "<p>Invalid User Name</p>";
      }

      else if ($_GET["error"] == "passconf") {
        echo "<p>Passwords do not match!</p>";
      }

      else if ($_GET["error"] == "nameexists") {
        echo "<p>That user name is taken!</p>";
      }

      else if ($_GET["error"] == "prepfailed") {
        echo "<p>Dah! My database!</p>";
      }

      #And if by some miracle the user got passed all those error checks
      else if ($_GET["error"] == "none") {
        echo "<p>You have signed in!</p>"; #They are in the DB
        echo "<p>To procceed to Login page: <a href='http://localhost/SQLViews/LoginForm.php'>To Home Page</a></p>";
      }
    }
  ?>

</section>

</body>

</html>
