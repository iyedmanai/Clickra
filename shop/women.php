<?php
session_start();
include "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Page Not Available</title>

<link rel="stylesheet" href="../style.css">
      
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="../image/clickra_transparent-.png">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
<style>
.page-wrapper {
    margin-top: 150px; /* pushes content UNDER the header */
    display: flex;
    justify-content: center;
}

.unavailable-box {
    background: #fff;
    padding: 40px;
    width: 600px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
}

.unavailable-box h1 {
    font-size: 2rem;
    margin-bottom: 15px;
}

.unavailable-box p {
    color: #666;
    margin-bottom: 25px;
    font-size: 1rem;
}

.unavailable-box .btn-back {
    padding: 10px 25px;
    background: #222;
    color: white;
    text-decoration: none;
    border-radius: 6px;
}

.unavailable-box .btn-back:hover {
    background: #444;
}
</style>

</head>
<body>

<div class="page-wrapper">
    <div class="unavailable-box">
        <h1>🚧 Page Not Available</h1>
        <p>The women's section is currently unavailable.<br>
        Please check again later.</p>

        <a class="btn-back" href="/clickra/">Return Home</a>
    </div>
</div>

</body>
</html>
