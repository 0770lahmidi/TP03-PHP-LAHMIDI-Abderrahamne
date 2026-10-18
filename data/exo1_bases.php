<?php echo 'Hello PHP'; ?>
<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Exercices 1.1 à 1.5 - Variables, constantes, calculs, types et chaînes de caractères
 * Date : 18/10/2026
 */


// 1. Commentaire sur une ligne avec //
# 2. Un autre commentaire sur une ligne avec #

/* 
   3. Un commentaire sur 
      plusieurs lignes 
      avec /* ... */

?>

<?php
// Exercice 1.1 : Noms de variables

/* 
   Justification de la validité :
   - $x      : VALIDE (commence par une lettre)
   - $_x     : VALIDE (commence par un underscore)
   - $2x     : INVALIDE (ne peut pas commencer par un chiffre après le dollar)
   - $x-y    : INVALIDE (contient un tiret '-', interdit)
   - $Prix_HT: VALIDE (lettres, chiffres et underscore)
   - $prix ht: INVALIDE (contient un espace, interdit)
   - $état   : VALIDE (caractères accentués acceptés en PHP)
*/

// Déclaration uniquement des variables valides :
$x = 10;
$_x = 20;
$Prix_HT = 150.50;
$état = "Actif";

// Démonstration que $a et $A sont deux variables distinctes (Sensibilité à la casse / Case-sensitive) :
$a = "Valeur de la variable en minuscule : a";
$A = "Valeur de la variable en majuscule : A";

// Affichage pour prouver qu'elles sont différentes :
echo "<p>" . $a . "</p>";
echo "<p>" . $A . "</p>";

?>

<?php
// --- Exercice 1.2 : Inclusion et Test des Constantes//
require '../config.php';

echo "<p>Établissement : " . ETABLISSEMENT . "</p>";
echo "<p>Note Minimale : " . NOTE_MIN . "</p>";
echo "<p>Note Maximale : " . NOTE_MAX . "</p>";
echo "<p>Seuil : " . SEUIL . "</p>";

if (defined('SEUIL')) {
    echo "<p>La constante SEUIL est bien définie.</p>";
}
if (defined('INCONNUE')) {
    echo "<p>La constante INCONNUE est définie.</p>";
} else {
    echo "<p>La constante INCONNUE n'est PAS définie.</p>";
}

/* 
   Réponses aux questions (en commentaire) :
   
   - Que se passe-t-il si vous affichez une constante non définie ?
     PHP génère un avertissement (Warning: Undefined constant) et affiche 
     le nom de la constante sous forme de texte brut.
     
   - Quelle différence y a-t-il entre `const` et `define()` ?
     1. `const` est évaluée au moment de la compilation (compile-time), 
        donc elle doit être déclarée au niveau global et ne peut pas être 
        placée à l'intérieur d'une condition (`if`) ou d'une boucle.
     2. `define()` est évaluée au moment de l'exécution (run-time), ce qui 
        permet de la créer dynamiquement à l'intérieur de blocs de code conditionnels.
*/


// --- Exercice 1.3 : Calcul du Prix TTC ---
$prix_ht = 60;
$tva = 20; 

$prix_ttc =$prix_ht + ($prix_ht * $tva / 100);

echo "<p>Le prix TTC du produit est de " . $prix_ttc . " €.</p>";

?>

<?php
// --- Exercice 1.4 : Types et conversions


$test = 42;
$test = (string) $test;
echo "<p><strong>1. Test cast string :</strong></p>";
var_dump($test);


// 2. Prédictions et vérifications avec (bool)
/* 
   Prédictions :
   - '0'   -> false (chaîne '0' est considérée fausse)
   - 0.0   -> false (zéro décimal)
   - "0"   -> false
   - ""    -> false (chaîne vide)
   - "abc" -> true  (chaîne non vide)
   - []    -> false (tableau vide)
   - null  -> false
*/
echo "<p><strong>2. Conversions en booléen :</strong></p>";
var_dump((bool) '0');
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);


// 3. Prédictions et vérifications des conversions numériques
/*
   Prédictions :
   - (int) 3.9      -> 3 (troncature de la partie décimale)
   - (int) "12abc"  -> 12 (PHP lit les chiffres au début de la chaîne)
   - (float) "1.5e3"-> 1500 (notation scientifique convertie en float)
   - (int) true     -> 1 (true vaut 1 en entier)
*/
echo "<p><strong>3. Conversions numériques :</strong></p>";
var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);


// 4. Le nombre 255 dans différentes notations et affichage
$decimal = 255;     
$hexadecimal = 0xFF; 
$octal = 0377;  
$binaire = 0b11111111; 

echo "<p><strong>4. Représentations du nombre 255 :</strong></p>";
echo "<p>Décimal : " . $decimal . "</p>";
echo "<p>Hexadécimal : " . $hexadecimal . "</p>";
echo "<p>Octal : " . $octal . "</p>";
echo "<p>Binaire : " . $binaire . "</p>";

?>

<?php
// --- Exercice 1.5 : Chaînes de caractères

$traitees = "égales à";
$ici = 2;

// 1. Affichage avec guillemets et apostrophes échappées
echo '<p>1. Ahmed a dit : "J\'ai réussi"</p>';

// 2. Affichage avec antislash pour échapper le backslash du chemin Windows
echo '<p>2. Voulez-vous supprimer C:\*.*?</p>';

// 3. Chaîne avec simple quote pour que \n apparaisse tel quel (non interprété)
echo '<p>3. Ceci n\'affichera pas \n de nouvelle ligne</p>';

// 4. Variables non interprétées (utilisation de simples quotes '')
echo '<p>4. Les variables ne seront pas $traitees $ici</p>';

// 5. Variables interprétées (utilisation de doubles quotes "")
echo "<p>5. Les variables seront $traitees $ici</p>";


// --- Partie suivante : trim() et boucle for 

$texte_brut = '"*Bonjour les développeurs*"';
$texte_propre = trim($texte_brut, '"*');

echo "<p><strong>Chaîne après trim() :</strong> " . $texte_propre . "</p>";

echo "<p><strong>Affichage lettre par lettre :</strong></p>";
for ($i = 0; $i < strlen($texte_propre); $i++) {
    echo $texte_propre[$i] . "<br>";
}

?>