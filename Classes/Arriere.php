<?php class Arriere{
    private $id_;
    private $prenom_;
    private $nom_;
    private $PDO_;

    public function __construct($id_,$nom_,$prenom_,$pdo)
    {
        $this->id=$id_;
        $this->nom=$nom_;
        $this->prenom=$prenom_;
        $this->PDO_=$pdo;
    }
    
    public function GetArrriere()
    {
        $sql="SELECT * FROM arriere";
        $reponse = $this->PDO_->query($sql);
        while($donnees=$reponse->fetch())
        {
            $Arriere = new Meneur($donnees['id'],$donnees['prenom'],$donnees['nom'],$this->PDO_);
        }
    }



}
?>