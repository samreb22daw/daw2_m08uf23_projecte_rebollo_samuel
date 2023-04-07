<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Visualització de dades</title>
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
			<h3 class="text-primary" style="text-align: center;"><b>Visualització de dades</b></h3>
			<p style="text-align: center;">Aquesta pàgina permet visualitzar totes les dades d'un usuari.</p>
			<br>
			<div class="abs-center">
				<form action="visualitza_dades.php" method="GET" class="form-estils">
					<h3 class="text-primary" style="text-align: center;"><b>Formulari de selecció d'usuari</b></h3>
					<p style="text-align: center;"><b>Indica la informació de l'usuari que vols veure les seves dades:</b></p>	
					<div class="form-group">
						<label for="ou">Unitat organitzativa:</label> 
						<select name="ou" id="ou" class="form-control">
                            <option value="usuaris">usuaris</option>
                            <option value="administradors">administradors</option>
                            <option value="desenvolupadors">desenvolupadors</option>
                        </select>
					</div>
                    <br>
                    <div class="form-group">
						<label for="usuari">Usuari (uid):</label> 
						<input type="text" name="usr" id="usuari" class="form-control" required>
					</div>
                    <br>
                    <input type="submit" class="btn btn-primary" style="width: 100%;" value="Envia"/>
                    <br><br>
    			    <input type="reset" class="btn btn-primary" style="width: 100%;" value="Neteja"/>
				</form>
			</div>
			<br><br>
            <?php
                require 'vendor/autoload.php';
                use Laminas\Ldap\Ldap;
                
                ini_set('display_errors',0);
                if ($_GET['usr'] && $_GET['ou']){
                    $domini = 'dc=fjeclot,dc=net';
                    $opcions = [
                        'host' => 'zend-sarero.fjeclot.net',
                        'username' => "cn=admin,$domini",
                        'password' => 'fjeclot',
                        'bindRequiresDn' => true,
                        'accountDomainName' => 'fjeclot.net',
                        'baseDn' => 'dc=fjeclot,dc=net',
                    ];
                    $ldap = new Ldap($opcions);
                    $ldap->bind();
                    $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
                    $usuari=$ldap->getEntry($entrada);
                    
                    # Si la variable $usuari está vacía, quiere decir que el usuario que queremos consultar no existe
                    if (empty($usuari)) {
                        header("location: error_visualitzacio.php");
                    } else {
                        echo '<div class="abs-center">';
                        echo '<table class="table table-bordered table-sm" style="width: 70%; text-align: left;">';
                        echo '<thead class="bg-light" style="text-align: center;"><tr><th colspan=2>Dades de l\'usuari: '.$usuari["dn"].'</th></tr></thead>';
                        echo '<thead class="bg-light" style="text-align: center;"><tr><th>Atribut</th><th>Valor</th></tr></thead>';
                        echo '<tbody>';
                        foreach ($usuari as $atribut => $dada) {
                            if ($atribut != "dn") {
                                echo '<tr><td>'.$atribut.'</td><td>'.$dada[0].'</td></tr>';
                            }
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    }
                }
            ?>
			<p style="text-align: center;"><a href="menu.php">Torna al menú</a></p>
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