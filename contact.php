<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Page de contact</title>

   <!-- CSS -->
<style>
body {
	background-color: #130025;
}
@font-face {
	font-family: Lexend;
	src: url(font/Lexend-Thin.ttf);
}
@font-face {
	font-family: Noto;
	src: url(font/Noto.otf);
}
.header {
	position: fixed;
	left: 0;
	right: 0;
	height: 80px;
	line-height: 80px;
	background-color: #222222;
}
.menu {
	padding: 0 10px;
	text-align: center;
}
.menu a {
	font-family: Lexend;
	font-weight: bold;
	text-decoration: none;
	text-transform: uppercase;
	text-decoration: none;
	padding: 0 10px;
	color: #FFF;
	transition: all 0.1s ease 0.2s;
}
.menu a:hover {
	color: #62bcda;
	-webkit-transition: color 1s;
	transition: color 1s;
}
input[type=text], select, textarea {
	width: 100%;
	padding: 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	margin-top: 6px;
	margin-bottom: 16px;
	resize: vertical;
}
input[type=submit] {
	background-color: #4CAF50;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}
input[type=submit]:hover {
	background-color: #45a049;
}
.formulaire {
	border-radius: 5px;
	background-color: #f2f2f2;
	padding: 20px;
	font-family: Noto;
}
h1 {
	font-size: 150%;
	font-family: Lexend;
	color: #FFF;
	text-align:center;
}
</style>

</head>
<body>
	<header class="header">
		<nav class="menu">
			<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique">Retour vers l'Accueil</a>
		</nav>
	</header>
  	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="formulaire">
		<form action="#" id="monForm" method="post" name="monForm" onsubmit="envoieForm()">
			<label for="champ-nom">Nom :</label> <input autofocus="" id="champ-nom" name="name" placeholder="Prénom - NOM" required="required" type="text"> 
			<label for="champ-mail">Email :</label> <input id="champ-mail" name="mail" placeholder="Nom@Domaine.com" required="required" type="text">
			<label for="objet">Objet :</label> <input name="objet" type="text"> <label for="subject">Message :</label> 
			<textarea name="message" placeholder="Votre message ..." required="required" style="height:200px"></textarea> <input name="submit" type="submit" value="Envoyer">
		</form>
	</div>

<?php
if (isset($_POST['submit'])) {
   if (!isset($_POST['message']) || $_POST['message']=='') {
         echo("<font color='red'>Vous avez oublié d\'ins&eacute;rer un message :</font>");

      }
      else{
      // assignation de la varaiable mail si aucune adresse mail renseignée
      if (!isset($_POST['mail']) || $_POST['mail']=='') {
         $_POST['mail']='';
      }
      elseif(isset($_POST['Validation'])){
         $adresseMail = $_POST['mail'];
         $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 
         'carp310M');
         $result = $db->prepare('INSERT INTO mailADavid (mail) VALUES(:adresseMail)');
         $result->execute(array('adresseMail' => $adresseMail));
      }

      $message = 'Vous avez recu un message via votre site internet, le voici : <br/>'.$_POST['message'].'<br/> Répondre :</br>'.$_POST['mail'];
	              
      mail('davidachille18@gmail.com, derachejulien@orange.fr, tdnet59@gmail.com', 'Message Site Web', $message, "Content-type: text/html; charset=UTF-8");

      // confirmation
      echo('<br> <h1>Votre message a bien &eacute;t&eacute; envoy&eacute; !</h1>');
      }
   }

//       if($_GET['email']){
//       $adresseMail = $_GET['email'];
//       //$db = new PDO('mysql:host=localhost;dbname=cv;charset=utf8', 'root', 'root');
//       $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');

//       $selectall = $db->query('SELECT * FROM tvinchentMail WHERE mail="'.$adresseMail.'"');
//         $result = $selectall->fetch();
//         $counttable = (count($result));

//         if($counttable >= 1){
//             $delete = $db->prepare('DELETE FROM tvinchentMail WHERE mail="'.$adresseMail.'"');
//             $delete->execute();
//         }   

//       // confirmation de suppresion
//       echo('Votre &ecirc;tes bien desabonn&eacute; de notre liste de diffusion');
// }
 ?>
</body>
</html>