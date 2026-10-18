<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Exercices 3.1 à 3.5 - Manipulations et tris des tableaux associatifs et indexés
 * Date : 18/10/2026
 */


require '../config.php';
include '../includes/entete_inc.php';
include '../includes/menu_inc.php';


<?php
require '../config.php';

if (!function_exists('mention')) {
    function mention($note) {
        if ($note >= 16) return "Très bien";
        elseif ($note >= 14) return "Bien";
        elseif ($note >= 12) return "Assez bien";
        elseif ($note >= SEUIL) return "Passable";
        else return "Ajourné";
    }
}

// --- Exercice 3.1 : Création

// Déclaration du tableau associatif $notes
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

echo "<h3>Exercice 3.1 : Tableau indexé \$modules</h3>";
echo "<p><strong>Affichage avec foreach :</strong></p>";
foreach ($modules as$mod) {
    echo "- $mod<br>";
}

echo "<p><strong>Affichage en accédant par leur indice :</strong></p>";
echo "Module 0 : " . $modules[0] . "<br>";
echo "Module 1 : " . $modules[1] . "<br>";
echo "Module 2 : " . $modules[2] . "<br>";


// --- Exercice 3.2 : Affichage HTML

echo "<h3>Exercice 3.2 : Table HTML des notes</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

// Utilisation de foreach ($notes as $nom => $note)
foreach ($notes as $nom => $note) {
    $mention_val = mention($note);
    $style = ($note < SEUIL) ? "style='color: red; font-weight: bold;'" : "";
    
    echo "<tr $style>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>$mention_val</td>";
    echo "</tr>";
}
echo "</table>";

// --- Exercice 3.3 : Statistiques

echo "<h3>Exercice 3.3 : Statistiques</h3>";

// 1. Sans utiliser array_sum(), calcul avec une boucle
$somme = 0;
$compteur = 0;
$meilleure_note = -1;
$pire_note = 21;

foreach ($notes as $note) {
    $somme += $note;
    $compteur++;
    if ($note > $meilleure_note) {$meilleure_note = $note;
    }
    if ($note < $pire_note) {$pire_note = $note;
    }
}
$moyenne = $somme / $compteur;

echo "<p><strong>Sans fonctions prédéfinies :</strong> Somme = $somme, Moyenne =$moyenne, Meilleure note = $meilleure_note, Plus faible note =$pire_note</p>";

// 2. Vérification avec array_sum, count, max, min
$v_somme = array_sum($notes);
$v_count = count($notes);
$v_moyenne = $v_somme / $v_count;
$v_max = max($notes);
$v_min = min($notes);

echo "<p><strong>Vérification avec fonctions prédéfinies :</strong> Somme = $v_somme, Moyenne =$v_moyenne, Max = $v_max, Min =$v_min</p>";

// 3. Tableau associatif $effectifs donnant le nombre d'apprenants par mention
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}

echo "<p><strong>Effectifs par mention :</strong></p>";
foreach ($effectifs as $mention_nom =>$nb) {
    echo "- $mention_nom :$nb apprenant(s)<br>";
}

// --- Exercice 3.4 : Tri 

echo "<h3>Exercice 3.4 : Tri des notes</h3>";

// Factorisation de l'affichage dans une fonction afficher($tab)
function afficher($tab) {
    echo "<ul>";
    foreach ($tab as$nom => $note) {
        echo "<li>$nom : $note</li>";
    }
    echo "</ul>";
}

// 1. Tableau trié par noms croissants (ksort)
echo "<p><strong>1. Tri par noms croissants (ksort) :</strong></p>";
$t1 = $notes;
ksort($t1);
afficher($t1);

// 2. Tableau trié par notes décroissantes (arsort)
echo "<p><strong>2. Tri par notes décroissantes (arsort) :</strong></p>";
$t2 = $notes;
arsort($t2);
afficher($t2);

// 3. Tableau trié par noms décroissants (krsort)
echo "<p><strong>3. Tri par noms décroissants (krsort) :</strong></p>";
$t3 = $notes;
krsort($t3);
afficher($t3);

// 4. Tableau trié par notes croissantes (asort)
echo "<p><strong>4. Tri par notes croissantes (asort) :</strong></p>";
$t4 = $notes;
asort($t4);
afficher($t4);

/*
   Question : quelle fonction de tri utiliser sur un tableau indexé comme $modules ?[cite: 13]
   - On utilise `sort()` (pour un tri croissant) ou `rsort()` (pour un tri décroissant) 
     car ce sont des tableaux indexés numériquement et non associatifs.
*/

// --- Exercice 3.5 : Opérateurs de tableaux

echo "<h3>Exercice 3.5 : Opérateurs de tableaux</h3>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<p><strong>\$a + \$b :</strong></p>";
var_dump($a +$b);

echo "<p><strong>\$a == \$b :</strong></p>";
var_dump($a ==$b); 

echo "<p><strong>\$a === \$b :</strong></p>";
var_dump($a ===$b); 

/*
   Explication des différences :
   - `+` (Union) : Concatène deux tableaux en préservant les clés du premier et en y ajoutant celles du second qui n'existent pas encore.
   - `==` (Égalité) : Retourne true si les deux tableaux ont les mêmes paires clé/valeur (l'ordre des clés n'influence pas le résultat).
   - `===` (Identité) : Retourne true si les deux tableaux ont les mêmes paires clé/valeur, dans le *même ordre* et de *mêmes types*.
*/

include '../includes/pied_inc.php';
?>