<?php	

//Se connecter à la base de données

$db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci', 'carp310M');

// Sélectionner depuis la table listingESGI

$pdoStat = $db->prepare('SELECT * FROM listingEsgiGroupe1');

$executeIsOk = $pdoStat->execute();

$etudiants = $pdoStat->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Les bêtas testeurs</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>

	<!-- Navigation -->
	<header class="header">
		<nav class="menu">
			<a href="Identification/index.php">Identifiez-vous</a>
		</nav>
	</header>
	<!-- Titre -->

	<h1><span>LES BÊTAS TESTEURS:</span></h1>
	
	<!-- Sous-Titre-->
	<h2><span>Étudiants à l'<span class="Titre">ESGI</span> de Lille :</span></h2>
	
	<!-- Liste des Étudiants -->

<center>
		<div class="images">
			<?php foreach ($etudiants as $etudiant): ?>
			<?php if($etudiant['idVisible'] == 1) {	?>
			<a href="<?= $etudiant['cv'] ?>" download="<?= $etudiant['cv'] ?>"><img src="<?= $etudiant['img'] ?>"></a>
			<?php } ?>
			<?php endforeach; ?>
		</div>
</center>
	<!-- Sous-Sous-Titre -->
	<h3></h3>
	<center>
		<h3><span class="sous-titre">*Cliquez sur les images pour télécharger les CV*</span> </h3>
	</center><br>
	<br>
	<footer class="footer">
		<nav class="menu">
			<a href="contact.php">Nous contacter</a>
		</nav>
	</footer>
</body>
</html>