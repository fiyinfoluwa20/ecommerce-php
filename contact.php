<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
$Auth->ContactForm();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <title>Contact Us</title>
  </head>
  <body>
    <?php include(ROOT . '/app/includes/header3.php'); ?>
    <div class="wrapper">
      <section class="hero">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-md-6">
              <h1 class="font-weight-light"><b class="d-block">Get in touch!</b> It's free.</h1>
            </div>
          </div>
          <div class="row gutter-4">
            <div class="col-md-5 col-lg-4">
              <span class="eyebrow">Contact Us</span>
              <p class="lead my-1 text-dark">
                Phone: +1 00000055555 <br>
                Fax: +1 00000055555
              </p>
              <a href="#!" class="eyebrow underline action">admin@admin.com</a>
            </div>
          </div>
        </div>
        <div class="container my-6">
          <div class="row gutter-4">
            <div class="col-lg-4">
              <h2 class="font-weight-light"><b>Get in touch</b> with us by filling out our contact form.</h2>
              <p>We don't spam. Promise!</p>
            </div>
            <div class="col-lg-8 pl-lg-5">
              <form action="contact" method="post" id="Connt">
                <div id="Lo">
                  <p id="vmv"></p>
                </div>
                <div class="row gutter-2">
                  <div class="form-group col-md-6">
                    <label for="inputName">First Name</label>
                    <input type="text" name="firstName" class="form-control" id="inputName" value="<?php echo isset(User::__getUser()["firstname"]) && !empty(User::__getUser()["firstname"]) ? User::__getUser()["firstname"] : ""; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo isset(User::__getUser()["email"]) && !empty(User::__getUser()["email"]) ? User::__getUser()["email"] : ""; ?>">
                  </div>
                  <div class="form-group col-12">
                    <label for="inputNameSecond">Subject</label>
                    <input type="text" name="subject"  class="form-control" id="inputNameSecond">
                  </div>
                  <div class="form-group col-12">
                    <label for="inputTextarea">Message</label>
                    <textarea class="form-control" name="message" id="inputTextarea" rows="3"></textarea>
                  </div>
                  <div class="col-12">
                    <div class="custom-control custom-switch mb-2">
                      <input type="checkbox" class="custom-control-input" name="subscribe" id="customSwitch1">
                      <label class="custom-control-label text-muted" for="customSwitch1">Subscribe me to weekly newsletter</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-2" id="ContactForm" name="ContactForm">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include(ROOT . '/app/includes/footer.php'); ?>
    <?php include(ROOT . '/app/includes/cart.php'); ?>
    <?php include(ROOT . '/app/includes/search.php'); ?>
    <script src="assets/js/vendor.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="app/js/auth.js"></script>
    <script src="app/js/main.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>