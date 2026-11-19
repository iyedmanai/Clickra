<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id'])) { header('Location: /clickra/auth/login.php'); exit; }
if(!isset($_SESSION['panier'])) $_SESSION['panier'] = [];
$ids = array_keys($_SESSION['panier']);
$produits = []; $total = 0;
if($ids) {
    $in = implode(',', array_map('intval',$ids));
    $stmt = $conn->query("SELECT * FROM produit WHERE id_pdt IN ($in)");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($produits as $p) $total += $p['prix'] * $_SESSION['panier'][$p['id_pdt']];
}
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Panier</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Panier</h1><?php if(empty($produits)): ?><p>Votre panier est vide.</p><?php else: ?><table style="width:100%; border-collapse:collapse;"><tr><th>Produit</th><th>Qty</th><th>Prix</th></tr><?php foreach($produits as $p): ?><tr style="border-top:1px solid #eee;"><td><?= htmlspecialchars($p['nom_pdt']) ?></td><td><?= $_SESSION['panier'][$p['id_pdt']] ?></td><td><?= $p['prix'] ?> dt</td></tr><?php endforeach; ?></table><p>Total: <?= $total ?> dt</p><form method="POST" action="commander.php"><button class="btn">Passer commande</button></form><?php endif; ?></main></body></html>