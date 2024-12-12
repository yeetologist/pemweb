<?php

require 'koneksi.php';

// Check and sanitize the `nim` parameter
if (isset($_GET['nim'])) {
  $nim = htmlspecialchars($_GET['nim']); // Sanitize input

  // Fetch student details
  $stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE nim = :nim");
  $stmt->execute([':nim' => $nim]);
  $student = $stmt->fetch();

  if (!$student) {
    die("Student not found."); // Handle invalid `nim`
  }
} else {
  die("No NIM provided.");
}
?>


<html lang="id">
<?php require './partials/head.php'; ?>

<head>
  <link rel="stylesheet" href="style2.css">
</head>

<body>

  <table border='1' width='100%' cellpadding='10'>
    <?php require './partials/kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <td width='300' style='background:#eaeaea;'>Kolom Kiri</td>
      <td width='700'>
        <table cellpadding='5'>
          <tr valign="top">
            <td>
              <?php

              if (!empty($student['foto'])) {
                echo  "<img src='" . $student['foto'] . "' style='width:150px;height:auto;margin-right:20px;'>";
              };
              ?>
            </td>
            <td>
              <table cellpadding="5">
                <tr>
                  <td>NIM</td>
                  <td>:</td>
                  <td><?php echo $student['nim'] ?? ''; ?></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?php echo $student['nama'] ?? ''; ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo $student['jeniskelamin'] ?? ''; ?></td>
                </tr>
                <tr>
                  <td>Hobi</td>
                  <td>:</td>
                  <td><?php echo $student['hobi'] ?? ''; ?></td>
                </tr>
                <tr>
                  <td>Agama</td>
                  <td>:</td>
                  <td><?php echo $student['agama'] ?? ''; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?php echo $student['alamat'] ?? ''; ?></td>
                </tr>
                <tr>
                  <td colspan="3"><br><a href='database.php'>Kembali</a>
                </tr>
              </table>
            </td>
          <tr>
        </table>

      </td>
      <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        require './partials/kolom_kanan_logout.php'; // Include logout-related content
      } else {
        require './partials/kolom_kanan_login.php'; // Include login-related content
      }
      ?>
    </tr>
  </table>

</body>

</html>