<?php
session_start();
?>

<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="CSSStuff/StyleSheet.css">
<title>Directory</title>
</head>

<body>
  <h1>User Views</h1>
  <br>
  <?php
    if(isset($_SESSION["PlayerName"])){
      echo "<p>To procceed to personal statistics: <a href='http://localhost/SQLViews/PlayerProfiles/SingleStatView.php'>To personal stats View</a></p>";
      echo "<p>Logout: <a href='http://localhost/SQLViews/Includes/logout_inc.php'>Logout</a></p>";
    }

    else{
      echo "<p>To procceed to Sign up: <a href='http://localhost/SQLViews/SignUpForm.php'>To Create Account</a></p>";
      echo "<p>To procceed to Log in: <a href='http://localhost/SQLViews/LoginForm.php'>To Login to an Existing Account</a></p>";
    }
  ?>
  <p>To procceed to player stats: <a href="http://localhost/SQLViews/PlayerProfiles/">To Player View</a></p>
  <p>To procceed to hero stats: <a href="http://localhost/SQLViews/Heroes/">To Heroes View</a></p>
  <p>To procceed to role stats: <a href="http://localhost/SQLViews/Roles/ProfileView.php">To Roles Page</a></p>
  <p>To procceed to region stats: <a href="http://localhost/SQLViews/Regions/ProfileView.php">To Regions Page</a></p>
</body>

</html>
