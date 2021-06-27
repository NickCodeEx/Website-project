<?php
session_start();
?>


<html>
      <header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="jslogin.js"></script>
        <link rel="stylesheet" href="mystyle.css">
          <title>LOGIN</title>
    </header>
      <body>
      <span id="logout"> <a href="logout.php">Logout</a></span>
      <h2 id="page-title"><a href="index.html">Country Comparison</a></h2>
      <hr>
      <h3>LOGIN</h3> 
<hr>

<ul>
<div class="dropdown">
    <button class="dropbtn">Ranking</button>
    <div class="dropdown-content">
      <a href="Ranking-GDP.php">GDP</a>
      <a href="Ranking-Population.php">Population</a>
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
    <a href="Login.php"  class="active-page">LOGIN</a>
    <a href="Newaccount.php">New Account</a>
    </div>  
  </div>
</ul>

  <h3>Enter your credentials to access to your account</h3>
  
  <form action="login_handler.php" method="POST" >
    <div>
    <label for="email"> Enter your email address:</label> <input type="text" id="email" name="email">
    </div>   
    <div>
    <label for="password"> Enter your password:</label> <input type="password" id="password" name="accessword">
    </div>
    <div>
      <input class='button' type="submit" name="registerButton" value="login">
    </div>
   </form>

   <?php
if(isset($_SESSION['bad'])) {
  foreach ($_SESSION['bad'] as $error){
   echo "<div class='bad' > {$error}<span class='close_error'>X</span></div>";
  }
}

?>

   </body>
</html>