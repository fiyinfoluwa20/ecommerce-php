<div class="hero pb-10">
    <div class="container">
        <div class="row gutter-1">
            <?php $categories = selectAll('categories', ['published' => 1]); foreach ($categories as $category):; ?>
                <div class="col-md-6">
                    <a href="<?php echo 'single-category?category='. strip_tags($category['name']) .'&token='. strip_tags($category['token']); ?>" class="card card-equal card-scale">
                        <span class="image" style="background-image: url(<?php echo WEB . '/assets/uploads/' . selectOne('products', ['category_id' => $category["id"]])["image1"]; ?>)"></span>
                        <div class="card-footer">
                            <span class="btn btn-white btn-lg btn-action"><?php echo $category['name']; ?><span class="icon-arrow-right"></span></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>