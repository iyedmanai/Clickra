<?php
session_start();

// Protect page: only admin
if (!isset($_SESSION['id']) || $_SESSION['role'] !== "admin") {
    header("Location: /clickra/login/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- Global CSS files from your project -->
    <link rel="stylesheet" href="/clickra/style.css">
    <link rel="stylesheet" href="/clickra/login/style.css">

</head>

<body>

<!-- HEADER -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/clickra/includes/header.php"; ?>

<main class="container" style="padding-top:50px;">

    <!-- Admin actions -->
    <div class="dashboard-wrapper">
        <div class="dashboard-box">
            <a href="ajouter.php" class="btn">📦 Ajouter / Gérer les produits</a>
            <a href="users.php" class="btn">👥 Gérer les utilisateurs</a>
            <a href="orders.php" class="btn">🛒 Gérer les commandes</a>
            <a href="suppliers.php" class="btn">🏭 Gérer les fournisseurs</a>
            <a href="reports.php" class="btn">📊 Voir les statistiques</a>
            <a href="/clickra/index.php" class="btn">🏠 Retour au site</a>
        </div>
    </div>


</main>

</body>
</html>
