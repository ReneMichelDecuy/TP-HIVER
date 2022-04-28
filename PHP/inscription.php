<?php
session_start();
include "../Classes/Utulisateur.php";
try {
    $MaBase = new PDO('mysql:host=mysql-decuyrene.alwaysdata.net;dbname=decuyrene_5majeur', 'decuyrene', 'JordaN_121216');
} catch (Exception $e) {
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/style.css'>
    <title>Inscription</title>
</head>

<body>

<div class="border">
        <nav>
            <ul>
                <li><a href="../index.php">Acceuil</a></li>
                <li><a href="../PHP/affichage.php">Voir les équipes</a></li>
                <li><a href="../PHP/ajout.php">Ajouter une équipe</a></li>
                <li><a href="../PHP/modif.php">Modifier équipe</a></li>
                <li><a href="../PHP/delete.php">Supprimer équipe</a></li>
                <?php
            if (!isset($_SESSION["NomUser"])) {
                echo '<li><a href="../PHP/connection.php">Connexion</a></li>';
                echo '<li><a href="../PHP/inscription.php">Inscription</a></li>';
            } else echo '<li><a href="../PHP/deconnection.php">Deconnexion</a></li>';
            ?>
            </ul>
        </nav>    
    </div>

    <h1>Inscription</h1>
    <?php
    if (isset($_POST["btnAjout"])){
        $Req = $MaBase->query("INSERT INTO utilisateur(nom,mdp) VALUES ('" . $_POST["txtUser"] . "','" . $_POST["pwdUser"] . "')");
        $Req = $MaBase->query("SELECT * FROM utilisateur WHERE nom = '" . $_POST["txtUser"] . "' AND mdp = '" . $_POST["pwdUser"] . "'");
        $test = $Req->fetch();
        $_SESSION["NomUser"] = $test["id"];
        $util=new User($test["id"],$test["nom"]);
        echo "Bienvenue " . $_SESSION["NomUser"];
    } else {
    ?>
        <div>
            <form action="" method="post">
                Login : <input type="text" name="txtUser" id="txtUser" required>
                Mot de passe : <input type="password" name="pwdUser" id="pwdUser" required>
                <input type="submit" name="btnAjout" value="Créer un utilisateur">
            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>