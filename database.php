<?php
require 'koneksi.php';
$stmt = $pdo->prepare("SELECT * FROM mahasiswas");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<html lang="id">
<?php require './partials/head.php'; ?>


<body>

  <table border='1' width='100%' cellpadding='10'>
    <?php require './partials/kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?php require './partials/kolom_kiri.php'; ?>
      <td width='700'>
        <table border='1' cellpadding='10'>
          <tr bgcolor='#ccc'>
            <td>NIM</td>
            <td>Nama</td>
            <td></td>
          </tr>
          <?php
          foreach ($result as $row) {
            echo "<tr>";
            echo "<td>{$row['nim']}</td>";
            echo "<td>{$row['nama']}</td>";
            if (isset($_SESSION['nim']) && $_SESSION['nim'] === $row['nim']) {
              echo "<td><a href='detail.php?nim={$row['nim']}'>Detail</a> | <a href='form.php'>Edit</a></td>";
            } else {
              echo "<td><a href='detail.php?nim={$row['nim']}'>Detail</a></td>";
            }
            echo "</tr>";
          };
          ?>
    </tr>
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