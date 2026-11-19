<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['mot_de_pass'] ?? '';
    $role = $_POST['role'] ?? 'client';
    if (!$nom) $errors[] = 'Le nom est requis.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email invalide.';
    if (strlen($pass) < 6) $errors[] = 'Le mot de passe doit contenir au moins 6 caractères.';
    if (!in_array($role, ['admin','client'])) $errors[] = 'Rôle invalide.';
    $stmt = $conn->prepare('SELECT id FROM utilisateur WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) $errors[] = 'Cet e-mail existe déjà.';
    if (empty($errors)) {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('INSERT INTO utilisateur (nom, email, mot_de_pass, role) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nom, $email, $hash, $role]);
        $_SESSION['id'] = $conn->lastInsertId();
        $_SESSION['nom'] = $nom;
        $_SESSION['role'] = $role;
        session_regenerate_id(true);
        if ($role === 'admin') header('Location: /clickra/admin/admin.php'); else header('Location: /clickra/client/client.php');
        exit;
    }
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Register</title><link rel="stylesheet" href="/clickra/style.css" /></head><body>
<?php include __DIR__ . '/../includes/header.php'; ?>
<main class="container auth-page">
  <form method="POST" class="auth-card">
    <h2>Créer un compte</h2>
    <?php if (!empty($errors)): ?><div class="error"><?php foreach($errors as $e) echo "<p>$e</p>"; ?></div><?php endif; ?>
    <label>Nom complet<input type="text" name="nom" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" /></label>
    <label>Email<input type="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" /></label>
    <label>Mot de passe<input type="password" name="mot_de_pass" required minlength="6" /></label>
    <label>Choisir un rôle<select name="role" required><option value="client">Client</option><option value="admin">Admin</option></select></label>
    <button type="submit" class="btn">S'inscrire</button>
    <p class="muted">Déjà un compte ? <a href="login.php">Se connecter</a></p>
  </form>
</main></body></html>
