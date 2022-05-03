<?php class Pivot{
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
    
    public function GetMeneur()
    {
        $sql="SELECT * FROM meneur";
        $reponse = $this->PDO_->query($sql);
        while($donnees=$reponse->fetch())
        {
            $Meneur = new Meneur($donnees['id'],$donnees['prenom'],$donnees['nom'],$this->PDO_);
        }
    }



}
?>