<?php	

	//Se connecter à la base de données

	$db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci', 'carp310M');

	// Sélectionner depuis la table listingESGI les noms prenoms et id
	$pdoStat = $db->prepare('SELECT * FROM listingEsgiGroupe1');

	$executeIsOk = $pdoStat->execute();

	$etudiants = $pdoStat->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les bêtas testeurs</title>
<!-- CSS -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
	<!-- Navigation -->
	<header class="header">
		<nav class="menu">
			<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique">Retour vers l'Accueil</a>
		</nav>
	</header><!-- Titre -->
	<h1><span>Qui êtes vous ?</span></h1>
	
	<!-- Liste des étudiants -->
	<center>
		<table class="liste">
			<tr>
				<td>
					<ul>
				<?php foreach ($etudiants as $etudiant): ?>
				<li>
				<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique/Identification/Display/login/index.php?user=<?php echo $etudiant['user'] ?>">
				<?= $etudiant['prenom'] ?> <?= $etudiant['nom'] ?>
				</li>
				<?php endforeach; ?>
					</ul>
				</td>
			</tr>
		</table>
	</center>
	
	<br>
	<br>
	
	<footer class="footer">
		<nav class="menu">
			<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique/contact.php">Nous contacter</a>
		</nav>
	</footer>
</body>
</html>