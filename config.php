<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Fichier de configuration globale et définition des constantes du TP
 * Date : 18/10/2026
 */

// Exercice 1.2 : Définition des constantes

const ETABLISSEMENT = "Faculté des Sciences";

define("NOTE_MIN", 0);
define("NOTE_MAX", 20);
define("SEUIL", 10);
?>

//exercive 4.1:
/*
   - Expérience 1 : 
     * `include 'inexistant.php';` génère un simple avertissement (Warning) et le script continue son exécution.
     * `require 'inexistant.php';` génère une erreur fatale (Fatal error) et arrête net l'exécution du script.

   - Expérience 2 : 
     * `include` inclus le fichier à chaque appel (si répété deux fois, le contenu s'affiche deux fois).
     * `include_once` vérifie si le fichier a déjà été inclus ; si oui, il ne l'inclut pas une deuxième fois.
*/