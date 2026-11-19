<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'admin') { header('Location: /clickra/auth/login.php'); exit; }
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? ''); $desc = trim($_POST['description'] ?? ''); $prix = floatval($_POST['prix'] ?? 0); $quant = intval($_POST['quantite'] ?? 0);
    if(!$nom) $errors[] = 'Nom requis';
    if(empty($errors)) { $stmt = $conn->prepare('INSERT INTO produit (nom_pdt, description_pdt, prix, quantite) VALUES (?, ?, ?, ?)'); $stmt->execute([$nom, $desc, $prix, $quant]); header('Location: produits.php'); exit; }
}
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Ajouter produit</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Ajouter produit</h1><?php if($errors): ?><div class="error"><?php foreach($errors as $e) echo "<p>$e</p>"; ?></div><?php endif; ?><form method="POST"><label>Nom <input name="nom" required/></label><label>Description <textarea name="description"></textarea></label><label>Prix <input name="prix" type="number" step="0.01" required/></label><label>Quantité <input name="quantite" type="number" required/></label><button class="btn" type="submit">Ajouter</button></form></main></body></html>