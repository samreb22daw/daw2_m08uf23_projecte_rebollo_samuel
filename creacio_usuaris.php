<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#Dades de la nova entrada
#
if ($_POST['uid'] && $_POST['unorg'] && $_POST['num_id'] && $_POST['grup'] && $_POST['dir_pers'] && $_POST['sh'] && $_POST['cn'] && $_POST['sn'] && $_POST['nom'] && $_POST['adressa'] && $_POST['mobil'] && $_POST['telefon'] && $_POST['titol'] && $_POST['descripcio']){
    $uid=$_POST['uid'];
    $unorg=$_POST['unorg'];
    $num_id=$_POST['num_id'];
    $grup=$_POST['grup'];
    $dir_pers=$_POST['dir_pers'];
    $sh=$_POST['sh'];
    $cn=$_POST['cn'];
    $sn=$_POST['sn'];
    $nom=$_POST['nom'];
    $mobil=$_POST['mobil'];
    $adressa=$_POST['adressa'];
    $telefon=$_POST['telefon'];
    $titol=$_POST['titol'];
    $descripcio=$_POST['descripcio'];
    $objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
    #
    #Afegint la nova entrada
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
    $entrada='uid='.$_POST['uid'].',ou='.$_POST['unorg'].',dc=fjeclot,dc=net';
    $usuari=$ldap->getEntry($entrada);
    
    if (empty($usuari)){
        $nova_entrada = [];
        Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
        Attribute::setAttribute($nova_entrada, 'uid', $uid);
        Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
        Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
        Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
        Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
        Attribute::setAttribute($nova_entrada, 'cn', $cn);
        Attribute::setAttribute($nova_entrada, 'sn', $sn);
        Attribute::setAttribute($nova_entrada, 'givenName', $nom);
        Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
        Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
        Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
        Attribute::setAttribute($nova_entrada, 'title', $titol);
        Attribute::setAttribute($nova_entrada, 'description', $descripcio);
        $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
        if($ldap->add($dn, $nova_entrada)){
            $usuariCreat = true;
        }
    }else {
        header("location: error_creacio.php");
    }
}
?>

<!DOCTYPE html>
<html lang="ca">

	<head>
		<meta charset="utf-8">
		<title>Creació d'usuaris</title>
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
			<h3 class="text-primary" style="text-align: center;"><b>Creació d'usuaris</b></h3>
			<p style="text-align: center;">Aquesta pàgina permet crear nous usuaris a la base de dades LDAP.</p>
            <?php
                if ($usuariCreat == true){
                    echo "<p style='text-align: center; color: green; font-weight: bold;'>L'usuari ha estat creat correctament, ha sigut emmagatzemat a la base de dades LDAP.</p>";
                }
            ?>
			<br>
			<div class="abs-center">
				<form action="creacio_usuaris.php" method="POST" class="form-estils">
                    <h3 class="text-primary" style="text-align: center;"><b>Formulari de creació d'un usuari</b></h3>
					<p style="text-align: center;"><b>Indica tota la informació de l'usuari que vols crear a la base de dades:</b></p>
                    <div class="form-group">
						<label for="uid">Identificador (uid):</label> 
						<input type="text" name="uid" id="uid" class="form-control" required>
					</div>
                    <br>
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
						<label for="num_id">Número identificador (uidNumber):</label> 
						<input type="number" name="num_id" id="num_id" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="grup">Número de grup (gidNumber):</label> 
						<input type="number" name="grup" id="grup" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="dir_pers">Directori personal:</label> 
						<input type="text" name="dir_pers" id="dir_pers" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="sh">Shell:</label> 
						<input type="text" name="sh" id="sh" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="cn">Nom complet (cn):</label> 
						<input type="text" name="cn" id="cn" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="sn">Cognom (sn):</label> 
						<input type="text" name="sn" id="sn" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="nom">Nom (givenName):</label> 
						<input type="text" name="nom" id="nom" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="adressa">Direcció (PostalAdress):</label> 
						<input type="text" name="adressa" id="adressa" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="mobil">Mòbil:</label> 
						<input type="number" name="mobil" id="mobil" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="telefon">Número de telèfon:</label> 
						<input type="number" name="telefon" id="telefon" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="titol">Títol:</label> 
						<input type="text" name="titol" id="titol" class="form-control" required>
					</div>
                    <br>
                    <div class="form-group">
						<label for="descripcio">Descripció:</label> 
						<input type="text" name="descripcio" id="descripcio" class="form-control" required>
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