<?php
session_start();

require_once __DIR__ . '/../../Controller/userController.php';
require_once __DIR__ . '/../../Model/Utilisateur.php';

if(!isset($_SESSION['user'])){
    header("Location: signIn.html");
    exit;
}

$userSession = $_SESSION['user'];
$controller = new userController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = !empty($_POST['nom']) ? $_POST['nom'] : $userSession['nom'];
    $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : $userSession['prenom'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $userSession['email'];
    
    $updatedUser = new User(
        $userSession['id'],
        $nom,
        $prenom,
        $email,
        $userSession['motdepasse'],    
        $userSession['cmotdepasse']    
    );

    $controller->updateUser($updatedUser);

    $_SESSION['user'] = [
        'id' => $updatedUser->getId(),
        'nom' => $updatedUser->getNom(),
        'prenom' => $updatedUser->getPrenom(),
        'email' => $updatedUser->getEmail()
    ];

    header("Location: infoo.php");
    exit;
}


?>
