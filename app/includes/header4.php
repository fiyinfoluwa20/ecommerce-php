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
              <div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a data-toggle="modal" data-target="#search" class="nav-link"><i class="icon-search"></i></a>
                  </li>
                  <?php if($cookie->auth == 0): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo WEB . 'auth'; ?>"><i class="icon-Sign-In"></i> Log In</a>
                    </li>
                  <?php endif; ?>
                  <?php if($cookie->auth == 1): ?>
                    <li class="nav-item dropdown">           
                      <a class="nav-link dropdown-toggle" href="" id="profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-user"></i> <?php echo isset(Cookie::$user['firstname']) ? Cookie::$user['firstname'] : ''; ?>
                      </a>
                        <ul class="dropdown-menu" aria-labelledby="profile">
                          <li>
                            <a class="dropdown-item" href="<?php echo WEB . 'profile'; ?>"><i class="icon-User"></i> My Profile</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="<?php echo WEB . 'logout'; ?>"><i class="icon-Sign-Out"></i> LogOut</a>
                          </li>
                        </ul>
                    </li>
                  <?php endif; ?>
                  <li class="nav-item cart">
                    <a data-toggle="modal" data-target="#cart" class="nav-link"><span>Cart</span><span id="count"> </span></a>
                  </li>
                </ul>
              </div>
          </nav>
      </div>
    </div>
</header>