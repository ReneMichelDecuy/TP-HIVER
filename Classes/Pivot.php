<?php class Pivot{
    private $id_;
    private $prenom_;
    private $nom_;
    private $PDO_;

    public function __construct($id,$pdo)
    {
        $this->id_=$id;
       // $this->nom=$nom_;
        //$this->prenom=$prenom_;
        $this->PDO_=$pdo;
    }
    
    public function GetPivot()
    {
        $sql="SELECT * FROM pivot";
        $reponse = $this->PDO_->query($sql);
        while($donnees=$reponse->fetch())
        {
            $Pivot = new Meneur($donnees['id'],$donnees['prenom'],$donnees['nom'],$this->PDO_);
        }
    }



}
?>