<?php foreach ($category as $catego): ?>
    <div class="col-6 col-lg-4">
        <div class="product">
            <?php if ($catego['discount'] === 0): ?>
                <figure class="product-image">
                    <a href="product?product=<?php echo trim(str_replace(' ', '-', strip_tags($catego['title']))); ?>&Pdk=<?php echo rawurlencode($catego['p_tok']); ?>">
                        <img src="<?php echo WEB . '/assets/uploads/' . $catego['image1']; ?>" alt="Image">
                        <img src="<?php echo WEB . '/assets/uploads/' . $catego['image2']; ?>" alt="Image">
                    </a>
                </figure>
            <?php else: ?>
                <figure class="product-image">
                    <span class="product-promo"><?php echo $catego['discount'];?>%</span>
                    <div class="owl-carousel" data-nav="true" data-loop="true">
                        <a href="product?product=<?php echo trim(str_replace(' ', '-', strip_tags($catego['title']))); ?>&Pdk=<?php echo rawurlencode($catego['p_tok']); ?>">
                            <img src="<?php echo WEB . '/assets/uploads/' . $catego['image1']; ?>" alt="Image">
                        </a>
                        <a href="#!">
                            <img src="<?php echo WEB . '/assets/uploads/' . $catego['image2']; ?>" alt="Image">
                        </a>
                        <a href="#!">
                            <img src="<?php echo WEB . '/assets/uploads/' . $catego['image3']; ?>" alt="Image">
                        </a>
                    </div>
                </figure>
            <?php endif; ?>
                <div class="product-meta">
                    <h3 class="product-title"><a href="product?product=<?php echo trim(str_replace(' ', '-', strip_tags($catego['title']))); ?>&Pdk=<?php echo rawurlencode($catego['p_tok']); ?>"><?php echo $catego['title'];?></a></h3>
                        <div class="product-price">
                            <span>
                                <i class="flaticon-nigeria-naira-currency-symbol"></i><?php echo $catego['amount']; ?>
                            </span>
                            <?php if($catego['showsizes'] === 1): ?>
                                <span class="px-3">
                                    <a href="product?product=<?php echo trim(str_replace(' ', '-', strip_tags($catego['title']))); ?>&Pdk=<?php echo rawurlencode($catego['p_tok']); ?>" class="d-none d-md-block">Show options
                                    </a>
                                </span>
                            <?php else: ?>
                                <span class="px-3" style="cursor: pointer;">
                                    <i class="icon-Shopping-Cart cctc d-none d-md-block" id="cctc"><input type="hidden" value="<?php echo $catego['p_tok']; ?>"></i>
                                </span>
                            <?php endif; ?>
                        </div>
                      <div class="product-like" id="shess" style="cursor: pointer;"><input type="hidden" value="<?php echo $catego['p_tok']; ?>"></div>
                </div>
        </div>
    </div>
<?php endforeach; ?>