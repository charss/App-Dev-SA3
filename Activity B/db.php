<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_dev_s3";

// Create database
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE app_dev_s3";
if ($conn->query($sql) === TRUE) {
  echo "Database created succesfully<br>";
} else {
  die("Error creating database: " . $conn->_error);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// sql to create table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(50) NOT NULL,
middlename VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
username VARCHAR(50) NOT NULL,
pass VARCHAR(50) NOT NULL,
birthday date NOT NULL,
email VARCHAR(50) NOT NULL,
contactnum VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>