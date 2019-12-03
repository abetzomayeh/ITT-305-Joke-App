<?php
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$sql = "SELECT * FROM jokes_table";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Joke id: " . $row["Joke_ID"]. " - Joke set-up: " . $row["Joke_Setup"]. " " . $row["Joke_Punchline"]. " submitted by user #" .$row['users_id'] . "<br>";
    }
} else {
    echo "0 results";
}
?>