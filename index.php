<?php
if (session_status() === PHP_SESSION_NONE) session_start();
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elongal</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen w-full m-0 p-0 overflow-x-hidden bg-(--light)">

    <?php include_once('./components/header.php'); ?>
    <?php include_once('./components/hero.php'); ?>
    <?php include_once('./components/slogan.php'); ?>
    <?php include_once('./components/product-card.php'); ?>
    <?php include_once('./components/applications.php'); ?>
    <?php include_once('./components/quiz.php'); ?>
    <?php include_once('./components/categories.php'); ?>
    <?php include_once('./components/footer.php'); ?>

    <!-- <div class="w-full min-h-screen bg-(--light)"> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.15/dist/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/js/layout.js"></script>
    <script src="<?= BASE_URL ?>/js/script.js"></script>
</body>
</html>
