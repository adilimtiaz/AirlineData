<?php
    error_reporting(-1);
    ini_set('display_errors',1);
    if (!isset($_COOKIE['username'], $_COOKIE['password'])) {
    	setcookie('username', htmlentities($_POST['username']));
   	setcookie('password', htmlentities($_POST['password']));
    }
?>
<html>

  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<head>
<style>
body, html {
    height: 100%;
    margin: 0;
}

.bg {
    background-image: url("plane.jpg");
    height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;
}

h1 { 
    color: #ffffff; font-family: 'Georgia'
}

h3 {
    color: #ffffff; font-family: 'Georgia'
}
.navbar {
    margin-bottom: 0;
}

</style>
</head>
<body>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top= "100">
<div class="container-fluid">
  <ul class="nav navbar-nav">

    <li class ="active"><a href="#">Home</a></li>
    
    <li><a href="cust.php">Customers</a></li>
    <li><a href="crew.php">Flight Crew</a></li>
    <li><a href="admin.php">Admin</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right">
      
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
    </ul>
</nav>

<div class="bg">
<div class="container">
<center><br><br><br><br><br>
  <h1>Welcome to our flight booking system</h1>
  <br><i><h3>Providing services for customers, flight crew, and administrators</h3></i>
</center>
<center>
<br>

<div class= "row">
<div class="col-sm-4">
<br><br><br>
    <form>
       
       <center> <button type="submit" formaction="cust.php" class="btn btn-primary btn-lg">Customer</button></center>
    </form>
    </div>
    <div class="col-sm-4">
    <form>
    <br><br><br>
       <center> <button type="submit" formaction="crew.php" class= "btn btn-primary btn-lg">Flight Crew</button></center>
    </form>
    </div>

    <div class="col-sm-4">
    <form>
    <br><br><br>
       <center> <button type="submit" formaction="admin.php" class="btn btn-primary btn-lg">Administrator</button> </center>
       <br><br><br>
    </form>
    </div>
    </div>
    </center>
    </div>
    </div>
</div>

</body>
</html>