<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "election";

$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>