<?php
// login.php
session_start();

$servername= "localhost";
$username= "root";
$password= "";
$dbname= "gestion_d_stock";

$errors = [];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $pass  = $_POST['mot_de_pass'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pass, $user['mot_de_pass'])) {

            $_SESSION['id']   = $user['id'];
            $_SESSION['nom']  = $user['nom'];
            $_SESSION['role'] = $user['role'];

            session_regenerate_id(true);

            if ($user['role'] === 'admin') {
                header("Location: admin.php");
                exit;
            } else {
                header("Location: client.php");
                exit;
            }

        } else {
            $errors[] = "Email ou mot de passe invalide.";
        }
    }

} catch(PDOException $e) {
    $errors[] = "Erreur : " . $e->getMessage();
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Connexion</title>

  <link rel="stylesheet" href="/clickra/style.css">
  <link rel="stylesheet" href="/clickra/login/style.css">


  <!-- Fonts + Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">


</head>

<body>

<!-- FIXED HEADER INCLUDE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clickra/includes/header.php"; ?>

<main class="container auth-page">
  <form method="POST" class="auth-card">
    <h2>Connexion</h2>

    <?php if (!empty($errors)): ?>
      <div class="error">
        <?php foreach($errors as $err) echo "<p>$err</p>"; ?>
      </div>
    <?php endif; ?>

    <label>Email
      <input type="email" name="email" required
             value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    </label>

    <label>Mot de passe
      <input type="password" name="mot_de_pass" required>
    </label>

    <button type="submit" class="btn">Se connecter</button>

    <p class="muted">Pas de compte ?
       <a href="register.php">S'inscrire</a>
    </p>

  </form>
</main>

</body>
</html>