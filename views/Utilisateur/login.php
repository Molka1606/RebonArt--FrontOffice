<?php
session_start();

require_once __DIR__ . '/../../controller/userController.php';
require_once __DIR__ . '/../../model/Utilisateur.php';

$controller = new userController();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $user = $controller->login($email, $motdepasse);

    if($user){
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'email' => $user['email']
        ];

        echo "<script>
            localStorage.setItem('user', JSON.stringify(".json_encode($_SESSION['user'])."));
            window.location.href='../../index.html';
        </script>";
        exit;
    } else {
        echo "<script>alert('Email ou mot de passe incorrect'); window.location.href='signIn.html';</script>";
    }
}

$userMenuContent = '';
if (isset($_SESSION['user'])) {
    $nom = htmlspecialchars($_SESSION['user']['nom']);
    $prenom = htmlspecialchars($_SESSION['user']['prenom']);
    
    $userMenuContent = '
        <a href="#" onclick="return false;">'.$nom.' '.$prenom.'</a>
        <ul class="listee">
            <div class="user-avatar">👤</div>
            <li><a href="php/infoo.php">Profil</a></li>
            <li><a href="php/logout.php">Déconnexion</a></li>
        </ul>
    ';
} else {
    $userMenuContent = '<a href="signIn.html">Se connecter</a>';
}
?>
