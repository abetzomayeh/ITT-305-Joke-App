<?php
session_start();
if (! $_SESSION['username']){
	echo "Only logged in users may access this page. Click <a href='login_form.php'>here</a> to login.<br>";
	exit;
}

include "db_connect.php";
$new_joke_question = addslashes($_GET['newjoke']);
$new_joke_answer = addslashes($_GET['newanswer']);
$user_id = $_SESSION['userid'];


echo "<h2>Trying to add a new joke: $new_joke_question and $new_joke_answer</h2>";

$stmt = $mysqli->prepare("INSERT INTO jokes_table (Joke_ID,Joke_Setup,Joke_Punchline,users_id) VALUES (NULL, ?,?,?)");
$stmt->bind_param("ssi",$new_joke_question,$new_joke_answer,$user_id);
$stmt->execute();
$stmt->close();

include "search_all_jokes.php";

?>

<a href="index.php">Return to main page</a>