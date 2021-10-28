<header class="header header-dark header-sticky separator-bottom">
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
                <a class="nav-link" href="javascript:void(0)">
                  About
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo WEB . 'categories'; ?>">
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">
                  Contact
                </a>
              </li>
            </ul>
          </div>
          <?php include(ROOT . '/app/includes/single-header.php'); ?>
        </nav>
      </div>
    </div>
</header>