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
    <h1>Ajout équipe</h1>
    <?php
    if (isset($_POST["btnEquipe"])) {
        if (isset($_SESSION["NoUser"])) {
            $Req = $MaBase->query("INSERT INTO equipe(IdMeneur,nom,prenom,IdArriere,nom,prenom,IdAilier,nom,prenom,IdAilierFort,nom,prenom,IdPivot,nom,prenom) VALUES ('" . $_POST["nbMeneur"] . "','" . $_POST["nbArriere"] . "','" . $_POST["nbAilier"] . "','" . $_POST["nbAilierFort"] . "','" . $_POST["nbPivot"] . "','" . $_SESSION["NoUser"] . "','" . $_POST["txtEquipe"] . "')");
            echo "Équipe ajoutée";
        } else echo "Vous n'êtes pas connecté";
        echo '<p><a href="ajoutastuce.php">Ajouter une nouvelle équipe</a></p>';
    } else {
    ?>
        <h2>Formulaire </h2>
        <form action="" method="post">
            Meneur : <select name="nbMeneur" id="nbMeneur" required>
                <option value=""> ---Ajouter Meneur--- </option>
                <?php $reponse = $MaBase->query("SELECT * FROM meneur");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdJeux']; ?>">
                        <?php echo $donnees['Titre']; ?>
                    </option>
                <?php } ?>
            </select>
            Arrière : <select name="nbArriere" id="nbArriere" required>
                <option value=""> ---Ajouter Arrière--- </option>
                <?php $reponse = $MaBase->query("SELECT * FROM arriere");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdJeux']; ?>">
                        <?php echo $donnees['Titre']; ?>
                    </option>
                <?php } ?>
            </select>
            Ailier : <select name="nbAilier" id="nbAilier" required>
                <option value=""> ---Ajouter Ailier--- </option>
                <?php $reponse = $MaBase->query("SELECT * FROM ailier");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdJeux']; ?>">
                        <?php echo $donnees['Titre']; ?>
                    </option>
                <?php } ?>
            </select>
            Ailier Fort : <select name="nbAilierFort" id="nbAilierFort" required>
                <option value=""> ---Ajouter Ailier Fort--- </option>
                <?php $reponse = $MaBase->query("SELECT * FROM ailier fort");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdJeux']; ?>">
                        <?php echo $donnees['Titre']; ?>
                    </option>
                <?php } ?>
            </select>
            Pivot : <select name="nbPivot" id="nbPivot" required>
                <option value=""> ---Ajouter Pivot--- </option>
                <?php $reponse = $MaBase->query("SELECT * FROM pivot");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['IdJeux']; ?>">
                        <?php echo $donnees['Titre']; ?>
                    </option>
                <?php } ?>
            </select>
            Équipe : <input type="text" name="txtEquipe" id="txtEquipe" required>
            <input type="submit" name="btnEquipe" value="Ajouter une équipe">
        </form>
    <?php
    }
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>