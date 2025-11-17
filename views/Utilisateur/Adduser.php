<?php
require_once __DIR__ . '/../../controller/userController.php';

$userC = new userController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) 
        && !empty($_POST['motdepasse']) && !empty($_POST['cmotdepasse'])) {

        $user = new User(null, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['motdepasse'], $_POST['cmotdepasse']);
        $userC->Adduser($user);

        // Rediriger vers la page de connexion
        header("Location: signIn.html"); // chemin relatif depuis php/
        exit;
    }
}
?>
