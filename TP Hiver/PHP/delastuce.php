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
    <h1>Suppression d'astuces</h1>
    <?php
    if (isset($_POST["btnSupp"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("DELETE FROM Astuce WHERE IdAstuce = '" . $_POST["nbAstuce"] . "'");
            $Req = $MaBase->query("DELETE FROM Commentaire WHERE IdAstuce = '" . $_POST["nbAstuce"] . "'");
            echo "Astuce et commentaires liés supprimés";
        } else echo "Vous n'êtes pas connecté";
    }
    ?>
    <form action="" method="post">
        Astuce : <select name="nbAstuce" id="nbAstuce" required>
            <option value=""> ---Choisir équipe--- </option>
            <?php $reponse = $MaBase->query("SELECT Jeux.Titre,Astuce.IdAstuce,Astuce.Astuce FROM Jeux,Astuce WHERE Astuce.IdJeux=Jeux.IdJeux ORDER BY Jeux.Titre;");
            while ($donnees = $reponse->fetch()) {
            ?>
                <option value="<?php echo $donnees['IdAstuce']; ?>">
                    <?php echo $donnees["Titre"] . " : " . $donnees['Astuce']; ?>
                </option>
            <?php } ?>
        </select>
        Commentaire : <input type="text" name="txtComm" id="txtComm" required>
        <input type="submit" name="btnSupp" value="Suppression">
    </form>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>