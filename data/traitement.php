<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Validation des formulaires POST et enregistrement des données dans notes.csv
 * Date : 18/10/2026
 */


require '../config.php';

// Vérification avec isset() et empty() que les champs existent et ne sont pas vides
if (isset($_POST['nom'], $_POST['note_info'],$_POST['note_math']) && 
    !empty(trim($_POST['nom'])) && 
    is_numeric($_POST['note_info']) && 
    is_numeric($_POST['note_math'])) {

    // Protection de l'affichage avec htmlspecialchars()
    $nom = htmlspecialchars($_POST['nom']);
    $note_info = (float) $_POST['note_info'];
    $note_math = (float) $_POST['note_math'];

    // Vérification que les notes sont comprises entre NOTE_MIN et NOTE_MAX
    if ($note_info >= NOTE_MIN && $note_info <= NOTE_MAX && 
        $note_math >= NOTE_MIN && $note_math <= NOTE_MAX) {
        
        $moyenne = ($note_info + $note_math) / 2;

        echo "<h3>Récapitulatif :</h3>";
        echo "<p>Nom : $nom</p>";
        echo "<p>Note Info : $note_info</p>";
        echo "<p>Note Math : $note_math</p>";
        echo "<p>Moyenne générale : $moyenne</p>";

    } else {
        echo "<p style='color: red;'>Erreur : Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
    }

} else {
    echo "<p style='color: red;'>Erreur : Veuillez remplir tous les champs correctement.</p>";
}

/* 
   Réponses aux questions :
   
   - Pourquoi préférer POST à GET pour un mot de passe ?
     Parce que la méthode POST transmet les données de manière invisible dans le corps de la requête HTTP, 
     contrairement à GET où les données s'affichent en clair dans l'URL.
     
   - Que contient `$_REQUEST` ?
     Il contient les données combinées des tableaux globaux `$_GET`, `$_POST` et `$_COOKIE`.
*/

// 1. Ouvrir le fichier en mode ajout ("a")
$fp = fopen('notes.csv', 'a'); //

if ($fp) {
    // Préparation de l'enregistrement sous forme de tableau
    $ligne = [$nom, $note_info, $note_math, $moyenne, mention($moyenne)];
    
    // 2. Écrire l'enregistrement avec fputcsv() (séparateur ';')
    fputcsv($fp, $ligne, ';'); //
    
    // 3. Fermer le fichier avec fclose()
    fclose($fp);
}

?>