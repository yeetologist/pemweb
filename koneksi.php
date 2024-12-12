<?php
// Database configuration
$host = 'localhost';
$port = '3306';
$dbname = 'pemweb';
$username = 'root';
$password = '';

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

function updateSession($user)
{
  $_SESSION['loggedin'] = true;
  $_SESSION['id'] = $user['id'] ?? null;
  $_SESSION['nim'] = $user['nim'] ?? null;
  $_SESSION['nama'] = $user['nama'] ?? null;
  $_SESSION['jeniskelamin'] = $user['jeniskelamin'] ?? null;
  $_SESSION['hobi'] = $user['hobi'] ?? '[]'; // Default to empty JSON string
  $_SESSION['agama'] = $user['agama'] ?? null;
  $_SESSION['alamat'] = $user['alamat'] ?? null;
  $_SESSION['foto'] = $user['foto'] ?? null;
}
