<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PEMWEB</title>
  <link rel="stylesheet" href="style2.css">
</head>

<body>

  <table border='1' width='100%' cellpadding='10'>
    <tr>
      <td colspan='3' align='center' height='150' style='background:#000;'>
        <h1>Ini Bagian Header/Judul</h1>
      </td>
    <tr>
    <tr>
      <td colspan='3' align='center' height='100' style='background:#8f4c00;'>
        <div id='menu'>
          <a href='index.php'>Menu 1</a>
          <a href='form.php'>Menu 2</a>
          <a href='menu4.php'>Menu 3</a>
          <a href='database.php'>Menu 4</a>
          <a href='menu5.php'>Menu 5</a>
        </div>
      </td>
    </tr>
    <tr height='400' valign='top'>
      <td width='300' style='background:#eaeaea;'>Kolom Kiri</td>
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
      </td>
      <td width='300' style='background:#eaeaea;'>Kolom Kanan<br><br>
        <form method='POST' action=''>
          <input type='text' name='user' placeholder='Username'><br><br>
          <input type='password' name='pass' placeholder='Password'><br><br>
          <input type='submit' name='login' value='Login' id='submit'>
        </form>
      </td>
    </tr>
  </table>

</body>

</html>