<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
  
  <style>
  *{
		font-family:Arial,Helvetica,sans-serrif;
  }
  </style>
  
</head>


<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

include "db_connect.php";
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);

echo "You attempted to login with " . $username . " and " . $password . ". <br>";

$stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ? and password = ?");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($userid,$uname,$pw);


if ($stmt->num_rows != 0) {
    $row = $stmt->fetch();
	echo "Login successful!<br>";
	$_SESSION['username'] = $uname;
	$_SESSION['userid'] = $userid;
} else {
    echo "0 results. Nobody with that username and password.";
	$_SESSION = [];
	session_destroy();
}
echo "<br>SESSION = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo "<br><a = href='index.php'>Return to main page</a><br>";
?>