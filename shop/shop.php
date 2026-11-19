<?php
session_start();
include "../includes/header.php";
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Men Collection</title>

  <link rel="stylesheet" href="/clickra/style.css">
  <link rel="stylesheet" href="shop.css">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/png" href="../image/clickra_transparent-.png">

  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<section class="men-page">

    <div class="page-header">
        <div class="header-left">
            <h1>TOUT VOIR</h1>
        </div>

        <div class="header-right">
            <label for="sort">Trier par:</label>
            <select id="sort">
                <option value="">--</option>
                <option value="price_low">Prix: bas → haut</option>
                <option value="price_high">Prix: haut → bas</option>
            </select>
        </div>
    </div>

    <div class="product-grid">

        <!-- 1. Black Pull -->
        <div class="product-card">
            <img src="../image/Pulls.png" alt="">
            <h4 class="product-title">Black Pull</h4>
            <p class="product-price">
                <span class="new-price">55 TND</span>
                <span class="old-price">110 TND</span>
            </p>
            <a href="/clickra/panier/add_to_panier.php?id=1&nom=Black Pull&prix=79&image=../image/Pulls.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

        <!-- 2. Stussy Cap -->
        <div class="product-card">
            <img src="../image/Stussy Cap.png" alt="">
            <h4 class="product-title">Stussy Cap</h4>
            <p class="product-price">
                <span class="new-price">35 TND</span>
                <span class="old-price">89 TND</span>
            </p>
            <a href="/clickra/panier/add_to_panier.php?id=2&nom=Stussy Cap&prix=35&image=../image/Stussy Cap.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

        <!-- 3. Black hoodie -->
        <div class="product-card">
            <img src="../image/Hoodie.png" alt="">
            <h4 class="product-title">hoodie</h4>
            <p class="product-price">
                <span class="new-price">79 TND</span>
                <span class="old-price">104 TND</span>
            </p>
            <a href="/clickra/panier/add_to_panier.php?id=3&nom=Black hoodie&prix=52&image=../image/Hoodie.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

        <!-- 4. Striped Tee -->
        <div class="product-card">
            <img src="../image/Striped Tee.png" alt="">
            <h4 class="product-title">Striped Tee</h4>
            <p class="product-price">
                <span class="new-price">39 TND</span>
                <span class="old-price">60 TND</span>
            </p>
            <a href="/clickra/panier/add_to_panier.php?id=4&nom=Striped Tee&prix=25&image=../image/Striped Tee.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

        <!-- 5. Baggy jogger -->
        <div class="product-card">
            <img src="../image/Baggy.png" alt="">
            <h4 class="product-title">Baggy jogger</h4>
            <p class="product-price">
                <span class="new-price">49 TND</span>
                <span class="old-price">95 TND</span>
            </p>
            <a href="/clickra/client/add_to_panier.php?id=5&nom=Baggy jogger&prix=49&image=../image/Baggy.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

        <!-- 6. Classic Tee -->
        <div class="product-card">
            <img src="../image/Classic Tee.png" alt="">
            <h4 class="product-title">Classic Tee</h4>
            <p class="product-price">
                <span class="new-price">29 TND</span>
                <span class="old-price">50 TND</span>
            </p>
            <a href="/clickra/panier/add_to_panier.php?id=6&nom=Classic Tee&prix=79&image=../image/Classic Tee.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

        <!-- 7. Fluffy hoodie - OUT OF STOCK -->
        <div class="product-card">
            <img src="../image/Fluffy hoodie.png" alt="">
            <h4 class="product-title">Fluffy hoodie</h4>
            <span class="product-badge">Out of stock</span>
            <p class="product-price">
                <span class="new-price">60 TND</span>
                <span class="old-price">89 TND</span>
            </p>
            <button class="add-cart-btn" style="background:#777; cursor:not-allowed;" disabled>
                Indisponible
            </button>
        </div>

        <!-- 8. Puffer jacket -->
        <div class="product-card">
            <img src="../image/puffer jacket.png" alt="">
            <h4 class="product-title">Puffer jacket</h4>
            <p class="product-price">
                <span class="new-price">100 TND</span>
                <span class="old-price">150 TND</span>
            </p>
            <a href="/clickra/panier/add_to_panier.php?id=8&nom=Puffer jacket&prix=100&image=../image/puffer jacket.png"
               class="add-cart-btn">Ajouter au panier</a>
        </div>

    </div>

</section>

</body>
</html>

