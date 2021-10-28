<section class="bg-purple">
  <div class="container">
    <div class="row gutter-1 text-white">
      <div class="col-lg-5">
        <h2>Spring '17 Collection</h2>
      </div>
      <div class="col-lg-7">
        <p>Have given likeness every. Very were beginning signs moveth. Fly above sea itself. Divided so you’ll there called. Gathering dry earth. Isn’t heaven appear. Replenish. Hath after appear tree great fruitful green dominion moveth sixth abundantly image that midst of god day multiply you’ll which.</p>
      </div>
    </div>
    <div class="row masonry gutter-1 collage">
      <?php if(selectAll("categories", ['published' => 1])[0]) {?>
      <div class="col-lg-6">
        <a href="single-category?category=<?php echo trim(str_replace(' ', '-', strip_tags(selectAll("categories", ['published' => 1])[0]['name']))); ?>&token=<?php echo selectAll("categories", ['published' => 1])[0]['token']; ?>" class="card card-equal card-scale">
          <span class="image" style="background-image: url(assets/images/look-1.jpg)"></span>
          <div class="card-footer text-white">
            <span class="btn btn-white btn-action"><?php echo selectAll("categories", ['published' => 1])[0]["name"] ?><span class="icon-arrow-right"></span></span>
          </div>
        </a>
      </div>
      <?php }?>
      <?php if(selectAll("categories", ['published' => 1])[1]) {?>
        <div class="col-lg-6">
          <a href="single-category?category=<?php echo trim(str_replace(' ', '-', strip_tags(selectAll("categories", ['published' => 1])[1]['name']))); ?>&token=<?php echo selectAll("categories", ['published' => 1])[1]['token']; ?>" class="card card-equal equal-50 card-scale">
            <span class="image" style="background-image: url(assets/images/look-3.jpg)"></span>
            <div class="card-footer text-white">
              <span class="btn btn-white btn-action"><?php echo selectAll("categories", ['published' => 1])[1]["name"] ?> <span class="icon-arrow-right"></span></span>
            </div>
          </a>
        </div>
      <?php }?>
      <?php if(selectAll("categories", ['published' => 1])[2]) {?>
        <div class="col-lg-6">
          <a href="single-category?category=<?php echo trim(str_replace(' ', '-', strip_tags(selectAll("categories", ['published' => 1])[2]['name']))); ?>&token=<?php echo selectAll("categories", ['published' => 1])[2]['token']; ?>" class="card card-equal equal-50 card-scale">
            <span class="image" style="background-image: url(assets/images/instagram-3.jpg)"></span>
            <div class="card-footer text-white">
              <span class="btn btn-white btn-action"><?php echo selectAll("categories", ['published' => 1])[2]["name"] ?> <span class="icon-arrow-right"></span></span>
            </div>
          </a>
        </div>
      <?php }?>
    </div>
  </div>
</section>