<?php
session_start();

// Protect page: only client
if (!isset($_SESSION['id']) || $_SESSION['role'] !== "client") {
    header("Location: /clickra/login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Client</title>

    <!-- Global CSS -->
    <link rel="stylesheet" href="/clickra/style.css">
    <link rel="stylesheet" href="/clickra/login/style.css">

</head>
<body>

<!-- Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clickra/includes/header.php"; ?>

<main class="container" style="padding-top:50px;">
    <div class="dashboard-wrapper">

        <div class="dashboard-box">

            <a href="/clickra/panier/panier.php" class="btn">🛒 Voir mon panier</a>
            <a href="/clickra/client/orders.php" class="btn">📦 Mes commandes</a>
            <a href="/clickra/client/wishlist.php" class="btn">❤️ Ma liste d’envies</a>
            <a href="/clickra/index.php" class="btn">🏠 Retour au site</a>

        </div>

    </div>
</main>
</body>
</html>

