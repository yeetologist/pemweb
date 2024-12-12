<?php

require 'koneksi.php';


if (session_status() == PHP_SESSION_NONE) {
  session_start();
};

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  $nim = $_POST['user'];
  $nama = $_POST['pass'];
  $stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE nim = :nim");
  $stmt->execute([':nim' => $nim]);
  $user = $stmt->fetch();
  if ($user) {
    if ($nama === $user['nama']) { // Change to password_verify($password, $user['password']) if hashing
      // Create session variables
      $_SESSION['loggedin'] = true;
      $_SESSION['id'] = $user['id'];
      $_SESSION['nim'] = $user['nim'];
      $_SESSION['nama'] = $user['nama'];
      $_SESSION['jenis kelamin'] = $user['jenis kelamin'];
      $_SESSION['hobi'] = $user['hobi'];
      $_SESSION['agama'] = $user['agama'];
      $_SESSION['alamat'] = $user['alamat'];
      $_SESSION['foto'] = $user['foto'];

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
