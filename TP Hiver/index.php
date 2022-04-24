<?php
session_start();
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
    <link rel="icon" type="image/png" sizes="16x16" href="Image/icone.png">
    <link rel='stylesheet' href='CSS/fichier.css'>
    <title>Page d'acceuil</title>
</head>

<body>
    <div class="compte">
        <ul>
            <?php
            if (!isset($_SESSION["NomUser"])) {
                echo '<li><a href="PHP/connection.php">Connexion</a></li>';
                echo '<li><a href="PHP/inscription.php">Inscription</a></li>';
            } else echo '<li><a href="PHP/deconnection.php">Deconnexion</a></li>';
            ?>
        </ul>
    </div>
    <h1 class="centre"><u>Bienvenue sur 5 Majeur !</u></h1>
    <div class="border">
        <ul>
            <li><a href="PHP/affichage.php">Voir les équipes</a></li>
            <li><a href="PHP/ajoutastuce.php">Ajouter une équipe</a></li>
            <li><a href="PHP/modifastuce.php">Modifier équipe</a></li>
            <li><a href="PHP/delastuce.php">Supprimer équipe</a></li>
        </ul>
    </div>
</body>

</html>