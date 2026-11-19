<?php
session_start();
include "../includes/header.php"; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact Us – ClicKra</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="/clickra/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="../image/clickra_transparent-.png">


</head>

<body>

<section class="contact-container">

    <h1 class="contact-title">Contact Us</h1>
    <p class="contact-subtitle">Feel free to reach out. We usually respond within 24 hours.</p>

    <form class="contact-form" action="#" method="POST">

        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" required id="name" name="name" placeholder="Enter your full name">
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" required id="email" name="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="message">Your Message</label>
            <textarea required id="message" name="message" rows="5" placeholder="Type your message..."></textarea>
        </div>

        <button type="submit" class="contact-btn">Send Message</button>

    </form>

</section>

</body>
</html>
