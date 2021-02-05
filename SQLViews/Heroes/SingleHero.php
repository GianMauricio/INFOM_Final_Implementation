<?php
session_start();
?>
<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<title>Single Hero View</title>
</head>

<body>
  <h1>Hero View</h1>
  <br>

  <?php
  $connection = mysqli_connect("localhost:3306", "root", "!ntenseAvar1ce", "overbuff2final");
  if($connection){
    //echo "Database found! <br>";
  }

  else{
    #Yes, exit in PhP is legit called die
    die("Connection failed; Reason: ".mysqli_connect_error());
  }

  $Hname = $_GET["hero"];
  $sqlHeader = ["Hero Name", "Pick Rate", "Role", "Win Rate"];
  $sqlQuery = "SELECT
              heroes.heroName AS 'Name',
              heroes.pickRate AS 'Pick_Rate',
              heroes.roles AS 'Role',
              heroes.heroWinsLoses AS 'Win_Rate'
              FROM heroes
              WHERE heroes.heroName = '{$Hname}'";

  $QueryOut = mysqli_Query($connection, $sqlQuery);

  if(mysqli_num_rows($QueryOut) > 0) {
    //echo "Query succeeded!";
    //echo "<br>";
    #get tabulated rows as arrays
    $entry = 0;
    while($activerow = mysqli_fetch_array($QueryOut)){
      #feed data to an array variable
      foreach($activerow as $key => $incomingvalue){
        //echo $incomingvalue;
        $HeroProfile[$entry][$key] = $incomingvalue;
      }
      $entry++;
      #echo $activerow[1].", ".$activerow[2].", ".$activerow[3].", ".$activerow[4].", ".$activerow[5].", ".$activerow[6].", ".$activerow[7].", ".$activerow[8]; #Manual data print, attempted foreach loop fails
      #echo "<br>";
    }
  }

  #count data for table
  $Cols = 4;
  $Rows = mysqli_num_rows($QueryOut);

  //echo $Rows.", ".$Cols;

  #Maybe not needed? since sir will never see this > w<
  mysqli_close($connection);
  ?>
</body>

<table border = "10" cellspacing = "30" cellpadding = "20">
  <?php
  echo "<tr>";
  #Print out row headers
  foreach ($sqlHeader as $out) {
      echo "<td>";
      echo $out;
  }

  for($row = 0; $row < $Rows; $row++){
    echo "<tr>";
    for($col = 0; $col < $Cols; $col++){
      echo "<td>";
      echo $HeroProfile[$row][$col];
    }
  }
  ?>
</table>

<p>To view the list of all heroes: <a href="http://localhost/SQLViews/Heroes/HeroesView.php">To All Heroes View</a></p>
</html>
