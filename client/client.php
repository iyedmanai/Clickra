<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'client') { header('Location: /clickra/auth/login.php'); exit; }
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Client</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Espace Client</h1><p>Bonjour, <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong></p><div class="dashboard-box"><a class="btn" href="/clickra/client/panier.php">Voir mon panier</a><a class="btn" href="/clickra/client/historique.php">Historique des commandes</a><a class="btn" href="/clickra/client/profile.php">Modifier profil</a></div></main></body></html>