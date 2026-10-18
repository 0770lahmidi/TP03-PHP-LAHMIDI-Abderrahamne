<?php
require '../config.php';
include '../includes/entete_inc.php';
include '../includes/menu_inc.php';

echo "<h3>Exercice 5.4 : Sérialisation et JSON</h3>";

// 1. Construire un tableau associatif des résultats (nom, notes, moyenne)
$resultats = [ 
    "etudiant" => "Abderrahamane",
    "notes" => [14, 16, 15],
    "moyenne" => 15
];

// 2. Écrire dans data/notes.json avec json_encode() et file_put_contents()
$json_data = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('notes.json', $json_data);
echo "<p>Fichier JSON généré avec succès !</p>";

// 3. Relire avec file_get_contents() puis json_decode($json, true) et afficher avec print_r()$json_lu = file_get_contents('notes.json'); 
$tableau_decode = json_decode($json_lu, true); 

echo "<p><strong>Affichage avec print_r() après json_decode :</strong></p>"; 
echo "<pre>";
print_r($tableau_decode);
echo "</pre>";

// 4. Comparer le résultat de serialize() et de json_encode() sur le même tableau
$donnees_serialisees = serialize($resultats);
echo "<p><strong>Résultat de serialize() :</strong><br>" . htmlspecialchars($donnees_serialisees) . "</p>";
echo "<p><strong>Résultat de json_encode() :</strong><br>" . htmlspecialchars($json_data) . "</p>";

/*
   Question : lequel de ces formats est directement exploitable par une application JavaScript ?
   - C'est le format **JSON** (`json_encode()`) qui est directement exploitable par JavaScript (via `JSON.parse()`), 
     car `serialize()` est un format propre à PHP et ne peut pas être lu nativement par d'autres langages.
*/

include '../includes/pied_inc.php';
?>