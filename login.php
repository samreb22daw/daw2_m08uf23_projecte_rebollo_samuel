<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="estils/styles.css" />

		<!-- Link CSS de Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>
	<body>

		<!-- Menú de navegació -->
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
			<div class="container-fluid">
				<ul class="navbar-nav">
					<li id="prova" class="nav-item">
						<a class="nav-link active">Sarero's App</a>
					</li>
					<li id="prova" class="nav-item">
						<a class="nav-link" href="index.php">Torna a inici</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Contingut de la pàgina -->
		<div class="container">
			<br><br>
			<h3 class="text-primary" style="text-align: center;"><b>Autenticació d'usuari</b></h3>
			<p style="text-align: center;">Autentica't amb el nom d'usuari i la contrasenya de l'usuari administrador de LDAP.</p><br>
			<div class="abs-center">
				<form action="auth.php" method="POST" class="form-estils">
					<h3 class="text-primary" style="text-align: center;"><b>LOGIN</b></h3><br>
					<div class="form-group">
						<label for="exampleInputEmail1">Usuari amb permisos d'administració LDAP:</label>
						<input type="text" name="adm" class="form-control" id="exampleInputEmail1" placeholder="Usuari" required>
						<small id="emailHelp" class="form-text text-muted">Mai comparteixis el teu nom d'usuari amb ningú.</small>
					</div>
					<br>
					<div class="form-group">
						<label for="exampleInputPassword1">Contrasenya de l'usuari:</label>
						<input type="password" name="cts" class="form-control" id="exampleInputPassword1" placeholder="Contrasenya" required>
					</div>
					<br>
					<input type="submit" value="Envia" class="btn btn-primary" style="width: 100%;">
					<br><br>
					<input type="reset" value="Neteja" class="btn btn-primary" style="width: 100%;">
				</form>
			</div>
			<br><br>
			<p style="text-align: center;"><a href="index.php">Torna a inici</a></p>
			<div class="abs-center">
				<label class="diahora"> 
					<?php
						date_default_timezone_set('Europe/Andorra');
						echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";	
					?>
				</label>
			</div>
		</div>

		<!-- Link JavaScript de Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	</body>
</html>