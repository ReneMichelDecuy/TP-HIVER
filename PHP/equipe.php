<?php
include "../Classes/Meneur.php";
include "../Classes/Arriere.php";
include "../Classes/Ailier.php";
include "../Classes/Ailierfort.php";
include "../Classes/Pivot.php";

class equipe{
    private $id_;
    private $nom_;
    private $PDO_;

    private $ObjAilier_;
    private $ObjMeneur_;
    private $ObjAilierfort_;
    private $ObjArriere_;
    private $ObjPivot_;
    
    public function __construct($id, $nom, $pdo){
        $this->id_ =$id;
        $this->nom_ =$nom;
        $this->PDO_=$pdo;
    }

    public function loadPlayer(){

        //chercher en bdd les id de chaques joueur selon id de l'équipe
        $idAilier= 0;
        $idMeneur= 0;

        //construir allier avec les données en base
        $Ailier = new Ailier($idAilier,$this->PDO_);
        $this->ObjAilier_ = $Ailier;

        $Meneur = new Meneur(1,$this->PDO_);
        $this->ObjMeneur_ = $Meneur;

        $Ailierfort = new  AilierFort(1,$this->PDO_);
        $this->ObjAilierfort_ = $Ailierfort;

        $Arriere = new  Arriere(1,$this->PDO_);
        $this->ObjArriere_ = $Arriere;

        $Pivot = new  Pivot(1,$this->PDO_);
        $this->ObjPivot_ = $Pivot;
    }
}
?>