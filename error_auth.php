<?php
    header("Refresh: 10; url=login.php");
    # AQUESTA PÀGINA SERÀ MOSTRADA SI L'USUARI NO INTRODUEIX BÉ LES CREDENCIALS DE L'USUARI ADMIN DE LA BASE DE DADES LDAP
?>

<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Error login</title>
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
					<li id="prova" class="nav-item">
						<a class="nav-link" href="login.php">Torna a login</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Contingut de la pàgina -->
		<div class="container">
			<br><br>
			<h3 class="text-primary" style="text-align: center;"><b>Error d'autenticació</b></h3><br><br>
			<div class="abs-center">
				<div class="card" style="width: 65%;">
					<div class="card-body">
						<h4 class="card-title text-primary"><b>Ha ocorregut un error amb l'inici de sessió</b></h4><br>
						<h5 class="card-subtitle mb-2 text-muted">No s'ha pogut iniciar sessió amb les credencials que has introduït</h5><br>
						<p class="card-text">Per poder accedir a totes les funcionalitats, has d'autenticarte amb el nom d'usuari i la contrasenya de l'usuari administrador de LDAP.</p>
						<p class="card-text">El nom d'usuari i/o la contrasenya suministrats no són vàlids.</p><br>
						<div class="abs-center">
							<a href="index.php" class="card-link">Torna a inici</a>
							<a href="login.php" class="card-link">Torna a login</a>
						</div>
					</div>
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

		<!-- Link JavaScript de Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	</body>
</html>
