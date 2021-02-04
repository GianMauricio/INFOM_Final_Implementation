<!doctype html>
<html>

<head>
<meta charset = "utf-8">
<title>Select_Test</title>
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

  $sqlHeader = ["Player Career Score", "Name", "Preferred Role", "Win Rate", "Waifu", "Hero Proficiency"];
  $sqlQuery = "SELECT playerprofile.playerCareerScore AS player_RoleRank,
              playerprofile.playerName AS player_name,
              playerprofile.playerPreferredRole AS player_TopRole,
              roles.roleName AS Archetypes,
              roles.roleWinRate AS win_rate,
              heroes.heroName AS Hero,
              heroes.heroProf AS HeroRank
              FROM playerprofile, roles, heroes
              WHERE heroes.roles = 'DPS' && roles.roleName = 'DPS'
              ORDER BY playerprofile.playerCareerScore DESC";

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
  $Cols = 6;
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
