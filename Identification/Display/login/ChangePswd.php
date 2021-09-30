<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
		<nav class="menu">
			<a href="https://www.je-code.com/esgi1/tdusautoir/mosaique/Identification/Display/login/connexion.php">Retour</a>
		</nav>
	</header>
    <div id="container">
            <form method="POST" action="ChangePswd.php" class="formConnexion">
                <h1>Modifier votre mot de passe :</h1>  
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Nom d'utilisateur" name="username" value="<?php echo $_GET['user'] ?>" class="NomUtilisateur">

                <label><b>Votre ancien mot de passe :</b></label>
                <input type="password" placeholder="Mot de passe" name="password" class="AncienMDP" >

                <label><b>Votre nouveau mot de passe :</b></label>
                <input type="password" placeholder="Mot de passe" name="Newpassword" class="NouveauMDP">

                <label><b>Confirmation du nouveau mot de passe :</b></label>
                <input type="password" placeholder="Mot de passe" name="NewpasswordVerif" class="NouveauMDP" >
                
                <input class="login" type="submit" name='submit' value='LOGIN'>
            </form>
    </div>
    

<?php

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $newpass = $_POST['Newpassword'];
    $newpassverif = $_POST['NewpasswordVerif'];

    $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8','exmachinefmci', 'carp310M');

    $sql="SELECT * FROM listingEsgiGroupe1 WHERE user = '$username'";
    $result = $db->prepare($sql);
    $result->execute();

    if ($result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if (password_verify($pass, $data[0]["mdp"]))
        {
            $_SESSION['username'] = $username;
            if($newpass == $newpassverif && $newpass != '')
            {
                $newpass = password_hash($newpass, PASSWORD_DEFAULT);
                $sql = "UPDATE listingEsgiGroupe1 SET mdp='$newpass' WHERE user ='$username' ";
                $req = $db->prepare($sql);
                $req->execute();
                echo "<center><h2>votre mot de passe a bien été modifié</h2></center>";
            }
            else
            {
                echo "<style>.NouveauMDP[type=password]{border: solid red;}";
            }
        }
        else
        {
            echo "<style>.AncienMDP[type=password]{border: solid red;}";
        }
    }   
    else
    {
        echo "<style>.NomUtilisateur[type=text]{border: solid red;}";
    }
    
}

?>

</body>
</html>