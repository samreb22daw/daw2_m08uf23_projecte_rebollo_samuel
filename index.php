<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Inici</title>
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
						<a class="nav-link" href="login.php">Login</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<!-- Carrusel de la pàgina -->
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="imatges/index_banner.png" class="d-block w-100" height="740">
				</div>
				<div class="carousel-item">
					<img src="imatges/index_banner2.jpg" class="d-block w-100" height="740">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		
		<!-- Contingut de la pàgina -->
		<div class="container">
			<br><br>
			<h3 class="text-primary" style="text-align: center;"><b>Aplicació d'accés a bases de dades LDAP</b></h3>
			<p style="text-align: center;">Aquesta aplicació permet realitzar les conegudes operacions CRUD sobre una base de dades LDAP.<br>Per poder
			realitzar qualsevol operació a la base de dades, has d'accedir com usuari administrador de LDAP.</p>
			<br>
			<div class="abs-center">
				<div class="inici_style">
					<h4> DAW2 M08UF2 M08UF3 </h4>
            		<h5> Autor: samreb22daw</h5>
            		<h5> Correu: samreb22daw@proton.me</h5>
            		<h5> Github: https://github.com/samreb22daw/daw2_m08uf23_projecte_rebollo_samuel</h5>
            		<br>
            		<p style="text-align: center;"><a href="login.php">Inicia sessió</a></p>
				</div>
			</div>
			<br><br>
			<div class="abs-center">
				<label class="diahora"> 
					<?php
						date_default_timezone_set('Europe/Andorra');
						echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";	
					?>
				</label>
			</div>
		</div>
		<br><br>
		
		<!-- Footer de la pàgina -->
		<footer class="bg-primary">
			<br>
			<p style="text-align: center; color: white; margin-top: 10px;">© 2023 Copyright: Sarero's App</p>
			<br>
		</footer>
		
		<!-- Link JavaScript de Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		
	</body>
</html>