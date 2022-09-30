<?php
class User
{
    private string $code;
    private string $prenom;
    private string $nom;
    private string $adresse;
    private string $ville;
    private string $codePostal;
    private string $province;
    private string $type;
    private string $tel;
    private string $courriel;
    private string $mdp;


    public function __construct($code, $prenom, $nom, $adresse, $type, $tel, $courriel, $mdp, $ville, $codePostal, $province)
    {
        $this->code = $code;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->type = $type;
        $this->tel = $tel;
        $this->courriel = $courriel;
        $this->mdp = $mdp;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->province = $province;
    }

    // les getters

    public function Code(){return $this->code;}

    public function Prenom(){return $this->prenom;}

    public function Nom(){return $this->nom;}

    public function Adresse(){return $this->adresse;}

    public function Type(){return $this->type;}

    public function Tel(){return $this->tel;}

    public function Courriel(){return $this->courriel;}

    public function Mdp(){return $this->mdp;}

    public function CodePostal(){return $this->codePostal;}

    public function Ville(){return $this->ville;}
    
    public function Province(){return $this->province;}
    
}