<?php

if(isset($_POST["Submit"])){
  echo "Submit was Accessed correctly";

  $UserName = $_POST["UserName"];
  $Password = $_POST["Pwd"];
  $PasswordCheck = $_POST["Conf Pwd"];

  require_once 'AccountHandler.php';
  require_once 'functions.inc.php';

  #Check if any input boxes were left empty
  if(isEmpty($UserName, $Password, $PasswordCheck) !== false){
    header("location: ../SignUpForm.php?error=emptyinput");

    #Not the same as die
    exit();
  }

  #Check if the username contains special characters
  if(isValid($UserName) !== false){
    header("location: ../SignUpForm.php?error=UwU");

    #Not the same as die
    exit();
  }

  #Check if the password matches the repeat password
  if(isMatch($Password, $PasswordCheck)){
    header("location: ../SignUpForm.php?error=passconf");

    #Not the same as die
    exit();
  }

  #Check if the user name is already taken
  if(alreadyExists($connection, $UserName)){
    header("location: ../SignUpForm.php?error=nameexists");

    #Not the same as die
    exit();
  }
}
else{
  header("location: ../SignUpForm.php");
}
?>
