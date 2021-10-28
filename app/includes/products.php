<section>
  <div class="container">
    <div class="row gutter-1 align-items-end">
      <div class="col-md-6">
        <h2><?php echo !isset(Products::$product['search']['title']) ? 'Featured Products' : Products::$product['search']['title']; ?></h2>
      </div>
      <div class="col-md-6 text-md-right">
        <ul class="nav nav-tabs lavalamp" id="myTab" role="tablist">
          <li class="nav-item <?php echo isset($_GET['showUp']) && $_GET['showUp'] === 'BestSeller' && !isset(Products::$product['search']['style']) ? 'active' : ''; ?>">
            <a class="nav-link" href="index?showUp=BestSeller">Best Sellers</a>
          </li>
          <li class="nav-item <?php echo isset($_GET['showUp']) && $_GET['showUp'] === 'NewArrivals' ? 'active' : ''; ?>">
            <a class="nav-link" href="index?showUp=NewArrivals">New Arrivals</a>
          </li>
          <li class="nav-item <?php echo isset($_GET['showUp']) && $_GET['showUp'] === 'AllProducts' || isset(Products::$product['search']['style']) ? 'active' : ''; ?>">
            <a class="nav-link" href="index?showUp=AllProducts">all products</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="tab-content" id="myTabContent">
            <div class="row gutter-2 gutter-md-3">
              <?php foreach($posts as $post): ?>
                <div class="col-6 col-lg-3">
                  <div class="product">
                    <figure class="product-image">
                      <?php $link = 'product?product='.str_replace(' ', '-', trim(strip_tags($post['title']))).'&Pdk='.strip_tags($post['p_tok']);?>
                      <a href="<?php echo $link; ?>">
                        <img src="<?php echo WEB . '/assets/uploads/' . $post['image1']; ?>" alt="Image">
                        <img src="<?php echo WEB . '/assets/uploads/' . $post['image2']; ?>" alt="Image">
                      </a>
                    </figure>
                    <div class="product-meta">
                      <h3 class="product-title"><a href="<?php echo $link; ?>"><?php echo strip_tags($post['title']); ?></a></h3>
                      <div class="product-price">
                        <span><i class="flaticon-nigeria-naira-currency-symbol"></i><?php echo number_format(strip_tags($post['amount'])); ?></span>
                        <?php if($post['showsizes'] == 1): ?>
                          <span class="px-3">
                            <a href="<?php echo $link; ?>" class="d-none d-md-block">Show options</a>
                          </span>
                        <?php else: ?>
                          <span class="px-3">
                            <i class="icon-Shopping-Cart cctc d-none d-md-block" id="cctc"><input type="hidden" value="<?php echo $post['p_tok']; ?>"></i>
                          </span>
                        <?php endif; ?>
                      </div>
                      <div class="product-like" id="shess" style="cursor: pointer;"><input type="hidden" value="<?php echo $post['p_tok']; ?>"></div>
                    </div>
                    <div class="whatsapp py-3">
                      <a href="https://api.whatsapp.com/send?phone=YOUR_NUMBER&text=<?php echo rawurlencode('Online enquiry about'); ?><?php echo rawurlencode($post['title']); ?>  <?php echo explode("/", Err::url("a"))[0].'://'.explode("/", Err::url("a"))[2].'/'.explode("/", Err::url("a"))[3].'/'.explode("/", Err::url("a"))[4].'?Pdk='.rawurlencode($post['p_tok']); ?>" class="btn whatsapp-link text-white"><span class="fab fa-whatsapp"></span></a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <a href="javascript:void(0)" class="btn btn-outline-secondary">Load More</a>
      </div>
    </div>
  </div>
</section>