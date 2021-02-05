<?php
session_start();
?>

<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<title>Player profile</title>
</head>

<body>
  <?php
  #Format it like this: host, username, password, DBName
  $connection = mysqli_connect("localhost:3306", "root", "!ntenseAvar1ce", "overbuff2final");


  if($connection){
    //echo "Database found! <br>";
  }
  else{
    #Yes, exit in PhP is legit called die
    die("Connection failed; Reason: ".mysqli_connect_error());
  }

  #Set data constants heroes
  $Cols = 10;
  $playerID = 0; #Replaceable
  $sqlHeader = ["Name", "Active Region", "Best Role", "Win Rate", "Preferred Hero", "Avg Damage", "Avg Healing", "Average Time playing objective", "Average Kills on point", "Overall Career Score"];
  $sqlQuery = "SELECT
              playerprofile.playerName AS 'Name',
              playerprofile.playerRegion AS 'Active Region',
              playerprofile.playerPreferredRole AS 'Best Role',
              COUNT(matchdata.matchResult = 1) / COUNT(matchdata.matchResult = 0) AS 'W/L',
              playerprofile.playerPreferredHero AS 'Waifu',
              AVG(matchdata.doneDamage) AS 'Average Dmg',
              AVG(matchdata.doneHealing) AS 'Average Hls',
              AVG(matchdata.onObjTime) AS 'Average Time on Objective',
              AVG(matchdata.onObjKills) AS 'Average Kills that mattered',
              (AVG(matchdata.doneDamage) / 1000 + AVG(matchdata.doneHealing) / 1000) *
              (COUNT(matchdata.matchResult = 1) - COUNT(matchdata.matchResult = 0)) +
              AVG(matchdata.onObjTime) + AVG(matchdata.onObjKills) AS 'Overall Career Score'
              FROM playerprofile, matchdata
              WHERE playerprofile.playerID = {$_SESSION["PlayerName"]};";

  $QueryOut = mysqli_Query($connection, $sqlQuery);

  if(mysqli_num_rows($QueryOut)  > 0) {
    //echo "Query succeeded!";
    //echo "<br>";
    #get tabulated rows as arrays
    $entry = 0;
    while($activerow = mysqli_fetch_array($QueryOut)){
      #feed data to an array variable
      foreach($activerow as $key => $incomingvalue){
        //echo $incomingvalue;
        $PlayerProfile[$entry][$key] = $incomingvalue;
      }
      $entry++;
      #echo $activerow[1].", ".$activerow[2].", ".$activerow[3].", ".$activerow[4].", ".$activerow[5].", ".$activerow[6].", ".$activerow[7].", ".$activerow[8]; #Manual data print, attempted foreach loop fails
      #echo "<br>";
    }
  }

  #count data for table
  $Rows = mysqli_num_rows($QueryOut);

  //echo $Rows.", ".$Cols;

  #Maybe not needed? since sir will never see this > w<
  mysqli_close($connection);
  ?>

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
        echo $PlayerProfile[$row][$col];
      }
    }
    ?>
  </table>

</body>

</html>
