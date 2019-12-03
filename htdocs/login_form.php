<html>

<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
<h1>Login for Jokes</h1>
<a href="logout.php">Click here to log out<a>
<a href="login_form.php">Click here to log in<a>
<a href="register_new_user.php">Click here register<a><br>
<?php

include "db_connect.php";
//include "search_all_jokes.php";
?>

<form class="form-horizontal" action="process_login.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Please log in</legend>

<!-- Search input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>
  <div class="col-md-5">
    <input id="username" name="username" type="text" placeholder="Your name" class="form-control input-md" required="">
    <p class="help-block">Enter your username.</p>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="Your password" class="form-control input-md" required="">
    <p class="help-block">Enter your password.</p>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-default">Login</button>
  </div>
</div>

</fieldset>
</form>






<?php


//include "search_keyword.php";



$mysqli->close();


?>

</body>

</html>