<?php
$servername = "localhost";         //XD LOLS
$username = "id*********_lib";
$password = "*******";
$dbname = "*********_lib";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
