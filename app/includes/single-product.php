<section class="hero bg-light pt-0">
    <div class="container">
        <div class="row gutter-2 gutter-md-4 justify-content-between">
            <div class="col-lg-7">
                <div class="row gutter-1 justify-content-between">
                <div class="col-lg-10 order-lg-2">
                    <div class="owl-carousel gallery" data-slider-id="1" data-thumbs="true" data-nav="true">
                        <figure class="equal">
                            <a class="image" href="<?php echo WEB . '/assets/uploads/' . $p['image1']; ?>" 
                            style="background-image: url(<?php echo WEB . '/assets/uploads/' . $p['image1']; ?>);">
                            </a>
                        </figure>
                        <figure class="equal">
                            <a class="image" href="<?php echo WEB . '/assets/uploads/' . $p['image2']; ?>" 
                            style="background-image: url(<?php echo WEB . '/assets/uploads/' . $p['image2']; ?>);">
                            </a>
                        </figure>
                        <figure class="equal">
                            <a class="image" href="<?php echo WEB . '/assets/uploads/' . $p['image3']; ?>" 
                            style="background-image: url(<?php echo WEB . '/assets/uploads/' . $p['image3']; ?>);">
                            </a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-2 text-center text-lg-left order-lg-1">
                    <div class="owl-thumbs" data-slider-id="1">
                        <span class="owl-thumb-item"><img src="<?php echo WEB . '/assets/uploads/' . $p['image1']; ?>" alt=""></span>
                        <span class="owl-thumb-item"><img src="<?php echo WEB . '/assets/uploads/' . $p['image2']; ?>" alt=""></span>
                        <span class="owl-thumb-item"><img src="<?php echo WEB . '/assets/uploads/' . $p['image3']; ?>" alt=""></span>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-12">
                        <span class="item-brand">Ucon Acrobatics</span>
                        <h1 class="item-title"> <?php echo $p['title']; ?></h1>
                        <span class="item-price">
                        <?php if($p['discount'] > 0): ?><s class="text-muted"><i class="flaticon-nigeria-naira-currency-symbol"></i><?php echo $p['discount']; ?></s><?php endif; ?><i class="flaticon-nigeria-naira-currency-symbol"></i><?php echo $p['amount']; ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>This minimalist backpack is suitable for any occasion. Whether on the road by bike, shopping or in the nightlife.</p>
                    </div>
                </div>
                <form method="post" id="padd" action="<?php echo $p['link']; ?>">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php if($p['checksizestring'] && $p['checksizestring'] == 1): ?>
                                    <label>Sizes (required)</label>
                                    <div class="btn-group-toggle btn-group-square" data-toggle="buttons">
                                        <?php foreach($p['sizes'] as $size):?>
                                            <label class="btn">
                                                <input type="radio" name="sizes" id="option1" value="<?php echo $size; ?>" required><?php echo $size; ?> 
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($p['checksizeint'] && $p['checksizeint'] == 1): ?>
                                    <label>Sizes (required)</label>
                                    <select class="form-control" id="user-state" name="sizes">
                                        <option value="">Please choose state</option>
                                        <?php foreach($p['sizes'] as $size):?>
                                            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div id="spdd" class="pb-2 pt-0"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group w-100 mb-4">
                                <input class="form-control form-control-lg detail-quantity" name="qty" type="number" value="1" min="1" max="11">
                                <div class="input-group-append flex-grow-1">
                                    <button class="btn btn-dark btn-block" type="submit" name="padd"> <i class="icon-Shopping-Cart mr-2"></i>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                            <ul class="nav nav-actions">
                                <li class="nav-item">
                                    <input id="wshrl" type="hidden" value="<?php echo $p['link']; ?>">
                                    <div class="nav-link" id="shess" style="cursor: pointer;"><input type="hidden" value="<?php echo $p['p_tok']; ?>">Add to wishlist</div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Share this product</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <span class="fab fa-whatsapp"></span>
                                            <a href="https://api.whatsapp.com/send?phone=YOUR_NUMBER&text=<?php echo $p['link']; ?>" class="dropdown-item" data-show-count="false">Whatsapp</a>
                                        </li>
                                       <li>
                                            <span class="fab fa-twitter"></span>
                                            <a href="https://twitter.com/intent/tweet?text=Check out this product on my website&url=<?php echo $p['link']; ?>" class="dropdown-item" data-show-count="false">Tweet</a>
                                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="row gutter-2 gutter-md-4 justify-content-end">
                    <div class="col-lg-5">
                        <ul class="list-group list-group-line">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                SKU
                                <span class="text-dark"><?php echo $p['sku']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Category
                                <span class="text-dark"><a href="single-category?category=<?php echo trim(str_replace(' ', '-', strip_tags($p['name']))); ?>&token=<?php echo $p['token']; ?>" class="underline text-dark"><?php echo $p['name']; ?></a></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tags
                                <span class="text-dark">
                            <?php foreach($p['tags'] as $tag): ?>
                                <a href="index?s=<?php echo $tag; ?>" class="underline text-dark ml-1"><?php echo $tag; ?></a>
                            <?php endforeach; ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>