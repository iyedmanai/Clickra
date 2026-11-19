<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (empty($_SESSION['id']) || $_SESSION['role'] !== 'admin') { header('Location: /clickra/auth/login.php'); exit; }
$stmt = $conn->query('SELECT id, nom, email, role FROM utilisateur ORDER BY id DESC'); $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Utilisateurs</title><link rel="stylesheet" href="/clickra/style.css" /></head><body><?php include __DIR__ . '/../includes/header.php'; ?><main class="container"><h1>Utilisateurs</h1><table style="width:100%; border-collapse:collapse;"><tr><th>ID</th><th>Nom</th><th>Email</th><th>Role</th></tr><?php foreach($users as $u): ?><tr style="border-top:1px solid #eee;"><td><?= $u['id'] ?></td><td><?= htmlspecialchars($u['nom']) ?></td><td><?= htmlspecialchars($u['email']) ?></td><td><?= $u['role'] ?></td></tr><?php endforeach; ?></table></main></body></html>