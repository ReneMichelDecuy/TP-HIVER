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
    <title>Page d'acceuil</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/fichier.css'>
</head>

<body>
    <h1>Suppression équipe</h1>
    <?php
    if (isset($_POST["btnSupp"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("DELETE FROM equipe WHERE IdEquipe = '" . $_POST["nbEquipe"] . "'");
            echo "Équipe supprimés";
        } else echo "Vous n'êtes pas connecté";
    }
    ?>
    <form action="" method="post">
        Astuce : <select name="nbEquipe" id="nbEquipe" required>
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
    <p><a href="../index.php">Retour</a></p>
</body>

</html>