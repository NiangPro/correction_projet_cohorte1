<?php
    class Pret
    { 
        private $codeMembre;
        private $codeDoc;
        private $datePret;
        private $dateRetour;   

        public function __construct($codeMembre, $codeDoc, $datePret, $dateRetour)
            {
                $this->codeMembre = $codeMembre;
                $this->codeDoc = $codeDoc;
                $this->datePret = $datePret;
                $this->dateRetour = $dateRetour;
                
            }


        // les getters

        public function CodeMembre(){return $this->codeMembre;}

        public function CodeDoc(){return $this->codeDoc;}

        public function DatePret(){return $this->datePret;}

        public function DateRetour(){return $this->dateRetour;}
    }




?>