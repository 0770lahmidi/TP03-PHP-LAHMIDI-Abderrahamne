<?php
/**
 * Auteur : LAHMIDI Abderrahamane
 * Objectif : Gestion de la session utilisateur, redirections et cookies
 * Date : 18/10/2026
 */


session_start();

// Vider les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers login.php
header("Location: login.php");
exit;
?>