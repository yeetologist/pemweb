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
      <td width='700'>
        <?php
        require './D1041211056/kondisi.php';
        ?>
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