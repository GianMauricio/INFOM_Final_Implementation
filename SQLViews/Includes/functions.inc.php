<?php

#Check if params is empty
function isEmpty($UserName, $PlayerID, $Password, $PasswordCheck){
  $result;
  if (empty($UserName) || empty($Password) || empty($PasswordCheck) || empty($PlayerID)) {
    $result = false;
  }

  else{
    $result = true;
  }

  return $result;
}

function isValid($UserName){
  $result;
  #I fucking hate regex
  if(!preg_match("/^[a-zA-Z0-9]*$/", $UserName)){
    $result = true;
  }

  else{
    $result = false;
  }

  return $result;
}

function isMatch($Password, $PasswordCheck){
  $result;
  if($Password !== $PasswordCheck){
    $result = true;
  }
  else{
    $result = false;
  }
  return $result;
}

function alreadyExists($connection, $UserName){
  $sqlQuery = "SELECT * FROM accountdata
              WHERE accountname = ?;";
  $sanitizeInput = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($sanitizeInput, $sqlQuery)) {
    header("location: ../SignUpForm.php?error=prepfailed");
    exit();
  }

  mysqli_stmt_bind_param($sanitizeInput, "s", $UserName);
  mysqli_stmt_execute($sanitizeInput);

  $sqlResult = mysqli_stmt_get_result($sanitizeInput);

  if ($row = mysqli_fetch_assoc($sqlResult)) {
    return $row; #Used for log in stuff
  }
  else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($sanitizeInput);
}

function createUser($connection, $UserName, $PlayerID, $Password){
  $sqlQuery = "INSERT INTO accountdata (accountname, playerid, accountrank, password) VALUES (?, ?, ?, ?);";
  $sanitizeInput = mysqli_stmt_init($connection);

  $defaultRank = "user";
  if (!mysqli_stmt_prepare($sanitizeInput, $sqlQuery)) {
    header("location: ../SignUpForm.php?error=prepfailed");
    exit();
  }

  mysqli_stmt_bind_param($sanitizeInput, "ssss", $UserName, $PlayerID, $defaultRank, $Password);
  mysqli_stmt_execute($sanitizeInput);
  mysqli_stmt_close($sanitizeInput);

  header("location: ../SignUpForm.php?error=none");
}

function isEmptyLogIn($UserName, $Password){
  $result;
  if(empty($UserName) || empty($Password)){
    $result = false;
  }

  else{
    $result = true;
  }

  return $result;
}

function loginUser($connection, $UserName, $Password){
  $UserExists = alreadyExists($connection, $UserName);

  if($UserExists === false){
    header("location: ../LoginForm.php?error=nouser");
  }

  #Hard check because of weird garbage data incoming somtimes
  if (!($Password === $UserExists["password"])) {
    header("location: ../LoginForm.php?error=wrongpass");
  }

  else {
    session_start(); #starts web site in a "temp" sense

    $_SESSION["PlayerName"] = $UserExists["playerid"];
    $_SESSION["UserName"] = $UserExists["accountname"];
    $_SESSION["Rank"] = $UserExists["accountrank"];

    header("location: ../index.php");
  }
}

function getRegion($connection, $PlayerID){
  $playerRegion;
  $sqlQuery = "SELECT playerprofile.playerRegion FROM playerprofile
              WHERE playerID = ?;";
  $sanitizeInput = mysqli_stmt_init($connection);

  if (!mysqli_stmt_prepare($sanitizeInput, $sqlQuery)) {
    header("location: ../SignUpForm.php?error=prepfailed");
    exit();
  }

  mysqli_stmt_bind_param($sanitizeInput, "s", $PlayerID);
  mysqli_stmt_execute($sanitizeInput);

  $sqlResult = mysqli_stmt_get_result($sanitizeInput);

  if ($row = mysqli_fetch_assoc($sqlResult)) {
    $playerRegion = $row["playerRegion"]; #Used for log in stuff
  }

  else{
    $playerRegion = "Not Found";
  }

  return $playerRegion;

  mysqli_stmt_close($sanitizeInput);
}
