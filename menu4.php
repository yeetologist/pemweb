<html lang="id">

<?php require './partials/head.php'; ?>

<body>

  <table border='1' width='100%' cellpadding='10'>
    <?php require './partials/kolom_atas.php'; ?>

    <tr height='400' valign='top'>
      <?php require './partials/kolom_kiri.php'; ?>
      <td width='700'>
        <?= require './kondisi.php'; ?>
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