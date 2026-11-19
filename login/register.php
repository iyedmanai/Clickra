<?php
// register.php
session_start();

// DB config - if you want create a single db include like includes/db.php later
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "gestion_d_stock";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass = $_POST['mot_de_pass'] ?? '';
        $role = 'client'; // default role

        if (!$nom) $errors[] = "Le nom est requis.";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
        if (strlen($pass) < 6) $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";

        // check existing email
        $stmt = $conn->prepare("SELECT id FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) $errors[] = "Cet e-mail existe déjà.";

        if (empty($errors)) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO utilisateur (nom, email, mot_de_pass, role) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nom, $email, $hash, $role]);

            // log the user in
            $id = $conn->lastInsertId();
            $_SESSION['id'] = $id;
            $_SESSION['nom'] = $nom;
            $_SESSION['role'] = $role;

            // regenerate session id for security
            session_regenerate_id(true);

            header("Location: client.php");
            exit;
        }
    }

} catch (PDOException $e) {
    $errors[] = "Erreur base de données: " . $e->getMessage();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register</title>
  
  <link rel="stylesheet" href="/clickra/style.css">
  <link rel="stylesheet" href="/clickra/login/style.css">
        
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="../image/clickra_transparent-.png">


</head>
<body>
<?php include 'C:\xampp\htdocs\clickra\includes\header.php'; ?>

<main class="container auth-page">
  <form method="POST" class="auth-card">
    <h2>Créer un compte</h2>

    <?php if (!empty($errors)): ?>
      <div class="error">
        <?php foreach($errors as $err) echo "<p>$err</p>"; ?>
      </div>
    <?php endif; ?>

    <label>Nom complet
      <input type="text" name="nom" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" />
    </label>
    <label>Email
      <input type="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
    </label>
    <label>Mot de passe
      <input type="password" name="mot_de_pass" required minlength="6" />
    </label>

    <button type="submit" class="btn">S'inscrire</button>

    <p class="muted">Déjà un compte ? <a href="login.php">Se connecter</a></p>
  </form>
</main>

</body>
</html>
