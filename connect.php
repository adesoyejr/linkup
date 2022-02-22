<?php
date_default_timezone_set('Africa/Lagos');

$conn = new mysqli('localhost', 'root', '', 'linkup');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }         
?>