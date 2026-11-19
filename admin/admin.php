<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header('Location: /clickra/auth/login.php');
    exit;
}
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Admin</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Admin Dashboard</h1><p>Bienvenue, <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong></p><div class="dashboard-box"><a class="btn" href="produits.php">Gérer les produits</a><a class="btn" href="utilisateurs.php">Gérer les utilisateurs</a><a class="btn" href="commandes.php">Voir commandes</a><a class="btn" href="statistiques.php">Statistiques</a></div></main></body></html>