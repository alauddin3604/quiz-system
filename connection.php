<?php
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>