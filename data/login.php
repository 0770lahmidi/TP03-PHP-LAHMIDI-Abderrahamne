<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Gestion de la session utilisateur, redirections et cookies
 * Date : 18/10/2026
 */


// DOIT être la toute première instruction du fichier (avant tout espace ou HTML)
session_start();

// Traitement de la soumission du formulaire en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = trim($_POST['login']);
    
    if (!empty($login)) {
        $_SESSION['login'] = $login;
        
        setcookie("dernier_login", $login, time() + 86400, "/");
        
        $infos_connexion = [
            "login" => $login,
            "date" => date('Y-m-d H:i:s')
        ];
        setcookie("cookie_json", json_encode($infos_connexion), time() + 86400, "/");
        
        // Redirection vers profil.php suivie de exit
        header("Location: profil.php");
        exit;
    }
}

// Pré-remplir le champ login s'il existe dans $_COOKIE
$dernier_login = isset($_COOKIE['dernier_login']) ? htmlspecialchars($_COOKIE['dernier_login']) : '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="login.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" value="<?php echo $dernier_login; ?>" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>