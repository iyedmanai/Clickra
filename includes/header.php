<?php
// header.php (session must already be started)
?>
<header class="navbar">
    <div class="container nav-container">

        <!-- LOGO -->
        <div class="brand">
            <a href="/clickra/index.php">
                <img src="/clickra/image/logo.png" alt="My Logo" class="logo">
            </a>
        </div>

        <!-- NAVIGATION -->
        <nav class="main-nav">
            <ul>
                <li><a href="/clickra/index.php" style="font-weight: bold;">Home</a></li>
                <li><a href="/clickra/shop/shop.php" style="font-weight: bold;">Men</a></li>
                <li><a href="/clickra/shop/women.php" style="font-weight: bold;">Women</a></li>
                <li><a href="/clickra/contact/contact.php" style="font-weight: bold;">Contact</a></li>
            </ul>
        </nav>

        <!-- ACTIONS -->
        <div class="nav-actions">

            <!-- SEARCH -->
            <div class="search">
                <details>
                    <summary>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </summary>
                    <input type="search" placeholder="Search...">
                </details>
            </div>

            <!-- CART -->
            <a class="icon cart" href="/clickra/panier/panier.php">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

            <!-- USER MENU -->
            <div class="login">

                <?php if (!isset($_SESSION['id'])): ?>

                    <!-- NOT LOGGED IN -->
                    <a href="/clickra/login/login.php">
                        <i class="fa-solid fa-user"></i>
                    </a>

                <?php else: ?>

                    <?php
                        $initial = strtoupper(substr($_SESSION['nom'], 0, 1));
                    ?>

                    <!-- LOGGED IN : AVATAR & DROPDOWN -->
                    <div class="user-menu">
                        <div class="avatar-circle" id="avatarToggle">
                            <?= $initial ?>
                        </div>

                        <div class="dropdown" id="userDropdown">

                            <?php if ($_SESSION['role'] === "admin"): ?>
                                <a href="/clickra/login/admin.php"> Admin Dashboard</a>
                            <?php else: ?>
                                <a href="/clickra/login/client.php">  Espace Client</a>
                            <?php endif; ?>

                            <a href="/clickra/login/logout.php"> Logout</a>

                        </div>
                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>
</header>

<!-- JS DROPDOWN -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const avatar = document.getElementById("avatarToggle");
    const menu = document.getElementById("userDropdown");

    if (avatar) {
        avatar.addEventListener("click", () => {
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        });

        document.addEventListener("click", (e) => {
            if (!avatar.contains(e.target) && !menu.contains(e.target)) {
                menu.style.display = "none";
            }
        });
    }
});
</script>
