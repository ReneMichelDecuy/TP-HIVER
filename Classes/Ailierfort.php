<?php class AilierFort{
    private $id_;
    private $prenom_;
    private $nom_;
    private $PDO_;

    public function __construct($id_,$pdo)
    {
        $this->id=$id_;
        //$this->nom=$nom_;
        //$this->prenom=$prenom_;
        $this->PDO_=$pdo;
    }
    
    public function GetAilierfort()
    {
        $sql="SELECT * FROM ailierfort";
        $reponse = $this->PDO_->query($sql);
        while($donnees=$reponse->fetch())
        {
            $Ailierfort = new Ailierfort($donnees['id'],$donnees['prenom'],$donnees['nom'],$this->PDO_);
        }
    }



}
?>