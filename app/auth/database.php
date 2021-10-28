<?php
require 'define.php';
$host = HOST;
$user = USER;
$password = PASSWORD;
$db_name = DB_NAME;
if ($host === "YOUR_DATABASE_HOST" OR $user === "YOUR_DATABASE_USER" OR $password === "YOUR_DATABASE_PASSWORD" OR $db_name === "YOUR_DATABASE_NAME") {
    die("Unable to connect to the database with this constants in app/auth/define.php");
}

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Error : " . $conn->connect_error);
}
