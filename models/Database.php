<?php

class Database
{
    private $db;
    
    public function __construct($dbname = "biblio"){
        try {           
            $this->db = new \PDO("mysql:host=localhost;dbname=".$dbname, "root", "");
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function login($code, $mdp){
        try {           
            $req = $this->db->prepare("SELECT * FROM user WHERE code = :code AND mdp = :mdp");
            $req->execute([
                "code" => $code,
                "mdp" => $mdp
            ]);

            return $req->fetch();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function employesAndAdmins(){
        try {           
            $req = $this->db->prepare("SELECT * FROM user WHERE type = 'admin' OR type = 'employe'  ORDER BY nom ASC");
            $req->execute();

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function membres(){
        try {           
            $req = $this->db->prepare("SELECT * FROM user WHERE type = 'membre' ORDER BY nom ASC");
            $req->execute();

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function documents(){
        try {           
            $req = $this->db->prepare("SELECT * FROM document  ORDER BY categorie ASC");
            $req->execute();

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function reservations(){
        try {           
            $req = $this->db->prepare("SELECT id,anneePub,statut, titre, auteur, dateReserv, prenom, nom, r.codeMembre as codeMembre, r.codeDoc as codeDoc
            FROM reservation  r, user u, document d  
            WHERE (r.codeMembre = u.code AND r.codeDoc = d.codeDoc) 
            ORDER BY dateReserv DESC");
            $req->execute();

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function reservationsMembre($codeMembre){
        try {           
            $req = $this->db->prepare("SELECT id,anneePub, titre, auteur,statut, dateReserv, prenom, nom, r.codeMembre as codeMembre, r.codeDoc as codeDoc
            FROM reservation  r, user u, document d  
            WHERE (r.codeMembre = u.code AND r.codeDoc = d.codeDoc AND r.codeMembre = :codeMembre) 
            ORDER BY dateReserv DESC");
            $req->execute(['codeMembre'=>$codeMembre]);

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function prets(){
        try {           
            $req = $this->db->prepare("SELECT id,anneePub,retour, titre, auteur, dateRetour, datePret, prenom, nom, p.codeMembre as codeMembre, p.codeDoc as codeDoc
            FROM pret  p, user u, document d 
            WHERE (p.codeMembre = u.code AND p.codeDoc = d.codeDoc) ORDER BY datePret DESC");
            $req->execute();

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }
    public function pretsMembre($codeMembre){
        try {           
            $req = $this->db->prepare("SELECT distinct id,anneePub,retour, titre, auteur, dateRetour, datePret, prenom, nom, p.codeMembre as codeMembre, p.codeDoc as codeDoc
            FROM pret  p, user u, document d 
            WHERE (p.codeMembre = u.code AND p.codeDoc = d.codeDoc AND p.codeMembre = :codeMembre)
            ORDER BY datePret DESC");
            $req->execute(['codeMembre'=>$codeMembre]);

            return $req->fetchAll();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function codeAlreadyGet($code){
        try {           
            $req = $this->db->prepare("SELECT * FROM user WHERE code = :code");
            $req->execute(['code'=>$code]);

            return $req->fetch();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function docCodeAlreadyGet($code){
        try {           
            $req = $this->db->prepare("SELECT * FROM document WHERE codeDoc = :codeDoc");
            $req->execute(['codeDoc'=>$code]);

            return $req->fetch();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function getReservationById($id){
        try {           
            $req = $this->db->prepare("SELECT id,anneePub,statut, titre, auteur, dateReserv, prenom, nom, r.codeMembre as codeMembre, r.codeDoc as codeDoc
            FROM reservation  r, user u, document d 
            WHERE (r.codeMembre = u.code AND r.codeDoc = d.codeDoc AND id = :id)");
            $req->execute(['id'=>$id]);

            return $req->fetch();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function getPretById($id){
        try {           
            $req = $this->db->prepare("SELECT id,anneePub,retour, titre, auteur, dateRetour, datePret, prenom, nom, p.codeMembre as codeMembre, p.codeDoc as codeDoc
            FROM pret  p, user u, document d 
            WHERE (p.codeMembre = u.code AND p.codeDoc = d.codeDoc AND id = :id)");
            $req->execute(['id'=>$id]);

            return $req->fetch();

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function addUser(User $user){
        try {           
            $req = $this->db->prepare("INSERT INTO `user` 
            VALUES(:code, :prenom, :nom, :adresse, :type, :courriel, :tel, :mdp, :codePostal, :ville, :province)");
            return $req->execute([
                "code" => $user->Code(),
                "prenom" => $user->Prenom(),
                "nom" => $user->Nom(),
                "adresse" => $user->Adresse(),
                "type" => $user->Type(),
                "courriel" => $user->Courriel(),
                "tel" => $user->Tel(),
                "mdp" => $user->Mdp(),
                "codePostal" => $user->CodePostal(),
                "ville" => $user->Ville(),
                "province" => $user->Province()
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function editUser(User $user, $codeUser){
        try {           
            $req = $this->db->prepare("UPDATE `user` 
            SET code =:code, prenom=:prenom, nom=:nom, adresse=:adresse, type=:type, courriel=:courriel, tel=:tel, mdp=:mdp, codePostal=:codePostal, ville=:ville, province=:province
             WHERE code=:codeUser");
            return $req->execute([
                "code" => $user->Code(),
                "prenom" => $user->Prenom(),
                "nom" => $user->Nom(),
                "adresse" => $user->Adresse(),
                "type" => $user->Type(),
                "courriel" => $user->Courriel(),
                "tel" => $user->Tel(),
                "mdp" => $user->Mdp(),
                "codePostal" => $user->CodePostal(),
                "ville" => $user->Ville(),
                "province" => $user->Province(),
                "codeUser" => $codeUser
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function removeUser($codeUser){
        try {           
            $req = $this->db->prepare("DELETE FROM `user` WHERE code=:codeUser");
            return $req->execute([
                "codeUser" => $codeUser
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function addDocument(Document $doc){
        try {           
            $req = $this->db->prepare("INSERT INTO `document` 
            VALUES(:codeDoc, :titre, :auteur, :anneePub, :categorie, :type, :genre, :description, :isbn)");
            return $req->execute([
                "codeDoc" => $doc->CodeDoc(),
                "titre" => $doc->Titre(),
                "auteur" => $doc->Auteur(),
                "anneePub" => $doc->AnneePub(),
                "categorie" => $doc->Categorie(),
                "type" => $doc->Type(),
                "genre" => $doc->Genre(),
                "description" => $doc->Description(),
                "isbn" => $doc->Isbn()
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function editDocument(Document $doc, $codeDocEdit){
        try {           
            $req = $this->db->prepare("UPDATE `document` 
            SET codeDoc=:codeDoc, titre=:titre, auteur=:auteur, anneePub=:anneePub, categorie=:categorie, type=:type, genre=:genre, description=:description, isbn=:isbn
             WHERE codeDoc=:codeDocEdit");
            return $req->execute([
                "codeDoc" => $doc->CodeDoc(),
                "titre" => $doc->Titre(),
                "auteur" => $doc->Auteur(),
                "anneePub" => $doc->AnneePub(),
                "categorie" => $doc->Categorie(),
                "type" => $doc->Type(),
                "genre" => $doc->Genre(),
                "description" => $doc->Description(),
                "isbn" => $doc->Isbn(),
                "codeDocEdit" => $codeDocEdit
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function removeDocument($codeDocEdit){
        try {           
            $req = $this->db->prepare("DELETE FROM `document` WHERE codeDoc=:codeDocEdit");
            return $req->execute([
                "codeDocEdit" => $codeDocEdit
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function addReservation(Reservation $res){
        try {           
            $req = $this->db->prepare("INSERT INTO `reservation` 
            VALUES(null, :codeMembre,:codeDoc,  :dateReserv, 0)");
            return $req->execute([
                "codeDoc" => $res->CodeDoc(),
                "codeMembre" => $res->CodeMembre(),
                "dateReserv" => $res->DateReserv()
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function editReservation(Reservation $res, $id){
        try {           
            $req = $this->db->prepare("UPDATE `reservation` 
            SET codeMembre=:codeMembre,codeDoc=:codeDoc,  dateReserv=:dateReserv
             WHERE id=:id");
            return $req->execute([
                "codeDoc" => $res->CodeDoc(),
                "codeMembre" => $res->CodeMembre(),
                "dateReserv" => $res->DateReserv(),
                "id" => $id
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function validerReservation($id){
        try {           
            $req = $this->db->prepare("UPDATE `reservation` 
            SET statut=1
             WHERE id=:id");
            return $req->execute([
                "id" => $id
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function removeReservation($id){
        try {           
            $req = $this->db->prepare("DELETE FROM `reservation` WHERE id=:id");
            return $req->execute([
                "id" => $id
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function addPret(Pret $p){
        try {           
            $req = $this->db->prepare("INSERT INTO `pret` 
            VALUES(null, :codeMembre,:codeDoc,:datePret,:dateRetour, 0)");
            return $req->execute([
                "codeDoc" => $p->CodeDoc(),
                "codeMembre" => $p->CodeMembre(),
                "datePret" => $p->DatePret(),
                "dateRetour" => $p->DateRetour()
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function editPret(Pret $p, $id){
        try {           
            $req = $this->db->prepare("UPDATE `pret` 
            SET codeMembre:codeMembre,codeDoc=:codeDoc, datePret=:datePret, dateRetour=:dateRetour
            WHERE id=:id");
            return $req->execute([
                "codeDoc" => $p->CodeDoc(),
                "codeMembre" => $p->CodeMembre(),
                "datePret" => $p->DatePret(),
                "dateRetour" => $p->DateRetour(),
                "id" => $id
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function retourPret($id){
        try {           
            $req = $this->db->prepare("UPDATE `pret` 
            SET retour=1
            WHERE id=:id");
            return $req->execute([
                "id" => $id
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }

    public function removePret($id){
        try {           
            $req = $this->db->prepare("DELETE FROM `pret` WHERE id=:id");
            return $req->execute([
                "id" => $id
            ]);

        } catch (\PDOException $th) {
            die("Erreur :".$th->getMessage());
        }
    }
}
