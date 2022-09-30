<?php
    class Reservation
    {
        private $codeMembre;
        private $codeDoc;
        private $dateReserv;
        
        public function __construct($codeMembre, $codeDoc, $dateReserv)
        {
            $this->codeMembre = $codeMembre;
            $this->codeDoc = $codeDoc;
            $this->dateReserv = $dateReserv;
        }

        public function CodeMembre(){return $this->codeMembre;}

        public function CodeDoc(){return $this->codeDoc;}

        public function DateReserv(){return $this->dateReserv;}
    }

?>