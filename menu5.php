<?php
require 'koneksi.php';
$stmt1 = $pdo->prepare("SELECT * FROM mahasiswas WHERE created_at <= :timestamp1");
$stmt1->execute([':timestamp1' => '2024-12-12 12:26:45']);
$result1 = $stmt1->fetchAll();

$stmt2 = $pdo->prepare("SELECT * FROM mahasiswas WHERE created_at >= :timestamp2");
$stmt2->execute([':timestamp2' => '2024-12-12 12:28:08']);
$result2 = $stmt2->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
  $nim = htmlspecialchars($_POST['nim']);
  $nama = htmlspecialchars($_POST['nama']);
  print_r($nim);
  print_r($nama);
  $stmtIntput = $pdo->prepare("INSERT INTO mahasiswas (nim, nama, created_at, updated_at) VALUES (:nim, :nama, NOW(), NOW())");
  $stmtIntput->execute([':nim' => $nim, ':nama' => $nama]);
  header('Location: menu5.php');
}

?>
<html lang="id">
<?= require 'head.php'; ?>

<body>
  <table border='1' width='100%' cellpadding='10'>
    <?= require 'kolom_atas.php'; ?>
    <tr height='400' valign='top'>
      <?= require 'kolom_kiri.php'; ?>
      <td width='700'>
        <form action='' method="POST">
          <table cellpadding='3'>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td>
                <input type='text' name='nim'>
              </td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td>
                <input type='text' name='nama'>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <input type='submit' value='Simpan' name='simpan'>
              </td>
            </tr>
          </table>
        </form>
        <hr>
        <table width="100%" border="0">
          <tr valign="top">
            <td width='50%'>
              <b>Senin, 25 Nov 2024 (09.00-11.30)</b>
              <br>
              <br>
              <table border='1' cellpadding='10' style='border-collapse:collapse;'>
                <tr bgcolor='#ccc' width='100%'>
                  <td>No</td>
                  <td>NIM</td>
                  <td>Nama</td>
                </tr>
                <?php
                $index = 1;
                foreach ($result1 as $row) {
                  echo "<tr>";
                  echo "<td>$index</td>";
                  echo "<td>{$row['nim']}</td>";
                  echo "<td>{$row['nama']}</td>";
                  echo "</tr>";
                  $index++;
                };
                ?>
              </table>
            </td>
            <td>
              <b>Senin, 25 Nov 2024 (12.30-15.00)</b>
              <br>
              <br>
              <table border='1' cellpadding='10' style='border-collapse:collapse;'>
                <tr bgcolor='#ccc'>
                  <td>No</td>
                  <td>NIM</td>
                  <td>Nama</td>
                </tr>
                <?php
                $index = 1;
                foreach ($result2 as $row) {
                  echo "<tr>";
                  echo "<td>$index</td>";
                  echo "<td>{$row['nim']}</td>";
                  echo "<td>{$row['nama']}</td>";
                  echo "</tr>";
                  $index++;
                };
                ?>
              </table>
            </td>
          </tr>
        </table>
      </td>
      <?= require 'kolom_kanan.php'; ?>
    </tr>
  </table>
</body>

</html>