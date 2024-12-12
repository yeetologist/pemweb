<html lang="id">

<?= require 'head.php'; ?>

<body>

  <table border='1' width='100%' cellpadding='10'>
    <?= require 'kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?= require 'kolom_kiri.php'; ?>
      <td width='600'>
        <form action="" method="POST" enctype="multipart/form-data">
          <table cellpadding='10'>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type='text' name='nim'></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type='text' name='nama'></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td>
                Pria<input type='radio' name='jk' value='pria'>
                Wanita<input type='radio' name='jk' value='wanita'></td>
            </tr>
            <tr>
              <td>Hobi</td>
              <td>:</td>
              <td>
                <input type='checkbox' name='hobi[]' value='Hobi 1'>Hobi 1
                <input type='checkbox' name='hobi[]' value='Hobi 2'>Hobi 2
                <input type='checkbox' name='hobi[]' value='Hobi 3'>Hobi 3
              </td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td>
                <select name='agama'>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><textarea cols='50' rows='5' name='alamat'></textarea></td>
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
        <?= require 'kolom_kanan.php'; ?>
    </tr>
  </table>

</body>

</html>