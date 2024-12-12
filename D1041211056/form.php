<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<table width='100%' cellpadding='10'>
	<tr>
		<td class="header" colspan='3' align='center' height='150'>
			<h1 class="judul">Form</h1>
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
		<td width='1000'><br>
		<?php
		if(isset($_POST["simpan"])){
			$nim = $_POST["nim"];
			$nama = $_POST["nama"];
			$jk = $_POST["jk"];
			$hobi = $_POST["hobi"];
			$agama = $_POST["agama"];
			$alamat = $_POST["alamat"];
			echo "Nama Anda: <b>$nim</b> <br>";
			echo "Nama Anda: <b>$nama</b> <br>";
			echo "Jenis Kelamin: <b>$jk</b> <br>";
			echo "Hobi: <b>$hobi</b> <br>";
			echo "Agama: <b>$agama</b> <br>";
			echo "Alamat: <b>$alamat</b> <br>";

		}
		?>

		<form action= "" method= "POST">
			<table cellpadding='5'>
			<tr> 
				<td>NIM</td>
				<td>:</td>
				<td><input type='text' name="nim" ></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td>:</td>
				<td><input type='text' name="nama"></td>
			</tr>
			<tr> 
				<td>Jenis Kelamin</td>
				<td>:</td> 
				<td>Pria<input type='radio' name='jk' value="Pria"> Wanita<input type='radio' name='jk' value="Wanita"></td>
			</tr>
			<tr> 
				<td>Hobi</td>
				<td>:</td>
				<td><input type='checkbox' name="hobi" value="Olahraga">Olahraga<input type='checkbox' name="hobi" value="Bermain Musik">Bermain Musik<input type='checkbox' name="hobi" value="Nonton Anime">Nonton Anime</td>
			</tr>
			<tr> 
				<td>Agama</td>
				<td>:</td>
				<td>
					<select  name="agama">
					<option>Islam</option>
					<option>Kristen</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td>:</td>
				<td><textarea cols='100' rows='5'  name="alamat"></textarea></td>
			</tr>
			<tr>
				<td><input type='submit' value='Simpan'  name="simpan">
			</td>
			</tr>
			
		</table></form>
		
		</form>
		
		</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3" align="center" height="80"  >
		<a class="footer" href='index.php'>Logout</a><br><br>
		</td>
	</tr>
</table>

</body>

</html>