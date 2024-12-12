<?php
require 'koneksi.php';


if (session_status() == PHP_SESSION_NONE) {
  session_start();
};


// Check and sanitize the `nim` parameter
if (isset($_GET['id'])) {
  $id = htmlspecialchars($_GET['id']); // Sanitize input

  try {
    // Prepare the DELETE query
    $stmt = $pdo->prepare("DELETE FROM mahasiswas WHERE id = :id");

    // Bind the ID parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "Record deleted successfully!";
    } else {
      echo "No record found with the specified ID.";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  header('Location: database.php');
  exit();
} else {
  die("No id provided.");
}
