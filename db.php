<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "form_db"; // CHANGE THIS

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
