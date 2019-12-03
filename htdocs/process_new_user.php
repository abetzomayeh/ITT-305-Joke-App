<?php
	include "db_connect.php";
	
	$new_username = addslashes($_GET['username']);
	$new_password1 = addslashes($_GET['password1']);
	$new_password2 = addslashes($_GET['password2']);
	
	echo "<h2>Trying to add a new user " . $new_username . " pw = " . $new_password1 . " and " . $new_password2 . "</h2>";
	
	if ($new_password1 != $new_password2){
		echo "The passwords do not match. Please try again.";
		exit;
	}
	preg_match('/[0-9]+/',$new_password1, $matches);
	if (sizeof($matches)==0){
		echo "The password must have at least one number<br>";
		exit;
	}
	preg_match('/[!@#$%^&*()]+/',$new_password1,$matches);
		if (sizeof($matches)==0){
		echo "The password must have at least one special character !@#$%^&*()<br>";
		exit;
	}
	if(strlen($new_password1)<=8){
		echo "The password must be at least 8 characters long<br>";
		exit;
	}
	$sql = "SELECT * FROM users where username = '$new_username'";
	$result = $mysqli->query($sql) or die (mysqli_error($mysqli));
	
	if($result->num_rows > 0) {
		echo "The username " . $new_username . " is already in the database. Can't register twice!";
		exit;
	}

	
	$sql = "INSERT INTO users (id, username, password) VALUES (null, '$new_username', '$new_password1')";
	
	$result = $mysqli->query($sql) or die (mysqli_error($mysqli));
	
	if ($result){
		echo "Registration success";
	}
	else {
		echo "Something went wrong. Not registered";
	}
	
	echo "<a href = 'index.php'>Return to main</a>";
	?>