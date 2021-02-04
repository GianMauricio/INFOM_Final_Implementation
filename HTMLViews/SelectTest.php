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
    echo "Database found! <br>";
  }
  else{
    #Yes, exit in PhP is legit called die
    die("Connection failed; Reason: ".mysqli_connect_error());
  }

  $sqlQuery = "SELECT * FROM heroes";

  $QueryOut = mysqli_Query($connection, $sqlQuery);

  if(mysqli_num_rows($QueryOut)  > 0) {
    echo "Query succeeded!";
    echo "<br>";

    while($activerow = mysqli_fetch_array($QueryOut)){
      echo $activerow[1]." ".$activerow[2]." ".$activerow[3]." ".$activerow[4]." ".$activerow[5];
      echo "<br>";
    }
  }

  #Maybe not needed? since sir will never see this > w<
  mysqli_close($connection);
  ?>

</body>

</html>
