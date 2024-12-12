<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body">

<table  width='100%' height='100%'>
	<tr height='auto'>
		<td width='40%' style="text-align: center">
		<div class="card">
			<div class="login-text">LOGIN</div>
			<div class="instruksi">Silahkan login terlebih dahulu menggunakan nama dan nim anda</div>	
			<br>
			<?php 
				session_start(); 
				session_destroy();
				if(isset($_POST['kirim'])){
				if(($_POST['user']=='ismul adjham')and($_POST['pass']=='d1041211056')){
					$_SESSION["login"] = $_POST['user'];
					header("Location: main.php");
				}
				else{
					echo"Username & Password Salah
					<div class='form'>
    					<form class='input' action='' method='post'>
        				Username: <input type='text' id='username' name='user' placeholder='Enter your name' required><br><br>
        				Password: <input type='password' id='password' name='pass' placeholder='Enter your NIM' required><br><br><br>
        				<input class='Login' type='submit' name='kirim' value='Login'>
    					</form>
					</div>";
				}
				}
				else{?>
					<div class="form">
    					<form class="input" action="" method="post">
        				Username: <input type="text" id="username" name="user" placeholder="Enter your name" required><br><br>
        				Password: <input type="password" id="password" name="pass" placeholder="Enter your NIM" required><br><br><br>
        				<input class="Login" type="submit" name="kirim" value="Login">
    					</form>
					</div>
			<?php } ?>
			</div>
		</td>
		<td class="login-content" align='center' width="60%">
			<h1>Welcome!!<br><span>Pemrograman<br>Web C</span></h1>
		</td>
	</tr>
</table>

</body>

</html>