<?php
    require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
    #
	# Atribut a modificar: Atribut recollit al formulari
	#
    if ( $_POST["unorg"] && $_POST['uid'] && $_POST['atribut'] && $_POST['nouValor']){
        if ($_POST['metode'] == "PUT"){
            $atribut=$_POST['atribut']; # El número identificador d'usuar té el nom d'atribut uidNumber
            $nou_contingut=$_POST['nouValor'];
            #
            # Entrada a modificar
            #
            $uid = $_POST['uid'];
            $unorg = $_POST["unorg"];
            $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
            #
            #Opcions de la connexió al servidor i base de dades LDAP
            $opcions = [
                'host' => 'zend-sarero.fjeclot.net',
                'username' => 'cn=admin,dc=fjeclot,dc=net',
                'password' => 'fjeclot',
                'bindRequiresDn' => true,
                'accountDomainName' => 'fjeclot.net',
                'baseDn' => 'dc=fjeclot,dc=net',		
            ];
            #
            # Modificant l'entrada
            #
            $ldap = new Ldap($opcions);
            $ldap->bind();
            $entrada = $ldap->getEntry($dn);
            if ($entrada){
                Attribute::setAttribute($entrada,$atribut,$nou_contingut);
                $ldap->update($dn, $entrada);
                $usuariModificat = true;
            } else{
                header("location: error_modificacio.php");
            }
        }else {
            header("location: error_modificacio.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Modificació d'usuaris</title>
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
			<h3 class="text-primary" style="text-align: center;"><b>Modificació d'usuaris</b></h3>
			<p style="text-align: center;">Aquesta pàgina permet modificar atributs dels usuaris de la base de dades LDAP.</p>
            <?php
                if ($usuariModificat == true){
                    echo "<p style='text-align: center; color: green; font-weight: bold;'>L'atribut de l'usuari ha estat modificat a la base de dades LDAP correctament.</p>";
                }
            ?>
			<br>
			<div class="abs-center">
				<form action="modificar_usuaris.php" method="POST" class="form-estils">
                    <input type="hidden" name="metode" value="PUT">
					<h3 class="text-primary" style="text-align: center;"><b>Formulari de selecció d'usuari</b></h3>
					<p style="text-align: center;"><b>Indica la informació de l'usuari que vols modificar de la base de dades:</b></p>	
					<div class="form-group">
						<label for="unorg">Unitat organitzativa:</label> 
						<select name="unorg" id="unorg" class="form-control">
                            <option value="usuaris">usuaris</option>
                            <option value="administradors">administradors</option>
                            <option value="desenvolupadors">desenvolupadors</option>
                        </select>
					</div>
                    <br>
                    <div class="form-group">
						<label for="uid">Usuari (uid):</label> 
						<input type="text" name="uid" id="uid" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="atribut">Selecciona l'atribut que vols modificar:</label><br><br>
                        <input type="radio" id="uidNumber" name="atribut" value="uidNumber" checked> Número identificador (uidNumber)<br>
                        <input type="radio" id="gidNumber" name="atribut" value="gidNumber"> Número de grup (gidNumber)<br>
                        <input type="radio" id="homeDirectory" name="atribut" value="homeDirectory"> Directori personal<br>
                        <input type="radio" id="loginShell" name="atribut" value="loginShell"> Shell<br>
                        <input type="radio" id="cn" name="atribut" value="cn"> Nom complet (cn)<br>
                        <input type="radio" id="sn" name="atribut" value="sn"> Cognom (sn):<br>
                        <input type="radio" id="givenName" name="atribut" value="givenName"> Nom (givenName):<br>
                        <input type="radio" id="postalAddress" name="atribut" value="postalAddress"> Direcció (PostalAdress)<br>
                        <input type="radio" id="mobile" name="atribut" value="mobile"> Mòbil<br>
                        <input type="radio" id="telephoneNumber" name="atribut" value="telephoneNumber"> Número de telèfon<br>
                        <input type="radio" id="title" name="atribut" value="title"> Títol<br>
                        <input type="radio" id="description" name="atribut" value="description"> Descripció<br>
					</div>
                    <br>
                    <div class="form-group">
						<label for="nouValor">Nou valor de l'atribut:</label> 
						<input type="text" name="nouValor" id="nouValor" class="form-control" required>
					</div>
                    <br>
                    <input type="submit" class="btn btn-primary" style="width: 100%;" value="Envia"/>
                    <br><br>
    			    <input type="reset" class="btn btn-primary" style="width: 100%;" value="Neteja"/>
				</form>
			</div>
			<br><br>
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