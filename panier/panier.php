<?php
session_start();

// Block access if not client
if (!isset($_SESSION['id']) || $_SESSION['role'] !== "client") {
    header("Location: /clickra/login/login.php");
    exit;
}

// Initialize cart if empty
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon panier</title>

    <!-- GLOBAL CSS -->
    <link rel="stylesheet" href="/clickra/style.css">
    <link rel="stylesheet" href="/clickra/panier/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="../image/clickra_transparent-.png">
    
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT']."/clickra/includes/header.php"; ?>

<div class="cart-container">

    <h1>🛒 Mon panier</h1>

    <?php if (empty($_SESSION['panier'])): ?>

        <p>Votre panier est vide.</p>
        <a href="/clickra/shop/shop.php" class="btn-large">Continuer mes achats</a>

    <?php else: ?>

        <?php
        $total = 0;
        foreach ($_SESSION['panier'] as $item):
            $total += $item['prix'] * $item['quantite'];
        ?>
            <div class="cart-item">

                <img src="<?= $item['image'] ?>" alt="Produit">

                <div class="cart-info">
                    <h3><?= htmlspecialchars($item['nom']) ?></h3>
                    <p><?= $item['prix'] ?> dt</p>
                </div>

                <div class="cart-actions">
                    <form action="update_panier.php" method="POST">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        <input type="number" name="quantite" value="<?= $item['quantite'] ?>" min="1" class="qty-input">
                        <button type="submit" class="btn-small">✔</button>
                    </form>

                    <a href="remove_from_panier.php?id=<?= $item['id'] ?>" class="btn-small" style="background:#b00;">
                        🗑
                    </a>

                </div>
            </div>

        <?php endforeach; ?>

        <div class="total-box">
            Total : <?= number_format($total, 2) ?> dt
        </div>

        <div class="cart-buttons">
            <a href="/clickra/shop/shop.php" class="btn-large">← Continuer mes achats</a>
            <a href="checkout.php" class="btn-large">Payer →</a>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
