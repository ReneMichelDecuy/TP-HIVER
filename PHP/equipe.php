<?php
include "../Classes/Meneur.php";
include "../Classes/Arriere.php";
include "../Classes/Ailier.php";
include "../Classes/Ailierfort.php";
include "../Classes/Pivot.php";

class equipe{
    private $id_;
    private $nom_;

    private $ObjAilier_;
    private $ObjMeneur_;
    private $ObjAilierfort_;
    private $ObjArriere_;
    private $ObjPivot_;
    
    public function __construct($id, $nom){
        $this->id_ =$id;
        $this->nom_ =$nom;

    }

    public function loadPlayer(){

        //construir allier avec les données en base
        $Ailier = new Ailier();
        $this->ObjAilier_ = $Ailier;

        $Meneur = new Meneur();
        $this->ObjMeneur_ = $Meneur;

        $Ailierfort = new  AilierFort();
        $this->ObjAilierfort_ = $Ailierfort;

        $Arriere = new  Arriere();
        $this->ObjArriere_ = $Arriere;

        $Pivot = new  Pivot();
        $this->ObjPivot_ = $Pivot;
    }
}
?>