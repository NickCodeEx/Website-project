<html>
      <header>
        <link rel="stylesheet" href="mystyle.css">
          <title>Ranking-Population</title>
    </header>
      <body>
      <span id="logout"> <a href="logout.php">Logout</a></span>
      <h2 id="page-title"><a href="index.html">Country Comparison</a></h2>
      <hr>
      <h3>Ranking per Population</h3> 


<hr>

<ul>
  <div class="dropdown">
    <button class="dropbtn">Ranking</button>
    <div class="dropdown-content">
      <a href="Ranking-GDP.php">GDP</a>
      <a href="Ranking-Population.php"  class="active-page">Population</a>
      <a href="Ranking-Size.php">Size</a>
      <a href="Ranking-HDI.php">HDI</a>
    </div>  
  </div>

  <div class="dropdown">
    <button class="dropbtn">Country Data</button>
    <div class="dropdown-content">
     <a href="Data-PerContinent.php">Per continent</a>
     <a href="Data-PerCountry.php">Per country</a>
    </div> 
  </div>

  <div class="dropdown">
    <button class="dropbtn">Compare</button>
    <div class="dropdown-content">
      <a href="Compare-Continent.php">Continent</a>
      <a href="Compare-Country.php">Country</a>
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
    <button class="dropbtn">SIGN IN</button>
    <div class="dropdown-content">
    <a href="Login.php">LOGIN</a>
    <a href="Newaccount.php">New Account</a>
    </div>  
  </div> 
  </div>

</ul>

  <h3>Instructions</h3>
  <p>Select a country in list</p>


<form method="GET" >
<div>
<label for="country"> Enter a country:</label> <input type="text" id="country" name="country">
</div>
<div>
  <input type="submit" name="countryButton" value="Submit">
</div>
</form>

  <?php
////////////////////////////////////////CONNECT AND DISPLAY THE WHOLE TABLE/////////////////////////////////
$host = "vrk7xcrab1wsx4r1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "rnlfhhgt2zbdy084";
$password = "jxchfs2ja9rpfkq6";
$dbname = "ccy2fv3soaxb3eql";
$port = "3306";

try{
   //Set DSN data source name
    // $dsn = "mysql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";
    $dsn = "mysql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";";
 
   //create a pdo instance
   $pdo = new PDO($dsn, $user, $password);

 }

 catch (PDOException $e) {
 echo 'Connection failed: ' . $e->getMessage();
 }

////////////Select data in table
//////////////////////////////CONNECT AND SELECT SPECIFIC ROW IN TABLE///////////////////////////////////////


$id = $_GET['country'] ;

if (isset($id)) { 
   $getQuery = "SELECT Country, Population, Ranking FROM CountryPopulation  WHERE Country = :id";
    $q = $pdo->prepare($getQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    $product= reset($q->fetchAll());

    echo "<table border='1'>
<tr>
<th>Country</th>
<th>Population</th>
<th>Rank</th>
</tr>";

   echo "<tr>";
   echo "<td>" . htmlspecialchars($product["Country"]) . "</td>";
   echo "<td>" . htmlspecialchars($product["Population"]). "</td>";
   echo "<td>" . htmlspecialchars($product["Ranking"]) . "</td>";
   echo "</tr>";
   echo "</table>";
}

/////////////display the whole table//////////
else{
 echo "<table border='1'>
<tr>
<th>Country</th>
<th>Population</th>
<th>Rank</th>
</tr>";



 $sql = 'SELECT Country, Population, Ranking FROM CountryPopulation order by Ranking ';
 foreach ($pdo->query($sql) as $row) {
   echo "<tr>";
   echo "<td>" . htmlspecialchars($row['Country']) . "</td>";
   echo "<td>" . htmlspecialchars($row['Population']) . "</td>";
   echo "<td>" . htmlspecialchars($row['Ranking']) . "</td>";
   echo "</tr>";
 }
 echo "</table>";
}
 
 ?>
      </body>
</html>


