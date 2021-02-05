<?php

if (isset($_POST["Submit"])) {

  $UserName = $_POST["UserName"];
  $Password = $_POST["Pwd"];

  require_once 'AccountHandler.php';
  require_once 'functions.inc.php';

  #Check if any input boxes were left empty
  if(isEmptyLogIn($UserName, $Password) === false){
    header("location: ../LoginForm.php?error=emptyinput");

    #Not the same as die
    exit();

  }

  loginUser($connection, $UserName, $Password);
}

else{
  header("location: ../LoginForm.php");
  exit();
}
