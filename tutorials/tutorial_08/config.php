<?php
$servername = "localhost";
$username = "root";
$password = "soesoethk@1999";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS sampleDb;";
$conn->query($sql);

$sql = "use sampleDb;";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS students (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  student_name VARCHAR(30) NOT NULL,
  age INT(5) NOT NULL,
  email VARCHAR(50),
  phone_number VARCHAR(15),
  major VARCHAR(50)
  );";
$conn->query($sql);
