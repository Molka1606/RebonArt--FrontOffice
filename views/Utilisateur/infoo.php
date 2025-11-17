<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: signIn.html");
    exit;
}

$user = $_SESSION['user'];

$userMenuContent = '';

if (isset($_SESSION['user'])) {
    $nom = $_SESSION['user']['nom'];
    $prenom = $_SESSION['user']['prenom'];

    $userMenuContent = '
        <a href="#" onclick="return false;">'.$nom.' '.$prenom.'</a>
        <ul class="listee">
            <li><a href="views/Utilisateur/infoo.php">Profil</a></li>
            <li><a href="views/Utilisateur/logout.php">Déconnexion</a></li>
        </ul>
    ';
} else {
    $userMenuContent = '<a href="views/Utilisateur/signIn.html">Se connecter</a>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
    <title>RebornArt - FrontOffice</title>

    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="../../assets/css/animated.css">
    <link rel="stylesheet" href="../../assets/css/owl.css">
    <link rel="stylesheet" href="css/signup.css">
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>
<body>
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <a href="index.html" class="logo">
              <h4>Reborn<span>Art</span></h4>
            </a>
*
            <ul class="nav">
                <li class="scroll-to-section"><a href="#top" class="active">Accueil</a></li>
                <li class="scroll-to-section"><a href="#about">A propos nous</a></li>
                <li class="scroll-to-section"><a href="#portfolio">Creations</a></li>
                <li class="scroll-to-section"><a href="#blog">Blog</a></li> 

                <li class="scroll-to-section" id="userMenu"><?= $userMenuContent ?>
                </li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

<div class="profile-container">

    <div class="left-card">
      <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="photo">
      <h4>Mon Profil</h4>
      <form method="GET" action="deleteuser.php" onsubmit="return confirm('Voulez-vous vraiment supprimer votre compte ?');">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <button type="submit" class="btn-main">Supprimer</button>
      </form>

    </div>

    <div class="right-card">
      <h2>Profil</h2>

  <form method="POST" action="updateUser.php">
    <div class="row">
        <div class="col-md-6">
            <label>Nom</label>
            <input type="text" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>">
        </div>
        <div class="col-md-6">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>">
        </div>
        <div class="col-md-6">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
        </div>

    </div>

    <button type="submit" class="btn-main">Modifier</button>
    
</form>

    </div>
</div>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>Copyright RebornArt 2025. All Rights Reserved. 
        </div>
      </div>
    </div>
  </footer>
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/owl-carousel.js"></script>
  <script src="../../assets/js/animation.js"></script>
  <script src="../../assets/js/imagesloaded.js"></script>
  <script src="../../assets/js/templatemo-custom.js"></script>

</body>
</html>
