<?php
// Database configuration
$host = 'localhost';
$port = '3306';
$dbname = 'latihan';
$username = 'root';
$password = 'Mfr465-wz34';

$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8";

try {
  // Create a PDO instance
  $pdo = new PDO($dsn, $username, $password);

  // Set PDO attributes
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close the connection
// $pdo = null;
