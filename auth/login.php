<?php
session_start();
require_once __DIR__ . '/../includes/db.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['mot_de_pass'] ?? '';
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($pass, $user['mot_de_pass'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['role'] = $user['role'];
        session_regenerate_id(true);
        if ($user['role'] === 'admin') header('Location: /clickra/admin/admin.php'); else header('Location: /clickra/client/client.php');
        exit;
    } else {
        $errors[] = 'Email ou mot de passe invalide.';
    }
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"/><title>Login</title><link rel="stylesheet" href="/clickra/style.css" /></head><body>
<?php include __DIR__ . '/../includes/header.php'; ?>
<main class="container auth-page">
  <form method="POST" class="auth-card">
    <h2>Connexion</h2>
    <?php if (!empty($errors)): ?><div class="error"><?php foreach($errors as $e) echo "<p>$e</p>"; ?></div><?php endif; ?>
    <label>Email<input type="email" name="email" required /></label>
    <label>Mot de passe<input type="password" name="mot_de_pass" required /></label>
    <button type="submit" class="btn">Se connecter</button>
    <p class="muted">Pas de compte ? <a href="register.php">S'inscrire</a></p>
  </form>
</main></body></html>
