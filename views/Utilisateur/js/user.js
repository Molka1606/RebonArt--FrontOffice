function validerConnexion() {
    var email = document.querySelector("input[type='email']").value;
    var mdp = document.querySelector("input[type='password']").value;

    if(email == ""){
        alert("Veuillez saisir votre email");
        return false;
    }

    if(mdp == ""){
        alert("Veuillez saisir votre mot de passe");
        return false;
    }

    return true; // tout est rempli
}

function validerCompte() {
    var nom = document.querySelector("input[name='nom']").value;
    var email = document.querySelector("input[name='email']").value;
    var dateNaissance = document.querySelector("input[name='date_naissance']").value;
    var tel = document.querySelector("input[name='telephone']").value;

    if(nom == ""){
        alert("Le nom est obligatoire !");
        return false;
    }

    if(email == ""){
        alert("L'email est obligatoire !");
        return false;
    }

    if(dateNaissance == ""){
        alert("La date de naissance est obligatoire !");
        return false;
    }

    if(tel == ""){
        alert("Le contact est obligatoire !");
        return false;
    }

    // Tout est correct
    alert("Formulaire validé !");
    return true;
}

function validerInscription() {
    var nom = document.querySelector("input[placeholder='Nom']").value;
    var prenom = document.querySelector("input[placeholder='Prénom']").value;
    var email = document.querySelector("input[placeholder='Email']").value;
    var mdp = document.querySelector("input[placeholder='Mot de passe']").value;
    var cmdp = document.querySelector("input[placeholder='Confirmer le mot de passe']").value;

    if(nom == ""){
        alert("Le nom est obligatoire !");
        return false;
    }

    if(prenom == ""){
        alert("Le prénom est obligatoire !");
        return false;
    }

    if(email == ""){
        alert("L'email est obligatoire !");
        return false;
    }

    if(mdp == ""){
        alert("Le mot de passe est obligatoire !");
        return false;
    }

    if(cmdp == ""){
        alert("Veuillez confirmer le mot de passe !");
        return false;
    }

    if(mdp !== cmdp){
        alert("Les mots de passe ne correspondent pas !");
        return false;
    }

    alert("Compte créé avec succès !");
    return true;
}

function validerMdpOublie() {
    var mdp = document.getElementById("motdepasse").value;
    var cmdp = document.getElementById("cmotdepasse").value;

    if(mdp == ""){
        alert("Veuillez saisir un nouveau mot de passe !");
        return false;
    }

    if(cmdp == ""){
        alert("Veuillez confirmer votre mot de passe !");
        return false;
    }

    if(mdp !== cmdp){
        alert("Les mots de passe ne correspondent pas !");
        return false;
    }

    alert("Mot de passe mis à jour !");
    return true;
}

function validerChangementMdp() {
    var ancien = document.querySelector("input[name='ancien']").value;
    var nouveau = document.querySelector("input[name='nouveau']").value;
    var confirmer = document.querySelector("input[name='confirmer']").value;

    if(ancien == ""){
        alert("Veuillez saisir l'ancien mot de passe !");
        return false;
    }

    if(nouveau == ""){
        alert("Veuillez saisir le nouveau mot de passe !");
        return false;
    }

    if(confirmer == ""){
        alert("Veuillez confirmer le mot de passe !");
        return false;
    }

    if(nouveau !== confirmer){
        alert("Le nouveau mot de passe et la confirmation ne correspondent pas !");
        return false;
    }

    alert("Mot de passe changé avec succès !");
    return true;
}
