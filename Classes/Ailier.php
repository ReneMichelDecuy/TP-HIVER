<?php class Ailier{
    private $id_;
    private $prenom_;
    private $nom_;

    public function __construct($id, $prenom, $nom){
        $this->id_ =$id;
        $this->prenom_ =$prenom;
        $this->nom_ =$nom;
    }
}
?>