<?php
session_start();
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ClicKra</title>

<link rel="stylesheet" href="style.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<link rel="icon" type="image/png" href="image/clickra_transparent-.png">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<!-- Navbar -->


<!-- Hero section -->
<section class="hero container">
    <div class="hero-content">
        <h1>New Season Arrivals</h1>
        <p>Discover the latest trends in our collection.</p>
        <a class="btn" href="shop/shop.php">Shop Now</a>
    </div>
</section>

<!-- Categories banners -->
<section class="banners container">
    <div class="banner">
        <div class="banner-content">
            <h3>Men's Collection</h3>
            <a href="shop/shop.php?category=men" class="btn">Explore</a>
        </div>
    </div>

    <div class="banner">
        <div class="banner-content">
            <h3>Women's Collection</h3>
            <a href="shop/shop.php?category=women" class="btn">Explore</a>
        </div>
    </div>
</section>

<!-- Featured products -->
<section class="products container">
    <h2>Our trending products</h2>
<div class="pro" id="pro">

        <article class="product">
            <img src="/clickra/image/Classic Tee.png" alt="Classic Tee" />
            <h3 class="product-title">Classic Tee</h3>
            <p class="price">29.00 dt</p>
            <a href="panier/add_to_panier.php?id=1&nom=Classic Tee&prix=29&image=/clickra/image/Classic Tee.png" class="add-cart-btn">
                Add to cart
            </a>
        </article>

            <article class="product">
                <img src="/clickra/image/Baggy.png" alt="Baggy" />
                <h3 class="product-title">Baggy</h3>
                <p class="price">49.00 dt</p>
                <a href="panier/add_to_panier.php?id=2&nom=Baggy&prix=49&image=/clickra/image/Baggy.png" class="add-cart-btn">
                    Add to cart
                </a>
            </article>

            <article class="product">
                <img src="/clickra/image/pulls.png" alt="Pulls" />
                <h3 class="product-title">Pulls</h3>
                <p class="price">55.00 dt</p>
                <a href="panier/add_to_panier.php?id=3&nom=Pulls&prix=79&image=/clickra/image/pulls.png" class="add-cart-btn">
                    Add to cart
                </a>
            </article>

            <article class="product">
                <img src="/clickra/image/Hoodie.png" alt="Hoodie" />
                <h3 class="product-title">Hoodie</h3>
                <p class="price">79.00 dt</p>
                <a href="panier/add_to_panier.php?id=4&nom=Hoodie&prix=149&image=/clickra/image/Hoodie.png" class="add-cart-btn">
                    Add to cart
                </a>
            </article>
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter container">
    <h3>Join our newsletter</h3>
    <form id="newsletterForm">
        <input type="email" placeholder="Enter your email" required />
        <button type="submit">Subscribe</button>
    </form>
</section>

<!-- Footer -->
<footer class="footer container">
    <div class="footer-columns">

        <div class="column">
            <h4>About ClicKra</h4>
            <p>ClicKra is your one-stop destination for fashion, accessories and more.</p>
        </div>

        <div class="column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="shop/shop.php">Shop</a></li>
                <li><a href="about/about.php">About us</a></li>
                <li><a href="contact/contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="column">
            <h4>Contact Us</h4>
            <p>Email: ClicKra@shopeasy.com</p>
        </div>

    </div>

    <div class="footer-bottom">
        © <span id="currentYear"></span> ClicKra. All rights reserved.
    </div>
</footer>

<script src="script.js"></script>

</body>
</html>