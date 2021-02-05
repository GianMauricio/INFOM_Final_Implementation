<?php
  $DBServer = "localhost:3306";
  $DBUser = "root";
  $DBPwd = "!ntenseAvar1ce";
  $DBName = "overbuff2final";

  $connection = mysqli_connect($DBServer, $DBUser, $DBPwd, $DBName);

  if(!$connection){
    echo "Dah! My DB! <br>";
    die("Connection failed; Reason: ".mysqli_connect_error());
  }
