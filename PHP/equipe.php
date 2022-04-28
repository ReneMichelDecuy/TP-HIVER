<?php
include "../Classes/Ailier.php";

class equipe{
    private $id_;
    private $nom_;

    private $ObjAilier_;
    private $ObjMeneur_;
    private $ObjAilierfort_;
    
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
        $Ailierfort = new  Ailierfort();
        $this->ObjAilierfort_ = $Ailierfort;
    }


}







?>