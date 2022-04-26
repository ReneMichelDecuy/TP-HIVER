<?php
session_start();
include "../Classes/Utilisateur.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/style.css'>
    <title>Deconnexion</title>
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

    <h1>Deconnexion</h1>
    <?php
    session_unset();
    echo "Vous avez été deconnecté";
    ?>
</body>

</html>