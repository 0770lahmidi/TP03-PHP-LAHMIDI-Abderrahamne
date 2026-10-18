<?php
require '../config.php';

if (isset($_GET['nom'], $_GET['prenom'],$_GET['sexe'])) {
    // Protection contre les failles XSS avec htmlspecialchars()
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $sexe =$_GET['sexe'];

    if ($sexe === 'M') {
        echo "<h3>Bonjour Monsieur $prenom$nom</h3>";
    } else {
        echo "<h3>Bonjour Madame $prenom$nom</h3>";
    }
} else {
    echo "<p>Veuillez remplir le formulaire.</p>";
}

/*
   Observation de l'URL après l'envoi :
   Les données saisies apparaissent en clair dans la barre d'adresse du navigateur (ex: `?nom=...&prenom=...&sexe=M`).
*/
?>