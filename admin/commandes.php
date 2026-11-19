<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'admin') { header('Location: /clickra/auth/login.php'); exit; }
$stmt = $conn->query('SELECT * FROM commande ORDER BY id_cmd DESC'); $cmds = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Commandes</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Commandes</h1><table style="width:100%; border-collapse:collapse;"><tr><th>ID</th><th>Client</th><th>Date</th><th>Total</th></tr><?php foreach($cmds as $c): ?><tr style="border-top:1px solid #eee;"><td><?= $c['id_cmd'] ?></td><td><?= $c['id_client'] ?></td><td><?= $c['date'] ?></td><td><?= $c['total'] ?> dt</td></tr><?php endforeach; ?></table></main></body></html>