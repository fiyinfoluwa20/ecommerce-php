<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
$redirect = Err::url('a');
$Auth->__auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <link rel="stylesheet" href="assets/css/vendor.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="assets/js/sweetalert.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <title>Authentication</title>
  </head>
  <body>
    <header class="header header-dark bg-dark header-sticky">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-dark">
            <a href="<?php echo WEB . 'index'; ?>" class="navbar-brand order-1 order-lg-2"><img src="assets/images/logo.svg" alt="Logo"></a>
            <button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarMenu">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo WEB . 'index'; ?>">
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo WEB . 'about'; ?>">
                    About
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo WEB . 'categories'; ?>">
                    Categories
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo WEB . 'contact'; ?>">
                    Contact
                  </a>
                </li>
              </ul>
            </div>
            <div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item cart">
                    <a data-toggle="modal" data-target="#cart" class="nav-link"><span>Cart</span><span id="count"> </span></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <div class="wrapper">
      <section>
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1></h1>
            </div>
          </div>
        </div>
      </section>
      <section class="no-overflow pt-0 ">
        <div class="container">
          <div class="row">
            <?php include(ROOT . '/app/includes/signup.php'); ?>
            <?php include(ROOT . '/app/includes/signin.php'); ?>
          </div>
        </div>
      </section>
    </div>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <?php include(ROOT . '/app/includes/search.php'); ?>
    <script defer src="assets/js/vendor.min.js"></script>
    <script defer src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script defer src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script defer src="app/js/auth.js"></script>
    <script defer src="app/js/main.js"></script>
    <script defer src="assets/js/app.js"></script>
  </body>
</html>