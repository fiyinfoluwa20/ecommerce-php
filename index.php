<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
$posts = Carts::search();
$Carts->QuickAddToCart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/fonts/icon.css" />
    <link rel="stylesheet" href="assets/fontawesome/css/all.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <title>si</title>
  </head>
  <body>
    <?php include(ROOT . '/app/includes/header1.php'); ?>
    <div class="wrapper">
      <?php include(ROOT . '/app/includes/swiper.php'); ?>
      <?php include(ROOT . '/app/helpers/toast.php'); ?> 
      <?php include(ROOT . '/app/includes/products.php'); ?>
      <?php include(ROOT . '/app/includes/collection.php'); ?>
      <?php include(ROOT . '/app/includes/blog.php'); ?>
      <?php include(ROOT . '/app/includes/instagram.php'); ?>
    </div>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <script src="assets/js/vendor.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="app/js/auth.js"></script>
    <script src="app/js/main.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>