<?php
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "mypos";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "set names utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set("Asia/Bangkok");

