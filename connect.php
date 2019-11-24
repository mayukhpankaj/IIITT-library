<?php
$servername = "localhost";
$username = "id11243761_lib";
$password = "lib2019";
$dbname = "id11243761_lib";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>