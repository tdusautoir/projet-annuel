
<?php

    session_start();
?>
<html>
    <head>
       <meta charset="utf-8">
            <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
    </body>
</html>

<?php

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $pass = $_POST['password'];

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
            header('location:index.php');
        }
        else
        {
            echo "<h2>Votre mot de passe est invalide</h2>";
        }
    }   
    else
    {
        echo "<h2>Username introuvable</h2>";    
    }
}

?>