<html>
      <header>
        <link rel="stylesheet" href="mystyle.css">
          <title>DATA-PerCountry</title>
    </header>
      <body>
      <span id="logout"> <a href="logout.php">Logout</a></span> 
      <h2 id="page-title"><a href="index.html">Country Comparison</a></h2>
      <hr>
      <h3>Data per country</h3> 


<hr>

<ul>
  <div class="dropdown">
    <button class="dropbtn">Ranking</button>
    <div class="dropdown-content">
      <a href="Ranking-GDP.html">GDP</a>
      <a href="Ranking-Population.html">Population</a>
      <a href="Ranking-Size.html">Size</a>
      <a href="Ranking-HDI.html">HDI</a>
    </div>  
  </div>

  <div class="dropdown">
    <button class="dropbtn">Country Data</button>
    <div class="dropdown-content">
     <a href="Data-PerContinent.html">Per continent</a>
     <a href="Data-PerCountry.html">Per country</a>
    </div> 
  </div>

  <div class="dropdown">
    <button class="dropbtn">Compare</button>
    <div class="dropdown-content">
      <a href="Compare-Continent.html">Continent</a>
      <a href="Compare-Country.html">Country</a>
    </div>  
  </div>

  <div class="dropdown">
    <button class="dropbtn">GAME</button>
    <div class="dropdown-content">
    <a href="Quiz.php">Quiz</a>
    </div>  
  </div>

  <div class="dropdown">
    <button class="dropbtn">Data</button>
    <div class="dropdown-content">
      <a href="Data-Definition.php">Definition</a>
      <a href="Data-Maps.php">Maps</a>
      <a href="Data-Sources.php">Sources</a>
    </div>  
  </div>

  <div class="dropdown">
    <button class="dropbtn">LOGIN</button>
    <div class="dropdown-content">
    <a href="Login.php">LOGIN</a>
    </div>  
  </div>
</ul>

  <h3>Instructions</h3>
  
  <form action="user_handler.php" method="POST" >
    <div>
      Enter a username: <input type="text" name="username">
    </div>   
    <div>
      Enter an access number: <input type="text" name="access">
    </div>
    <div>
      Enter a country: <input type="text" name="country">
    </div>
    <div>
      <input type="submit" name="countryButton" value="Submit">
    </div>
   </form>




<?php
////////////////////////////////////////CONNECT AND DISPLAY THE WHOLE TABLE////////////////////////////////////////////////////
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



 echo "<table border='1'>
 <tr>
 <th>User</th>
 <th>Access</th>
 <th>Country</th>
 </tr>";

 $sql = 'SELECT username, access, Country FROM usertest';
 foreach ($pdo->query($sql) as $row) {
   echo "<tr>";
   echo "<td>" . $row['username'] . "</td>";
   echo "<td>" . $row['access'] . "</td>";
   echo "<td>" . $row['Country'] . "</td>";
   echo "</tr>";
 }
 echo "</table>";

//////////////////////////////CONNECT AND SELECT SPECIFIC ROW IN TABLE///////////////////////////////////////
/*

$id = $_POST['country'] ;

 echo $id ;


 $getQuery = "INSERT into usertest (username , access, country) values ( 'testinsert' , :id , 'testinsertcountry' )"; 
   // $getQuery = "SELECT username, access, Country FROM usertest WHERE Country = :id";
    $q = $pdo->prepare($getQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    //$product= reset($q->fetchAll());

 // echo "Details for " . $product["username"] . ": " . $product["access"] . $product["Country"];
*/
 ?>
 
      </body>
</html>


