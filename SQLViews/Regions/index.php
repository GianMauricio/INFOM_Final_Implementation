<?php
session_start();
?>

<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<link rel="stylesheet" href="../CSSStuff/StyleSheet.css">
<title>Directory</title>
</head>

<body>
  <h1>Region Views</h1>
  <br>
  <p>To view the list of all Regions: <a href="http://localhost/SQLViews/Regions/RegionsView.php">To Region List</a></p>

  <?php
  require_once '../Includes/AccountHandler.php';
  require_once '../Includes/functions.inc.php';
    if(isset($_SESSION["PlayerName"])){
      $currRegion = getRegion($connection, $_SESSION["PlayerName"]);
      echo "<p>Current player region: {$currRegion}";
    }
  ?>
</body>

</html>
