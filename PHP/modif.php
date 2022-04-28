<?php
session_start();
try {
    //$MaBase = new PDO('mysql:host=mysql-decuyrene.alwaysdata.net;dbname=decuyrene_5majeur', 'decuyrene', 'JordaN_121216');
    $MaBase = new PDO('mysql:host=192.168.65.4;dbname=decuyrene_5majeur', 'decuyrene', 'JordaN_121216');
} catch (Exception $e) {
    echo $e;
    //test
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Équipe</title>
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

    <h1>Modification équipe</h1>
    <?php
    if (isset($_POST["btnEquipe"])) {
        if (isset($_SESSION["NomUser"])) {
            $Req = $MaBase->query("UPDATE equipe SET equipe = '" . $_POST["txtEquipe"] . "' WHERE id = '" . $_POST["nbEquipe"] . "'");
            echo "Equipe modifiée";
        } else echo "Vous n'êtes pas connecté";
        
    } else {
    ?>
        <form action="" method="post">
            Équipe : <select name="nbEquipe" id="nbEquipe" required>
                <option value="">---Choisir équipe---</option>
                <?php $reponse = $MaBase->query("SELECT * FROM equipe;");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>">
                        <?php echo $donnees[""] . " : " . $donnees['']; ?>
                    </option>
                <?php } ?>
            </select>
            <form action="" method="post">
            Meneur : <select name="nbMeneur" id="nbMeneur" required>
                <option value=""> ---Ajouter Meneur--- </option>
                <?php $reponse = $MaBase->query("SELECT id,prenom,nom FROM meneur");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>">
                        <?php echo $donnees['prenom'] . " " . $donnees['nom'] ; ?>
                    </option>
                <?php } ?>
            </select>
            Arrière : <select name="nbArriere" id="nbArriere" required>
                <option value=""> ---Ajouter Arrière--- </option>
                <?php $reponse = $MaBase->query("SELECT id,prenom,nom FROM arriere");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>">
                    <?php echo $donnees['prenom'] . " " . $donnees['nom'] ; ?>
                    </option>
                <?php } ?>
            </select>
            Ailier : <select name="nbAilier" id="nbAilier" required>
                <option value=""> ---Ajouter Ailier--- </option>
                <?php $reponse = $MaBase->query("SELECT id,prenom,nom FROM ailier");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>">
                    <?php echo $donnees['prenom'] . " " . $donnees['nom'] ; ?>
                    </option>
                <?php } ?>
            </select>
            Ailier Fort : <select name="nbAilierFort" id="nbAilierFort" required>
                <option value=""> ---Ajouter Ailier Fort--- </option>
                <?php $reponse = $MaBase->query("SELECT id,prenom,nom FROM ailierfort");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>">
                    <?php echo $donnees['prenom'] . " " . $donnees['nom'] ; ?>
                    </option>
                <?php } ?>
            </select>
            Pivot : <select name="nbPivot" id="nbPivot" required>
                <option value=""> ---Ajouter Pivot--- </option>
                <?php $reponse = $MaBase->query("SELECT id,prenom,nom FROM pivot");
                while ($donnees = $reponse->fetch()) {
                ?>
                    <option value="<?php echo $donnees['id']; ?>">
                    <?php echo $donnees['prenom'] . " " . $donnees['nom'] ; ?>
                    </option>
                <?php } ?>
            </select>
            Équipe : <input type="text" name="txtEquipe" id="txtEquipe" required>
            <input type="submit" name="btnEquipe" value="Ajouter une équipe">
        </form>

            Modif : <input type="text" name="txtEquipe" id="txtEquipe" required>
            <input type="submit" name="btnEquipe" value="Modifier">
        </form>
    <?php
    }
    ?>
</body>

</html>