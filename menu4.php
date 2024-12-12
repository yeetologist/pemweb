<html lang="id">

<?php require 'head.php'; ?>

<body>

  <table border='1' width='100%' cellpadding='10'>
    <?php require 'kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?php require 'kolom_kiri.php'; ?>
      <td width='700'>
        <?= require './kondisi.php'; ?>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
          require 'kolom_kanan_logout.php'; // Include logout-related content
        } else {
          require 'kolom_kanan_login.php'; // Include login-related content
        }
        ?>

    </tr>
  </table>

</body>

</html>