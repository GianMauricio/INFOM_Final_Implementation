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
  <form action = "includes/signup_inc.php" method="post">
    <input type = "text" name = "UserName" placeholder = "Username..."> <br>
    <input type = "password" name = "Pwd" placeholder = "Password..."> <br>
    <input type = "password" name = "Conf Pwd" placeholder = "Password Again..."> <br>

    <button type = "Submit" name = "Submit">Sign Up</button>
  </form>
</section>

</body>

</html>
