<?php
session_start();

if (isset($_POST["countryButton"])) {
  $username = $_POST['username'] ;
  $access = $_POST['access'] ;
  $country = $_POST['country'] ;

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
   $getQuery = "INSERT into usertest (username , access, country) values ( :username , :access , :country )"; 
   $q = $pdo->prepare($getQuery);
    $q->bindParam(":username", $username);
    $q->bindParam(":access", $access);
   $q->bindParam(":country", $country);
    $q->execute();
  } catch (Exception $e) {
    var_dump($e);
    die;
  }
 }
header("Location:Datacountrytest.php");
?>

