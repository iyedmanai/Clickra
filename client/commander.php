<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id'])) { header('Location: /clickra/auth/login.php'); exit; }
if(empty($_SESSION['panier'])) { header('Location: panier.php'); exit; }
$ids = array_keys($_SESSION['panier']);
$in = implode(',', array_map('intval',$ids));
$stmt = $conn->query("SELECT * FROM produit WHERE id_pdt IN ($in)");
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
foreach($produits as $p) $total += $p['prix'] * $_SESSION['panier'][$p['id_pdt']];
$stmt = $conn->prepare('INSERT INTO commande (id_client, total) VALUES (?, ?)');
$stmt->execute([$_SESSION['id'], $total]);
$id_cmd = $conn->lastInsertId();
foreach($produits as $p) {
    $qty = $_SESSION['panier'][$p['id_pdt']];
    $stmt = $conn->prepare('INSERT INTO ligne_commande (id_cmd, id_pdt, quantite) VALUES (?, ?, ?)');
    $stmt->execute([$id_cmd, $p['id_pdt'], $qty]);
    $stmt = $conn->prepare('UPDATE produit SET quantite = quantite - ? WHERE id_pdt = ?');
    $stmt->execute([$qty, $p['id_pdt']]);
}
unset($_SESSION['panier']);
header('Location: historique.php');
exit;
