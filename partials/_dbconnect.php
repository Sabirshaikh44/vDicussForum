<?php
// Script to connect to the database named 'vdiscuss':
$servername = "localhost";
$username = "root";
$password = "";
$database = "vdiscuss";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Could not connect to the database ,due to this error-->" . mysqli_error($conn));
} else {
    echo "Connected to the database sucessfully!";
}
