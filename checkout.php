<?php
include("path.php");
$GLOBALS['checkoutmodal'] = 1;
include(ROOT . "/app/class/auth.php");
$Auth->CheckOut();
$Carts->CheckoutCarts();
$Auth->getaddress();
$useraddress = useraddress(!empty(User::__getUser()) && isset(User::__getUser()["id"]) ? User::__getUser()["id"] : '');
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
    <title>Checkout</title>
  </head>
  <body>
    <div class="pre-loader">
      <div class="pre-loader-box">
        <div class="loader-logo"> <img src="assets/images/cantsleep-insomnia.gif" alt="loader"/></div>
      </div>
    </div>
    <?php include(ROOT . '/app/includes/header3.php'); ?>
      <section class="wrapper">
      <?php include(ROOT . '/app/helpers/toast.php'); ?>
        <section class="breadcrumbs separator-bottom p-2">
          <div class="container">
            <div class="row">
              <div class="col">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a  href="index">Home</a></li>
                    <li class="breadcrumb-item"><a href="listing-sidebar.html">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
          <section>
            <div class="container">
              <div class="row">
                <div class="col text-center">
                  <h1>Checkout</h1>
                </div>
              </div>
            </div>
          </section>
          <section class="no-overflow pt-0">
            <div class="container">
              <div class="row gutter-4 justify-content-between">
                <div class="col-lg-8">
                    <div id="INV">
                      <p id="InV"></p>
                    </div>
                  <div class="row align-items-end mb-2">
                    <div class="col-md-6">
                      <h2 class="h3 mb-0"><span class="text-muted">01.</span>Billing address</h2>
                    </div>
                    <div class="col-md-6 text-md-right">
                      <a class="eyebrow unedrline action" data-toggle="modal" data-target="#addresses">My Addresses</a>
                    </div>
                  </div>
                  <form id="inV" action="checkout" method="post">
                    <div class="row gutter-1 mb-6">
                      <div class="form-group col-md-6">
                        <label for="firstname_invoice1">First Name</label>
                        <input type="text" class="form-control" id="firstname_invoice1" name="firstname_invoice" value="<?php echo isset(Auth::$auths['savecheckinput']) ? Auth::$auths['savecheckinput']['name1'] : ""; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lastname_invoice1">Last Name</label>
                        <input type="text" class="form-control" id="lastname_invoice1" name="lastname_invoice" value="<?php echo isset(Auth::$auths['savecheckinput']) ? Auth::$auths['savecheckinput']['lname1'] : ""; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="email_invoice1">email</label>
                        <input type="email" class="form-control" id="email_invoice1" name="email_invoice" value="<?php echo isset(Auth::$auths['savecheckinput']) ? Auth::$auths['savecheckinput']['email1'] : ""; ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="invoice_state">State</label>
                        <select class="form-control text-uppercase" id="invoice_state" name="state_invoice">
                          <?php $a = Auth::state(Auth::$auths);
                            if (!empty($a)){
                                if ($a['attribute'] == 0) {
                                   echo  '<option value="">select a state</option>';
                                }
                                foreach ($a as $b){
                                    echo $b;
                                }
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="town_invoice1">Town</label>
                        <select class="form-control text-uppercase" id="town_invoice1" name="town_invoice">
                            <?php $a = Auth::town();
                                if (!empty($a)){
                                    if ($a['a'] == 0) {
                                       echo  '<option value="">select a town</option>';
                                    }
                                    foreach ($a as $b){
                                        echo $b;
                                    }
                                }
                            ?>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="country_invoice1">Country</label>
                        <select class="form-control text-uppercase" id="country_invoice1" name="country_invoice">
                          <?php if (isset(Auth::$auths['savecheckinput'])) : ?>
                            <option value="<?php echo Auth::$auths['savecheckinput']['country1']; ?>"><?php echo Auth::$auths['savecheckinput']['country1']; ?></option>
                          <?php endif; ?>
                          <option value="Nigeria">Nigeria</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="telephone_invoice1">telephone</label>
                        <input type="num" class="form-control" id="telephone_invoice1" name="telephone_invoice" value="<?php echo isset(Auth::$auths['savecheckinput']) ? Auth::$auths['savecheckinput']['phone1'] : ""; ?>">
                      </div>
                      <div class="form-group col-md-5">
                        <label for="company_invoice1">Company Name <span class="text-muted">(optional)</span> </label>
                        <input type="text" class="form-control" id="company_invoice1" name="company_invoice" value="
                        <?php echo isset(Auth::$auths['savecheckinput']) ? Auth::$auths['savecheckinput']['company1'] : ''; ?>">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="address_invoice1">Address</label>
                        <input type="text" class="form-control" id="address_invoice1" name="address_invoice" value="<?php echo isset(Auth::$auths['savecheckinput']) ? Auth::$auths['savecheckinput']['address1'] : ""; ?>">
                      </div>
                        <div class="col-12 mt-4">
                          <div class="custom-control custom-switch">
                            <?php if (isset(Auth::$auths['savecheckinput']) AND Auth::$auths['savecheckinput']['ipc'] > 0): ?>
                              <input type="checkbox" class="custom-control-input" name="shipping_address" id="customSwitch1" checked>
                            <?php else: ?>
                              <input type="checkbox" class="custom-control-input" name="shipping_address" id="customSwitch1">
                            <?php endif ; ?>
                            <label class="custom-control-label text-muted" for="customSwitch1" data-toggle="collapse" data-target="#shippingAddress">Billing address same as delivery.</label>
                          </div>
                        </div>
                    </div>
                    <?php include(ROOT . '/app/includes/shipping.php'); ?>
                    <div class="row">
                      <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <?php if (isset(Auth::$auths['savecheckinput']) AND Auth::$auths['savecheckinput']['svi'] == 1): ?>
                              <input type="checkbox" class="custom-control-input" name="saveinfo" id="customSwitch33" checked>
                            <?php else: ?>
                              <input type="checkbox" class="custom-control-input" name="saveinfo" id="customSwitch33">
                            <?php endif ; ?>
                            <label class="custom-control-label text-muted" for="customSwitch33">Save your address for future use.</label>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-outline-dark " type="submit" name="Inv">Checkout</button>
                  </form>
                </div>
                <?php include(ROOT . '/app/includes/checkout-order-preview.php'); ?>
              </div>
            </div>
          </section>
      </section>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <?php include(ROOT . '/app/includes/search.php'); ?>
    <?php include(ROOT . '/app/includes/modal-addresses.php'); ?>
    <?php include(ROOT . '/app/includes/authmodal.php'); ?>
    <?php include(ROOT . '/app/includes/forgotpassword.php'); ?>
    <script defer src="assets/js/vendor.min.js"></script>
    <script defer src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script defer src="app/js/auth.js"></script>
    <script defer src="app/js/main.js"></script>
    <script defer src="assets/js/app.js"></script>
  </body>
</html>