<?php

session_start();

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
  // Capture and sanitize form data
  $nim = htmlspecialchars($_POST['nim']);
  $nama = htmlspecialchars($_POST['nama']);
  $jeniskelamin = isset($_POST['jk']) ? htmlspecialchars($_POST['jk']) : null;
  $hobi = isset($_POST['hobi']) ? json_encode($_POST['hobi']) : null; // Encode as JSON
  $agama = htmlspecialchars($_POST['agama']);
  $alamat = htmlspecialchars($_POST['alamat']);

  // Handle file upload
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto = 'uploads/' . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto); // Save the uploaded file
  } else {
    $foto = null; // No file uploaded
  }
  // Check if the user is already logged in and update the data if so
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    try {
      // Update existing record
      $stmt = $pdo->prepare("UPDATE mahasiswas 
                           SET nim = :nim, nama = :nama, jeniskelamin = :jeniskelamin, hobi = :hobi, agama = :agama, alamat = :alamat, foto = :foto, updated_at = NOW() 
                           WHERE id = :id");
      $stmt->execute([
        ':nim' => $nim,
        ':nama' => $nama,
        ':jeniskelamin' => $jeniskelamin,
        ':hobi' => $hobi,
        ':agama' => $agama,
        ':alamat' => $alamat,
        ':foto' => $foto,
        ':id' => $_SESSION['id']
      ]);
      echo "Data successfully updated!";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  } else if (isset($_SESSION['nim']) && $_SESSION['nim'] === 'admin') {
    try {
      // Insert new record
      $stmt = $pdo->prepare("INSERT INTO mahasiswas (nim, nama, jeniskelamin, hobi, agama, alamat, foto, created_at, updated_at) 
                         VALUES (:nim, :nama, :jeniskelamin, :hobi, :agama, :alamat, :foto, NOW(), NOW())");
      $stmt->execute([
        ':nim' => $nim,
        ':nama' => $nama,
        ':jeniskelamin' => $jeniskelamin,
        ':hobi' => $hobi,
        ':agama' => $agama,
        ':alamat' => $alamat,
        ':foto' => $foto
      ]);
      echo "Data successfully saved!";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
} else {
  $_SESSION['nim'] = !empty($_SESSION['nim']) ? $_SESSION['nim'] : '';
  $_SESSION['nama'] = !empty($_SESSION['nama']) ? $_SESSION['nama'] : '';
  $_SESSION['jeniskelamin'] = !empty($_SESSION['jeniskelamin']) ? $_SESSION['jeniskelamin'] : '';
  $_SESSION['hobi'] = isset($_SESSION['hobi']) ? $_SESSION['hobi'] : '[]'; // Default to empty JSON array
  if (!is_array($_SESSION['hobi'])) {
    $_SESSION['hobi'] = json_decode($_SESSION['hobi'], true); // Decode JSON string into an array
  }
  $_SESSION['agama'] = !empty($_SESSION['agama']) ? $_SESSION['agama'] : '';
  $_SESSION['alamat'] = !empty($_SESSION['alamat']) ? $_SESSION['alamat'] : '';
}
?>

<html lang="id">

<?php require './partials/head.php'; ?>

<body>

  <table border='1' width='100%' cellpadding='10'>
    <?php require './partials/kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?php require './partials/kolom_kiri.php'; ?>
      <td width='600'>
        <form method="POST" enctype="multipart/form-data">
          <table cellpadding='10'>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type='text' name='nim' value="<?= htmlspecialchars($_SESSION['nim']); ?>"></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type='text' name='nama' value="<?= htmlspecialchars($_SESSION['nama']); ?>"></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>
                <label>
                  <input type='radio' name='jk' value='pria' <?= ($_SESSION['jeniskelamin'] === 'pria') ? 'checked' : ''; ?>> Pria
                </label>
                <label>
                  <input type='radio' name='jk' value='wanita' <?= ($_SESSION['jeniskelamin'] === 'wanita') ? 'checked' : ''; ?>> Wanita
                </label>
              </td>
            </tr>
            <tr>
              <td>Hobi</td>
              <td>:</td>
              <td>
                <label>
                  <input type='checkbox' name='hobi[]' value='Hobi 1' <?= in_array('Hobi 1', $_SESSION['hobi']) ? 'checked' : ''; ?>> Hobi 1
                </label>
                <label>
                  <input type='checkbox' name='hobi[]' value='Hobi 2' <?= in_array('Hobi 2', $_SESSION['hobi']) ? 'checked' : ''; ?>> Hobi 2
                </label>
                <label>
                  <input type='checkbox' name='hobi[]' value='Hobi 3' <?= in_array('Hobi 3', $_SESSION['hobi']) ? 'checked' : ''; ?>> Hobi 3
                </label>
              </td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td>
                <select name='agama'>
                  <option value="Islam" <?= ($_SESSION['agama'] === 'Islam') ? 'selected' : ''; ?>>Islam</option>
                  <option value="Kristen" <?= ($_SESSION['agama'] === 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><textarea cols='50' rows='5' name='alamat'><?= htmlspecialchars($_SESSION['alamat']); ?></textarea></td>
            </tr>
            <tr>
              <td>Foto</td>
              <td>:</td>
              <td><input type="file" name="foto"><br></td>
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