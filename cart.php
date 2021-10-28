<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
$Carts->__cart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta charset="utf-16">
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
    <title>Cart</title>
  </head>
  <body>
    <div class="pre-loader">
      <div class="pre-loader-box">
        <div class="loader-logo"> <img src="assets/images/cantsleep-insomnia.gif" alt="loader"/></div>
      </div>
    </div>
    <?php include(ROOT . '/app/includes/header3.php'); ?>
    <div class="wrapper">
      <section class="hero">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1>Your Cart</h1>
            </div>
          </div>
        </div>
      </section>
      <section class="pt-0">
        <div class="container">
          <div class="row mb-1 d-none d-lg-flex">
            <div class="col-lg-8">
              <div class="row pr-6">
                <div class="col-lg-6"><span class="eyebrow">Product</span></div>
                <div class="col-lg-2 text-center"><span class="eyebrow">Price</span></div>
                <div class="col-lg-2 text-center"><span class="eyebrow">Quantity</span></div>
                <div class="col-lg-2 text-center"><span class="eyebrow">Total</span></div>
              </div>
            </div>
          </div>
          <div class="row gutter-2 gutter-lg-4 justify-content-end">
            <div class="col-lg-8 cart-item-list">
              <div id="loggs"></div>
              <div class="float-right mt-5">
                <a class="btn btn-link primary-color box-shadow-none" id="clickk">
                  <i class="fa fa-sync"></i> Update cart
                </a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-data bg-light">
                <div class="card-header py-2 px-3">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="fs-18 mb-0">Order Summary</h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-minimal">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Subtotal
                      <span class="flaticon-nigeria-naira-currency-symbol p-0 m-0" id="subtotal"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Shipping
                      <span><i class="flaticon-nigeria-naira-currency-symbol p-0 m-0"></i>1,500</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <a href="#" class="text-primary action underline" data-toggle="modal" data-target="#addcoupon">Add coupon code</a>
                    </li>
                  </ul>
                </div>
                <div class="card-footer py-2">
                  <ul class="list-group list-group-minimal">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark fs-18">
                      Total
                      <span class="flaticon-nigeria-naira-currency-symbol p-0 m-0" id="total"></span>
                    </li>
                  </ul>
                </div>
              </div>
              <a href="checkout" class="btn btn-lg btn-primary btn-block mt-1">Checkout</a>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <?php include(ROOT . '/app/includes/search.php'); ?>
    <?php include(ROOT . '/app/includes/coupon.php'); ?>
    <script src="assets/js/vendor.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="app/js/main.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>