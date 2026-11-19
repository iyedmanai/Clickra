<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id'])) { header('Location: /clickra/auth/login.php'); exit; }
$stmt = $conn->prepare('SELECT * FROM commande WHERE id_client = ? ORDER BY id_cmd DESC');
$stmt->execute([$_SESSION['id']]);
$cmds = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Historique</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Historique des commandes</h1><?php if(!$cmds) echo '<p>Aucune commande.</p>'; else: ?><table style="width:100%; border-collapse:collapse;"><tr><th>ID</th><th>Date</th><th>Total</th></tr><?php foreach($cmds as $c): ?><tr style="border-top:1px solid #eee;"><td><?= $c['id_cmd'] ?></td><td><?= $c['date'] ?></td><td><?= $c['total'] ?> dt</td></tr><?php endforeach; ?></table><?php endif; ?></main></body></html>