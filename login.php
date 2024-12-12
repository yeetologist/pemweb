<?php

require 'koneksi.php';


if (session_status() == PHP_SESSION_NONE) {
  session_start();
};

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  $nim = $_POST['user'];
  $nama = $_POST['pass'];
  $stmt = $pdo->prepare("SELECT * FROM mahasiswas WHERE nim = :nim");
  $stmt->execute([':nim' => $nim]);
  $user = $stmt->fetch();
  if ($user) {
    if ($nama === $user['nama']) {
      // Create session variables

      updateSession($user);

      // Redirect to a secure page (e.g., dashboard)
      header('Location: index.php');
      exit();
    } else {
      echo "Invalid credentials.";
    }
  } else {
    echo "User not found.";
  }
}
