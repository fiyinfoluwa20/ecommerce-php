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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="assets/js/sweetalert.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <title>Home - Categories</title>
  </head>
  <body>
    <?php include(ROOT . '/app/includes/header5.php'); ?>
    <div class="wrapper">
      <?php include(ROOT . '/app/includes/categories-images.php'); ?>
      <section class="py-0 relative">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="banner bg-purple px-2 py-3 px-md-4 py-md-5 text-white">
                <div class="decoration decoration-top" style="background-image: url(assets/images/decoration-2.png)"></div>
                <div class="row align-items-center gutter-1 gutter-md-4 text-center text-md-left">
                  <div class="col-md-6">
                    <h3 class="text-uppercase mb-0"><b>Sale</b> up to <b>50% Off</b></h3>
                    <p class="small">Terms & Conditions Apply</p>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <a href="index?showUp=AllProducts" class="btn btn-outline-white">View all products</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>Latest Products</h2>
            </div>
          </div>
          <div class="row gutter-2 gutter-md-3">
          <?php include(ROOT . '/app/includes/categories.php'); ?>
          </div>
          <div class="row">
            <div class="col text-center">
              <a href="javascript:void(0)" class="btn btn-outline-secondary">Load More</a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <?php include(ROOT . '/app/includes/filter.php'); ?>
    <?php include(ROOT . '/app/includes/search.php'); ?>
    <script src="assets/js/vendor.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="app/js/auth.js"></script>
    <script src="app/js/main.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>