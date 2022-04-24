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
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/fichier.css'>
    <title>Page d'acceuil</title>
</head>

<body>
    <h1>Équipe</h1>
    <form action="" method="post">
        Équipe : <select name="nbEquipe" id="nbEquipe" required>
            <option value=""> ---Afficher équipe--- </option>
            <?php $reponse = $MaBase->query("SELECT * FROM equipe");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdEquipe']; ?>">
                    <?php echo $donnees['']; ?>
                </option>
            <?php } ?>
        </select>
        <input type="submit" name="btnEquipe" value="Chercher">
    </form>
    <?php
    if (isset($_POST["btnEquipe"])) {
        $reponse = $MaBase->query("SELECT * FROM equipe WHERE Idequipe = '" . $_POST["nbEquipe"] .  "'");
        $donnees = $reponse->fetch();
        echo "<span>Equipe sélectionner : " . $donnees[""] . "</span>";
    
    ?>

    <?php
        } else echo "Il n'y a pas d'équipe";
    }
    ?>
    <p><a href="../index.php">Retour</a></p>

</body>

</html>