<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>jQuery UI Accordian - Default functionality</title>
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

include "db_connect.php";
$keywordfromform = addslashes($_GET["keyword"]);
$keywordfromform = "%" . $keywordfromform . "%";
echo "<h1>Show all jokes containing the word $keywordfromform </h1>";

$stmt = $mysqli->prepare("SELECT joke_id,joke_setup,joke_punchline,users_id,username FROM jokes_table join users on users.id = jokes_table.users_id WHERE joke_setup LIKE ?");
$stmt->bind_param("s",$keywordfromform);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Joke_id,$joke_setup,$joke_punchline,$users_id,$username);

if ($stmt->num_rows > 0) {
    // output data of each row
	echo "<div id='accordion'>";
    while($row = $stmt->fetch()) {
        $safe_joke_question = htmlspecialchars($joke_setup);
        $safe_joke_answer = htmlspecialchars($joke_punchline);
		echo "<h3>" . $safe_joke_question . "</h3>";
		echo "<div><p>" . $safe_joke_answer . " -- Submitted by user " . $username . "</p></div>";
		
    }
	echo "</div>";
} else {
    echo "0 results";
}
?>