<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'admin') { header('Location: /clickra/auth/login.php'); exit; }
$totalProducts = $conn->query('SELECT COUNT(*) FROM produit')->fetchColumn();
$totalUsers = $conn->query('SELECT COUNT(*) FROM utilisateur')->fetchColumn();
$totalSales = $conn->query('SELECT IFNULL(SUM(total),0) FROM commande')->fetchColumn();
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Statistiques</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Statistiques</h1><ul><li>Total produits: <?= $totalProducts ?></li><li>Total utilisateurs: <?= $totalUsers ?></li><li>Total ventes: <?= $totalSales ?> dt</li></ul></main></body></html>