<?php
require 'koneksi.php';
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<html lang="id">
<?= require 'head.php'; ?>


<body>

  <table border='1' width='100%' cellpadding='10'>
    <?= require 'kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?= require 'kolom_kiri.php'; ?>
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
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td><a href='detail.php?nim={$row['id']}'>Detail</a></td>";
            echo "</tr>";
          };
          ?>
    </tr>
  </table>
  </td>
  <?= require 'kolom_kanan.php'; ?>

  </tr>
  </table>

</body>

</html>