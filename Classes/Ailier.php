<?php class Ailier{
    private $id_;
    private $prenom_;
    private $nom_;
    private $PDO_;

    public function __construct($id,$pdo){
        $this->id_ =$id;
        $this->PDO_=$pdo;
        //chercher en bdd les info de Aillier selon $id
        //$this->prenom_ =$prenom;
        //$this->nom_ =$nom;   
    }
}
?>