<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "polityka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error connecting to database: ". $conn->connect_error);
}