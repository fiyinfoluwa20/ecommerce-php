<div class="collapse navbar-collapse order-4 order-lg-3" id="navbarMenu2">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a data-toggle="modal" data-target="#search" class="nav-link"><i class="icon-search"></i></a>
    </li>
    <?php if(User::$auth == 0): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo WEB . 'auth'; ?>"><i class="icon-Sign-In"></i> Log In</a>
      </li>
    <?php endif; ?>
    <?php if(User::$auth == 1): ?>
      <li class="nav-item dropdown">           
        <a class="nav-link dropdown-toggle" href="" id="profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="icon-user"></i><?php echo isset(User::$user['user']['firstname']) ? User::$user['user']['firstname'] : '';?>
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
      <a data-toggle="modal" data-target="#cart" class="nav-link"><span>Cart</span><span id="count"></span></a>
    </li>
  </ul>
</div>