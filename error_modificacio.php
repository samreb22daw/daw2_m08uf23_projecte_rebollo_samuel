<?php
    header("Refresh: 10; url=menu.php");
    # AQUESTA PÀGINA SERÀ MOSTRADA SI NO ES POT MODIFICAR L'ATRIBUT D'UN USUARI A PARTIR DE LES DADES RECOLLIDES AL FORMULARI
?>

<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Error modificació d'usuaris</title>
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
						<a class="nav-link" href="menu.php">Torna al menú</a>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Contingut de la pàgina -->
		<div class="container">
			<br><br>
			<h3 class="text-primary" style="text-align: center;"><b>Error de modificació d'usuaris</b></h3><br><br>
			<div class="abs-center">
				<div class="card" style="width: 65%;">
					<div class="card-body">
						<h4 class="card-title text-primary"><b>Ha ocorregut un error al intentar modificar l'atribut de l'usuari</b></h4><br>
						<h5 class="card-subtitle mb-2 text-muted">No s'ha pogut modificar l'atribut de l'usuari amb la informació què has indicat al formulari</h5><br>
						<p class="card-text">És possible que l'usuari que esteu intentant modificar no existeixi a la base de dades LDAP, no pertanyi a la unitat organitzativa que esteu indicant, o que el mètode PHP utilitzat no sigui el correcte.</p>
						<p class="card-text">Assegureu-vos que l'usuari existeixi a la base de dades i la informació proporcionada al formulari sigui correcta. Si tot és correcte i el problema persisteix, posa't en contacte amb l'administrador.</p><br>
						<div class="abs-center">
							<a href="menu.php" class="card-link">Torna al menú</a>
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