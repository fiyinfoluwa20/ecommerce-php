<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
$posts = Carts::search();
$Carts->QuickAddToCart();
$category = $Products->category();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
    <title>Single category</title>
  </head>
  <body>
  <?php include(ROOT . '/app/includes/header5.php'); ?>
    <div class="wrapper">
      <section class="hero hero-small">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1 class="mb-0"><?php echo isset($category[0]['name']) ? $category[0]['name'] : ''; ?></h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo WEB . 'index'; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo isset($category[0]['name']) ? $category[0]['name'] : ''; ?></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="pt-0">
        <div class="container">
          <?php if(empty($category)): ?>
            <span class="eyebrow mb-2">(0) product</span>
            <h4>No product found</h4>
            <div class="row mt-7">
              <div class="col">
                <nav class="d-inline-block">
                  <ul class="pagination">
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                    <li class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0)">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          <?php else: ?>
          <div class="row">
            <div class="col">
              <div class="row gutter-1 gutter-md-2 align-items-center">
                <div class="col-md-6">
                  <span class="eyebrow"><?php echo count($category) > 1 ? count($category) . ' products' :  count($category) . ' product' ; ?></span>
                </div>
                <div class="col-md-6 text-md-right">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <div class="dropdown">
                      <a class="btn btn-outline-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        What's New
                      </a>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                        <a class="dropdown-item" href="javascript:void(0)">Price high to low</a>
                        <a class="dropdown-item" href="javascript:void(0)">Price low to high</a>
                      </div>
                    </div>
                    <button data-toggle="modal" data-target="#filter" type="button" class="btn btn-sm btn-outline-secondary">Filter</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="row gutter-2 gutter-lg-3">
              <?php include(ROOT . '/app/includes/single-category.php'); ?>
              </div>
              <div class="row">
                <div class="col">
                  <nav class="d-inline-block">
                    <ul class="pagination">
                      <li class="page-item active"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                      <li class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0)">2</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
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
    <script src="assets/js/app.js"></script>
    <script src="app/js/main.js"></script>
  </body>
</html>