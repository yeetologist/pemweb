<html lang="id">

<?= require 'head.php'; ?>


<body>

  <table border='1' width='100%' cellpadding='10'>
    <?= require 'kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?= require 'kolom_kiri.php'; ?>
      <td width='600'>
        <h1 style="color: red;font-family: tahoma;">Ini bagian judul</h1>
        <h2 style="color: blue">Judul 2</h2>
        <h3>Judul 3</h3>
        <b>bfns vj</b> df dfnckldsncjndsj<br>nvhfdbvhf dhv fh
        <p style="font-family: arial;">ini paragraf. <i>paragraf peratama</i></p>
        <p style="font-family: tahoma;text-transform: uppercase;">jfbksdkbsdknckdjsnj<br>ksdnkjsdcsdnjv dfjk <u>dnsljfns</u></p>
        <img src="gambar.png" style="height: auto;width:500px;"><br><br>
        <a href="https://google.com" target="_blank">Klik link disni</a>
      </td>
      <?= require 'kolom_kanan.php'; ?>
    </tr>
  </table>

</body>

</html>