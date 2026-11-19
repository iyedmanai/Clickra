<?php
session_start();

$id = $_GET['id'];
$nom = $_GET['nom'];
$prix = $_GET['prix'];
$image = $_GET['image'];

if (!isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id] = [
        "id" => $id,
        "nom" => $nom,
        "prix" => $prix,
        "image" => $image,
        "quantite" => 1,
    ];
} else {
    $_SESSION['panier'][$id]['quantite']++;
}

header("Location: panier.php");
exit;
