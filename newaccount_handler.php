<?php
session_start();
$_SESSION['bad2']= array();
$_SESSION['good']= array();

//validating

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  // invalid emailaddress
  $_SESSION['bad2'][] ="Please enter a valid email address";
}


if (strlen($_POST['email'])==0) {
  $_SESSION['bad2'][] ="Please enter an email address";
}

if (strlen($_POST['email']) > 256) {
  $_SESSION['bad2'][] ="The email address is too long";
}


if (strlen($_POST['accessword'])==0) {
  $_SESSION['bad2'][] ="Please enter a password";
}

if (strlen($_POST['accessword']) > 64) {
  $_SESSION['bad2'][] ="The password is too long";
}


if(count($_SESSION['bad2'])==0){
  $_SESSION['good'][] ="Thanks for your registration"; 
  header("Location:Newaccount.php");
  }

if(count($_SESSION['bad2'])>0){
header("Location:Newaccount.php");
exit();
}

if (isset($_POST["registerButton"])) {
  $email = $_POST['email'] ;
 // $accessword = $_POST['accessword'] ;  //access with no hashing 
  $accesswordinit = $_POST['accessword'] ;
  $salt = "heydbsjdhf1542879634djdhz5875" ;
  $passalt =  $accesswordinit . $salt ;
  $accessword = hash("sha256", $passalt);

  
  try {
////////get connection///////////////////
$host = "vrk7xcrab1wsx4r1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "rnlfhhgt2zbdy084";
$password = "jxchfs2ja9rpfkq6";
$dbname = "ccy2fv3soaxb3eql";
$port = "3306";

try{
   //Set DSN data source name
    $dsn = "mysql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";";
 
   //create a pdo instance
   $pdo = new PDO($dsn, $user, $password);
 }
 catch (PDOException $e) {
 echo 'Connection failed: ' . $e->getMessage();
 }
//////////////insert data in db///////////////////////
   $getQuery = "INSERT into userdb (email , accessword, access ) values ( :email , :accessword, 1)"; 
   $q = $pdo->prepare($getQuery);
    $q->bindParam(":email", $email);
    $q->bindParam(":accessword", $accessword);
    $q->execute();
  } catch (Exception $e) {
    var_dump($e);
    die;
  }
 }
header("Location:Newaccount.php");
?>