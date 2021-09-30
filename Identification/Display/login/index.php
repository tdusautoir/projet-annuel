
<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les bêtas testeurs</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<?php 

if (isset($_SESSION['username']))
{
?>
    <header class="header">
		<nav class="menu">
			<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique/Identification">Retour vers la page admin</a>
		</nav>
	</header>
	<h1 class="username"><span><?php echo $_SESSION['username'] ?></span></h1>
    
    <form method="post" action="index.php">
    <h3>Voulez vous afficher votre CV ?</h3>
        <p class="form">OUI : <input type="radio" name="Choice" value="DisplayOn"></input>        
        NON :<input type="radio" name="Choice" value="DisplayOff"> </p>
        <input type="submit" name="submit" value="Valider"></input>
    </form>

    <p><a class="disconnect" href='index.php?deconnexion=true'>Déconnexion</a></p>
	
	<br>
	<br>
        
    <?php
    if(isset($_POST['submit']))
    {
        if($_POST['Choice'] == "DisplayOn")
        {
            echo "<br><h4>Votre CV sera affiché !</h4>";
            $bdd = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci', 'carp310M');
            $req = $bdd->prepare('UPDATE listingEsgiGroupe1 SET idVisible=1 WHERE user = ?');
            $req->execute(array($_SESSION['username'])); 
        }
        elseif($_POST['Choice'] == "DisplayOff")
        {
            echo "<br><h4>Votre CV ne sera plus affiché !</h4>";
            $bdd = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci', 'carp310M');
            $req = $bdd->prepare('UPDATE listingEsgiGroupe1 SET idVisible=0 WHERE user = ?');
            $req->execute(array($_SESSION['username'])); 
        }
    }
    ?>

	<footer class="footer">
		<nav class="menu">
			<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique/contact.php">Nous contacter</a>
		</nav>
	</footer>
<?php
}
else
{
    $user=$_GET['user'];
    header("location:connexion.php?user=$user");
}

if(isset($_GET['deconnexion']))
{ 
   if($_GET['deconnexion']==true)
   {  
      session_unset();
      header("location:connexion.php");
   }
}
?>

</body>
</html>
