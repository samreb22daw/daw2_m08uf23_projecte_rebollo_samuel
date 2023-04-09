<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Menú</title>
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
						<a class="nav-link" href="visualitza_dades.php">Visualització de dades</a>
					</li>
					<li id="prova" class="nav-item">
						<a class="nav-link" href="creacio_usuaris.php">Creació d'usuaris</a>
					</li>
					<li id="prova" class="nav-item">
						<a class="nav-link" href="esborrar_usuaris.php">Esborrament d'usuaris</a>
					</li>
					<li id="prova" class="nav-item">
						<a class="nav-link" href="modificar_usuaris.php">Modificació d'usuaris</a>
					</li>
					<li id="prova" class="nav-item">
						<a class="nav-link" href="index.php">Torna a inici</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<!-- Contingut de la pàgina -->
		<div class="container">
			<br><br><br>
			<h3 class="text-primary" style="text-align: center;"><b>Menú d'opcions de l'aplicació</b></h3>
			<p style="text-align: center;">En aquest menú trobes totes les funcionalitats de l'aplicació (operacions CRUD).</p>
			<br><br>
			<div class="abs-center">
				<div class="card" style="width: 65%;">
					<div class="card-body">
						<h4 class="card-title text-primary"><b>Menú de funcionalitats</b></h4><br>
						<h5 class="card-subtitle mb-2 text-muted">Selecciona qualsevol enllaç per accedir a la pàgina de la funcionalitat</h5><br>
						<div style="text-align: center;">
							<p><a href='visualitza_dades.php'>Visualització de dades</a></p>
							<p><a href='creacio_usuaris.php'>Creació d'usuaris</a></p>
							<p><a href='esborrar_usuaris.php'>Esborrament d'usuaris</a></p>
							<p><a href='modificar_usuaris.php'>Modificació d'usuaris</a></p>
						</div>
					</div>
				</div>
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