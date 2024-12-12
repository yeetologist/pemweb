<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<table width='100%' cellpadding='10'>
	<tr>
		<td class="header" colspan='3' align='center' height='150'>
			<h1 class="judul">Main</h1>
		</td>
	<tr>
	<tr>
		<td colspan='3' align='center' height='100' style='background:#fff;'>
			<a href='main.php'>Main</a>
			<a href='form.php'>Form</a>
			<a href='datadiri.php'>Data</a>
			<a href='nilai.php'>Nilai</a>
		</td>
	</tr>
	<tr class="main-content" height='400' valign='top'>
		<td></td>
		<td width='1000'>
			Bagian Konten<br>
			<?php 
				echo "<h3>Pemrograman Web merupakan mata kuliah prodi Informatika Universitas Tanjungpura
				semester 5, dimana mata kuliah ini diampu oleh dosen Enda Esyudha Pratama, S.T., M.T. dan Fauzan Asrin, S.Kom, M. Kom.	</h3>";
				echo "<h3>Bagian ini</h3> <b>ditampilkan oleh kode PHP</b><br><br>";
				$variabel1 = "36";
				$variabel2 = 1;
				$variabel3 = 2;
				$x = $variabel1 + $variabel2;
				$y = $variabel2 + $variabel3;
				echo "$x, $y";
			?>
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3" align="center" height="90px"  >
		<a class="footer" href='index.php'>Logout</a><br><br>
		</td>
	</tr>
</table>

</body>

</html>