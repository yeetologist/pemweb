<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
};

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
      // Conditionally prepare the SQL query
      if ($foto !== null) {
        // Include the foto column in the update
        $sql = "UPDATE mahasiswas 
              SET nim = :nim, nama = :nama, jeniskelamin = :jeniskelamin, hobi = :hobi, agama = :agama, alamat = :alamat, foto = :foto, updated_at = NOW() 
              WHERE id = :id";
      } else {
        // Exclude the foto column from the update
        $sql = "UPDATE mahasiswas 
              SET nim = :nim, nama = :nama, jeniskelamin = :jeniskelamin, hobi = :hobi, agama = :agama, alamat = :alamat, updated_at = NOW() 
              WHERE id = :id";
      }

      // Prepare and execute the query
      $stmt = $pdo->prepare($sql);

      // Bind common parameters
      $stmt->bindParam(':nim', $nim);
      $stmt->bindParam(':nama', $nama);
      $stmt->bindParam(':jeniskelamin', $jeniskelamin);
      $stmt->bindParam(':hobi', $hobi);
      $stmt->bindParam(':agama', $agama);
      $stmt->bindParam(':alamat', $alamat);
      $stmt->bindParam(':id', $_SESSION['id']);

      // Bind the foto parameter only if it's included in the query
      if ($foto !== null) {
        $stmt->bindParam(':foto', $foto);
      }

      $stmt->execute();
      $stmt = $pdo->prepare("SELECT * FROM mahasiswas WHERE id = :id");
      $stmt->execute([':id' => $_SESSION['id']]);
      $user = $stmt->fetch();

      updateSession($user);
      header('Location: form.php');
      exit();
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
      header('Location: database.php');
      exit();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
} else if (isset($_GET['id'])) {

  $stmt = $pdo->prepare("SELECT * FROM mahasiswas WHERE id = :id");
  $stmt->execute([':id' => $_GET['id']]);
  $result = $stmt->fetch();

  // Map result fields to variables with default fallback values
  $nim = !empty($result['nim']) ? $result['nim'] : '';
  $nama = !empty($result['nama']) ? $result['nama'] : '';
  $jeniskelamin = !empty($result['jeniskelamin']) ? $result['jeniskelamin'] : '';
  $hobi = isset($result['hobi']) ? $result['hobi'] : '[]'; // Default to empty JSON array

  // Ensure `$_SESSION['hobi']` is valid before decoding
  if (!empty($hobi) && !is_array($hobi)) {
    $hobi = json_decode($hobi, true);
  } elseif (empty($hobi)) {
    $hobi = []; // Default to an empty array if `hobi` is null or empty
  }
  $agama = !empty($result['agama']) ? $result['agama'] : '';
  $alamat = !empty($result['alamat']) ? $result['alamat'] : '';
} else {
  $nim = !empty($_SESSION['nim']) ? $_SESSION['nim'] : '';
  $nama = !empty($_SESSION['nama']) ? $_SESSION['nama'] : '';
  $jeniskelamin = !empty($_SESSION['jeniskelamin']) ? $_SESSION['jeniskelamin'] : '';
  $hobi = isset($_SESSION['hobi']) ? $_SESSION['hobi'] : '[]'; // Default to empty JSON array

  // Ensure `$_SESSION['hobi']` is valid before decoding
  if (!empty($hobi) && !is_array($hobi)) {
    $hobi = json_decode($hobi, true);
  } elseif (empty($hobi)) {
    $hobi = []; // Default to an empty array if `hobi` is null or empty
  }
  $agama = !empty($_SESSION['agama']) ? $_SESSION['agama'] : '';
  $alamat = !empty($_SESSION['alamat']) ? $_SESSION['alamat'] : '';
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
              <td><input type='text' name='nim' value="<?= htmlspecialchars($nim); ?>"></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type='text' name='nama' value="<?= htmlspecialchars($nama); ?>"></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>
                <label>
                  <input type='radio' name='jk' value='pria' <?= ($jeniskelamin === 'pria') ? 'checked' : ''; ?>> Pria
                </label>
                <label>
                  <input type='radio' name='jk' value='wanita' <?= ($jeniskelamin === 'wanita') ? 'checked' : ''; ?>> Wanita
                </label>
              </td>
            </tr>
            <tr>
              <td>Hobi</td>
              <td>:</td>
              <td>
                <label>
                  <input type='checkbox' name='hobi[]' value='Hobi 1' <?= in_array('Hobi 1', $hobi) ? 'checked' : ''; ?>> Hobi 1
                </label>
                <label>
                  <input type='checkbox' name='hobi[]' value='Hobi 2' <?= in_array('Hobi 2', $hobi) ? 'checked' : ''; ?>> Hobi 2
                </label>
                <label>
                  <input type='checkbox' name='hobi[]' value='Hobi 3' <?= in_array('Hobi 3', $hobi) ? 'checked' : ''; ?>> Hobi 3
                </label>
              </td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td>
                <select name='agama'>
                  <option value="Islam" <?= ($agama === 'Islam') ? 'selected' : ''; ?>>Islam</option>
                  <option value="Kristen" <?= ($agama === 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><textarea cols='50' rows='5' name='alamat'><?= htmlspecialchars($alamat); ?></textarea></td>
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