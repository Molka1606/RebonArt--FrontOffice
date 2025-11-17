<?php 
require __DIR__. "/../model/config.php";
require __DIR__. "/../model/Utilisateur.php";

class userController {

    function getAllUser(){
        $sql="SELECT * FROM User";
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
        catch(Exception $e){
            echo ("erreur ".$e->getMessage());
        }
    }

    function Adduser($User){
        $sql = "INSERT INTO User (id, nom, prenom, email, motdepasse, cmotdepasse)
            VALUES (NULL, :nom, :prenom, :email, :motdepasse, :cmotdepasse)";
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue('nom',$User->getNom());
            $query->bindValue('prenom',$User->getPrenom());
            $query->bindValue('email',$User->getEmail());
            $query->bindValue('motdepasse',$User->getMotdepasse());
            $query->bindValue('cmotdepasse',$User->getCmotdepasse());
            $query->execute();
        }
        catch(Exception $e){
            echo ("erreur ".$e->getMessage());
        }
    }
        function login($email, $motdepasse){
        $sql = "SELECT * FROM User WHERE email = :email AND motdepasse = :motdepasse";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':email', $email);
            $query->bindValue(':motdepasse', $motdepasse);
            $query->execute();
            return $query->fetch();
        } catch(Exception $e) {
            echo "Erreur : ".$e->getMessage();
            return false;
        }
    }
  public function updateUser($user){
    $db = config::getConnexion();
    $sql = "UPDATE User 
            SET nom = :nom, prenom = :prenom, email = :email
            WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':nom' => $user->getNom(),
        ':prenom' => $user->getPrenom(),
        ':email' => $user->getEmail(),
        ':id' => $user->getId()
    ]);
}


    public function getUserById($id){
        $db = config::getConnexion();
        $sql = "SELECT * FROM User WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data){
            return new User($data['id'], $data['nom'], $data['prenom'], $data['email'], $data['motdepasse'], $data['cmotdepasse']);
        }
        return null;
    }
public function deleteUser($id){
    $sql="DELETE FROM User WHERE id=:id"; 
    $db=config::getConnexion();
    $query=$db->prepare($sql);
    try{
        $query->execute([
            ':id'=>$id, 
        ]);
    }
    catch(Exception $e){
        echo "Erreur : ".$e->getMessage();
    }
}

}
?>



