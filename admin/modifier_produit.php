<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'admin') { header('Location: /clickra/auth/login.php'); exit; }
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare('SELECT * FROM produit WHERE id_pdt = ?'); $stmt->execute([$id]); $product = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$product) { header('Location: produits.php'); exit; }
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? ''); $desc = trim($_POST['description'] ?? ''); $prix = floatval($_POST['prix'] ?? 0); $quant = intval($_POST['quantite'] ?? 0);
    if(!$nom) $errors[] = 'Nom requis';
    if(empty($errors)) { $stmt = $conn->prepare('UPDATE produit SET nom_pdt=?, description_pdt=?, prix=?, quantite=? WHERE id_pdt=?'); $stmt->execute([$nom,$desc,$prix,$quant,$id]); header('Location: produits.php'); exit; }
}
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Modifier produit</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Modifier produit</h1><?php if($errors): ?><div class="error"><?php foreach($errors as $e) echo "<p>$e</p>"; ?></div><?php endif; ?><form method="POST"><label>Nom <input name="nom" required value="<?= htmlspecialchars($product['nom_pdt']) ?>"/></label><label>Description <textarea name="description"><?= htmlspecialchars($product['description_pdt']) ?></textarea></label><label>Prix <input name="prix" type="number" step="0.01" required value="<?= $product['prix'] ?>"/></label><label>Quantité <input name="quantite" type="number" required value="<?= $product['quantite'] ?>"/></label><button class="btn" type="submit">Enregistrer</button></form></main></body></html>