<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
User::__getUser();
$p = $Carts->SingleProduct();
$Products->writeReviews();
$Allreviews = Products::$product['reviews'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/fonts/icon.css" />
    <link rel="stylesheet" href="assets/fontawesome/css/all.css" />
    <script src="assets/js/sweetalert.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <title>Product</title>
  </head>
  <body>
    <div class="pre-loader">
      <div class="pre-loader-box">
        <div class="loader-logo"> <img src="assets/images/cantsleep-insomnia.gif" alt="loader"/></div>
      </div>
    </div>
    <?php include(ROOT . '/app/includes/header3.php'); ?>
    <div class="wrapper">
        <section class="breadcrumbs bg-light">
          <div class="container">
            <div class="row">
              <div class="col">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index" style="font-size: .9rem;">Home</a></li>
                    <li class="breadcrumb-item"><a href="listing-full.html" style="font-size: .9rem;">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"  style="font-size: .9rem;">Product</li>
                  </ol>
                </nav>
              </div>
            </div>
            <div id="alerts"></div>
          </div>
        </section>
      <?php include(ROOT . '/app/includes/single-product.php'); ?>
      <?php include(ROOT . '/app/includes/seperator-top.php');?>
      <?php include(ROOT . '/app/includes/related-products.php'); ?>
    </div>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <?php include(ROOT . '/app/includes/search.php'); ?>
    <?php include(ROOT . '/app/includes/reviews.php'); ?>
    <?php include(ROOT . '/app/includes/writereview.php'); ?>
    <script src="assets/js/vendor.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="app/js/main.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
      $("#writeReview").modal("show");
    </script>
  </body>
</html>