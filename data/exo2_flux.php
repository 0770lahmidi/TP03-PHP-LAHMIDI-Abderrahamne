<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Exercices 2.1 à 2.3 - Structures de contrôle (if, switch, boucles)
 * Date : 18/10/2026
 */


require '../config.php';

// --- Exercice 2.1 : if / elseif / else

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

echo "<h3>Exercice 2.1 : Mentions</h3>";

$notes_test = [17, 14.5, 12, 10, 7];

foreach ($notes_test as $n) {
    echo "<p>Note : $n -> Mention : " . mention($n) . "</p>";
}

// --- Exercice 2.2 : switch ---

echo "<h3>Exercice 2.2 : Mois de l'année</h3>";

$mois_actuel = date("m");

$nom_mois = "";

switch ($mois_actuel) {
    case "01":
        $nom_mois = "Janvier";
        break;
    case "02":
        $nom_mois = "Février";
        break;
    case "03":
        $nom_mois = "Mars";
        break;
    case "04":
        $nom_mois = "Avril";
        break;
    case "05":
        $nom_mois = "Mai";
        break;
    case "06":
        $nom_mois = "Juin";
        break;
    case "07":
        $nom_mois = "Juillet";
        break;
    case "08":
        $nom_mois = "Août";
        break;
    case "09":
        $nom_mois = "Septembre";
        break;
    case "10":
        $nom_mois = "Octobre";
        break;
    case "11":
        $nom_mois = "Novembre";
        break;
    case "12":
        $nom_mois = "Décembre";
        break;
    default:
        $nom_mois = "Mois inconnu";
        break;
}

echo "<p>Le mois actuel est : <strong>" . $nom_mois . "</strong> (Numéro : " . $mois_actuel . ")</p>";


/* 
   3. Réponse à la question (en commentaire) :
   
   - Que se passe-t-il si vous oubliez un `break` dans un `case` ?
     Si on oublie le `break`, l'exécution continue (on appelle ça le "fall-through") 
     et passe directement au `case` suivant sans tester sa valeur, jusqu'à ce qu'il 
     rencontre un `break` ou la fin du bloc `switch`.
*/

?>

<?php

// --- Exercice 2.3 : Boucles

// --- Question 1 : Triangle avec deux boucles for imbriquées
echo "<h3>1. Triangle d'étoiles</h3>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

// --- Question 2 : Nombres de 0 à 20 par pas de 2 (avec while)
echo "<h3>2. Nombres de 0 à 20 (pas de 2)</h3>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}

// --- Question 3 : Nombres pairs de 0 à 10 (avec for et continue)
echo "<h3>3. Nombres pairs de 0 à 10</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i ";
}

// --- Question 4 : while, switch et break 2 
echo "<h3>4. Boucle while, switch et break 2</h3>";
$k = 0;
while (true) {
    $k++;
    switch ($k) {
        case 5:
            echo "<p>At 5</p>";
            break;
        case 10:
            echo "<p>At 10; quitting</p>";
            break 2;
    }
}

// --- Question 5 : Réécriture de la question 2 avec do-while
echo "<h3>5. Réécriture avec do-while</h3>";
$m = 0;
do {
    if ($m == 10) {
        echo "<strong>$m</strong> ";
    } else {
        echo "$m ";
    }
    $m += 2; } while ($m <= 20);

/* 
   Réponse à la question théorique :
   Quelle est la différence essentielle avec `while` ?
   - `while` évalue la condition *avant* d'exécuter le bloc de code. Si la condition est fausse dès le départ, le code à l'intérieur ne s'exécute jamais.
   - `do-while` exécute le bloc de code *au moins une fois* obligatoirement, car la condition n'est vérifiée qu'à la fin (après l'exécution).
*/

?>