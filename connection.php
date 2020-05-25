<?php

require_once 'dbConfig.php';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// $conn->close();

     