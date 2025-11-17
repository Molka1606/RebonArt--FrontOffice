<?php 
class User {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $motdepasse;
    private $cmotdepasse;

    public function __construct($id, $nom, $prenom, $email, $motdepasse, $cmotdepasse){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
        $this->cmotdepasse = $cmotdepasse;
    }

    public function getId() { return $this->id; }
    public function getNom(){ return $this->nom; }
    public function getPrenom(){ return $this->prenom; }
    public function getEmail(){ return $this->email; }
    public function getMotdepasse(){ return $this->motdepasse; }
    public function getCmotdepasse(){ return $this->cmotdepasse; }

    public function setNom($nom){ $this->nom = $nom; }
    public function setPrenom($prenom){ $this->prenom = $prenom; }
    public function setEmail($email){ $this->email = $email; }
    public function setMotdepasse($mdp){ $this->motdepasse = $mdp; }
    public function setCmotdepasse($cmdp){ $this->cmotdepasse = $cmdp; }


    function saisir($id, $nom, $prenom, $email, $motdepasse, $cmotdepasse){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
        $this->cmotdepasse = $cmotdepasse;
    }

    function afficher(){
        echo 
        "Nom : " . $this->nom . "<br>" .
        "Prénom : " . $this->prenom . "<br>" .
        "Email : " . $this->email . "<br>" .
        "Mot de passe : " . $this->motdepasse . "<br>" .
        "Confirmer le mot de passe : " . $this->cmotdepasse . "<br>";
    }
}


?>