<?php $products = categoriesProducts();foreach ($products as $product):?>
<div class="col-6 col-lg-3">
    <div class="product">
        <figure class="product-image">
            <?php switch($product['product_badge']):
                case 'fresh': ?>
                <span class="product-promo bg-blue"><?php echo strip_tags($product['product_badge']); ?></span>
                 <?php break;
                case 'sale': ?>
                <span class="product-promo bg-green"><?php echo strip_tags($product['product_badge']); ?></span>
                 <?php break;
                case 'stock': ?>
                <span class="product-promo bg-red"><?php echo strip_tags($product['product_badge']); ?></span>
                 <?php break;
                     endswitch; ?>
            <a href="product?product=<?php echo str_replace(' ', '-', trim(strip_tags($product['title']))); ?>&Pdk=<?php echo strip_tags($product['p_tok']); ?>">
                <img src="<?php echo WEB . '/assets/uploads/' . strip_tags($product['image1']); ?>" alt="Image">
                <img src="<?php echo WEB . '/assets/uploads/' . strip_tags($product['image2']); ?>" alt="Image">
            </a>
        </figure>
        <div class="product-meta">
            <h3 class="product-title"><?php echo strip_tags($product['title']); ?></h3>
            <div class="product-price">
                <span><i class="flaticon-nigeria-naira-currency-symbol"></i> <?php echo number_format(strip_tags($product['amount'])); ?>jk</span>
                <?php if($product['showsizes'] === 1): ?>
                <span class="px-3">
                  <a href="product?product=<?php echo str_replace(' ', '-', trim(strip_tags($product['title']))); ?>&Pdk=<?php echo strip_tags($product['p_tok']); ?>" class="d-none d-md-block">Show options</a>
                </span>
                <?php else: ?>
                  <span class="px-3">
                    <i class="icon-Shopping-Cart cctc d-none d-md-block" id="cctc"><input type="hidden" value="<?php echo $product['p_tok']; ?>"></i>
                  </span>
                <?php endif; ?>
            </div>
            <div class="product-like" id="shess" style="cursor: pointer;"><input type="hidden" value="<?php echo $product['p_tok']; ?>"></div>
        </div>
    </div>
</div>
<?php endforeach; ?>