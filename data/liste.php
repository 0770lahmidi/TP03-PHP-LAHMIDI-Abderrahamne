<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Lecture du fichier notes.csv et affichage sous forme de tableau HTML
 * Date : 18/10/2026
 */


require '../config.php';
include '../includes/entete_inc.php';
include '../includes/menu_inc.php';

echo "<h3>Exercice 5.2 : Lecture d'un fichier CSV</h3>";

$fichier = 'notes.csv';

// 1. Tester l'existence du fichier avec file_exists()
if (!file_exists($fichier)) { //
    echo "<p style='color: red;'>Le fichier des notes n'existe pas encore.</p>";
} else {
    // 2. L'ouvrir en lecture et gérer l'échec d'ouverture
    $fp = fopen($fichier, 'r'); //
    if (!$fp) {
        echo "<p style='color: red;'>Erreur : impossible d'ouvrir le fichier.</p>";
        exit;
    }

    // 4. Affichage du tableau HTML
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";

    $somme_moyennes = 0;
    $nombre_lignes = 0;

    // 3. Lire le fichier ligne par ligne avec fgetcsv() dans une boucle while
    while (($data = fgetcsv($fp, 1000, ';')) !== false) { 
        $nom = htmlspecialchars($data[0]);
        $note_info = $data[1];
        $note_math = $data[2];
        $moyenne = $data[3];
        $mention = isset($data[4]) ? $data [4]: '';

        $somme_moyennes += (float)$moyenne;
        $nombre_lignes++;

        echo "<tr>";
        echo "<td>$nom</td>";
        echo "<td>$note_info</td>";
        echo "<td>$note_math</td>";
        echo "<td><strong>$moyenne</strong></td>";
        echo "<td>$mention</td>";
        echo "</tr>";
    }

    fclose($fp);
    echo "</table>";

    // 5. Afficher la moyenne générale de la classe sous le tableau
    if ($nombre_lignes > 0) {
        $moyenne_generale = $somme_moyennes / $nombre_lignes;
        echo "<p><strong>Moyenne générale de la classe : </strong> " . round($moyenne_generale, 2) . "</p>";
    }
}

include '../includes/pied_inc.php';
?>

<?php
require '../config.php';
include '../includes/entete_inc.php';
include '../includes/menu_inc.php';

echo "<h3>Exercice 5.3 : Lecture bas niveau (fgets & explode)</h3>";

$fichier = 'notes.csv';

if (!file_exists($fichier)) {
    echo "<p style='color: red;'>Le fichier des notes n'existe pas.</p>";
} else {
    $fp = fopen($fichier, 'r');
    
    if ($fp) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><th>Lecture avec fgets() et explode()</th></tr>";

        // Parcourir avec feof() et fgets()
        while (!feof($fp)) {
            $ligne = fgets($fp);
            
            if (!empty(trim($ligne))) {
                // 3. Découper la ligne avec explode()
                $data = explode(';', $ligne);
                
                $nom = htmlspecialchars($data[0]);
                $note_info = isset($data[1]) ? $data[1] : '';
                $note_math = isset($data[2]) ? $data[2] : '';
                $moyenne = isset($data[3]) ? $data[3] : '';

                echo "<tr>";
                echo "<td>Étudiant : <strong>$nom</strong> | Info : $note_info | Math : $note_math | Moyenne : $moyenne</td>";
                echo "</tr>";
            }
        }
        
        fclose($fp);
        echo "</table>";
    }
}

include '../includes/pied_inc.php';
?>