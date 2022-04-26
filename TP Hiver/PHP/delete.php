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
    <title>Suppression Équipe</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/style.css'>
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

    <h1>Suppression équipe</h1>
    <?php
    if (isset($_POST["btnSupp"])) {
        if (isset($_SESSION["NomUser"])) {
            $Req = $MaBase->query("DELETE FROM equipe WHERE IdEquipe = '" . $_POST["nbEquipe"] . "'");
            echo "Équipe supprimés";
        } else echo "Vous n'êtes pas connecté";
    }
    ?>
    <form action="" method="post">
        Équipe : <select name="nbEquipe" id="nbEquipe" required>
            <option value=""> ---Choisir équipe--- </option>
            <?php $reponse = $MaBase->query("SELECT * FROM equipe;");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdEquipe']; ?>">
                    <?php echo $donnees[""] . " : " . $donnees['']; ?>
                </option>
            <?php } ?>
        </select>
    </form>
</body>

</html>