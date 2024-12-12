<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<table width='100%' cellpadding='10'>
	<tr>
		<td class="header" colspan='3' align='center' height='150'>
			<h1 class="judul">Data Diri</h1>
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
			<?php 
				$variabel = "Ismul Adjham";
				$variabel2 = 21;
				$variabel3 = 'D1041211056';
				$variabel4 = 'Informatika';
				$variabel5 = 'UNTAN';
				echo"Halo, <b> <br> $variabel $variabel2 <br> $variabel3</b> <br> <b>$variabel4 $variabel5</b>";
			?><br>
		<img src="fotoku.jpeg" alt="" width="20%">
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3" align="center" height="90"  >
		<a class="footer" href='index.php'>Logout</a><br><br>
		</td>
	</tr>
</table>

</body>

</html>