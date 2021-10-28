<div class="modal fade modal-right" id="reviews" tabindex="-1" role="dialog" aria-labelledby="reviewsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewsLabel">Reviews (<?php echo count($Allreviews); ?>) </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(empty($Allreviews)): ?>
          <div class="h3 text-center">Empty review</div>
        <?php else: ?>
          <div class="row">
              <?php foreach ($Allreviews as $revie): ?>
                <div class="col-12">
                  <blockquote class="testimonial">
                    <div class="testimonial-rate">
                      <?php for($i=0; $i < $revie['reviewrating']; $i++):?>
                        <span class="icon-ui-star"></span>
                      <?php endfor; ?>
                    </div>
                    <p><?php echo html_entity_decode($revie['reviewtext']); ?> </p>
                    <footer><?php echo html_entity_decode($revie['reviewname']); ?> on <?php echo date('F j, Y g:i a', strtotime($revie['created_at'])); ?></footer>
                  </blockquote>
                </div>
              <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <div class="container-fluid">
          <div class="row gutter-0">
            <div class="col">
              <a href="" class="btn btn-lg btn-block btn-primary" onclick="$('#reviews').modal('hide')" data-toggle="modal" data-target="#writeReview">Write Review</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>