<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Gestion de la session utilisateur, redirections et cookies
 * Date : 18/10/2026
 */


session_start();

// Si $_SESSION['login'] n'existe pas, redirection vers login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$login = htmlspecialchars($_SESSION['login']);

$message_cookie = "";
if (isset($_COOKIE['cookie_json'])) {
    $donnees = json_decode($_COOKIE['cookie_json'], true);
    if ($donnees) {
        $message_cookie = "Dernière connexion enregistrée via cookie : " . $donnees['date'];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h2>Bienvenue, <?php echo $login; ?> !</h2>
    
    <?php if ($message_cookie): ?>
        <p><em><?php echo $message_cookie; ?></em></p>
    <?php endif; ?>

    <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>

<?php
$date_fin = new DateTime('2027-01-31');
$aujourdhui = new DateTime();
$intervalle = $aujourdhui->diff($date_fin);

echo "<h3>Jours restants avant la fin du semestre</h3>";
echo "<p>Il reste <strong>" . $intervalle->format('%a') . "</strong> jours.</p>";


echo "<h3>Validation de date avec checkdate()</h3>";
$jour = 31;
$mois = 2;
$annee = 2026;

if (checkdate($mois, $jour, $annee)) {
    echo "<p>La date $jour/$mois/$annee est valide.</p>";
} else {
    echo "<p style='color: red;'>La date $jour/$mois/$annee n'est PAS valide (le 31 février n'existe pas).</p>";
}
?>