<?php

$nameErr = $emailErr = "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name = $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $email = $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
    $myfile =  fopen("emailList.txt", "a") or die("unable to open file!");
   
    fwrite($myfile, "$name : $email\n");
    fclose($myfile);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



header("Location: http://www.thestackerapp.com");
exit();

?>