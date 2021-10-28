<div class="modal fade modal-right" id="writeReview" tabindex="-1" role="dialog" aria-labelledby="writeReviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="writeReviewLabel">New Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form class="row gutter-2" id="WRT" method="post" action="product?name=<?php echo trim(str_replace(' ', '-', strip_tags($p['title']))); ?>&Pdk=<?php echo rawurlencode($p['p_tok']); ?>">
                    <div class="modal-body">
                        <div class="container-fluid mb-3">
                            <p id="Rerr"></p>
                        </div>
                        <div class="form-group col-12">
                            <label for="reviewname">Name</label>
                            <input type="text" class="form-control" name="reviewname" value="<?php echo Auth::$auths == 0 ? '' : Auth::$auths['lastname']; ?>" id="reviewname" placeholder="john" requiredf>
                        </div>
                        <div class="form-group col-12">
                            <label for="reviewemail">Email address</label>
                            <input type="email" class="form-control" name="reviewemail" value="<?php echo Auth::$auths == 0 ? '' : Auth::$auths['email']; ?>" id="reviewemail" placeholder="name@example.com" requiredf>
                        </div>
                        <div class="form-group col-12">
                            <label for="reviewratingselect">Rating</label>
                            <select class="form-control custom-select" name="reviewrating" id="reviewratingselect" requiredf>
                                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733; (5/5)</option>
                                <option value="4">&#9733;&#9733;&#9733;&#9733;&#9734; (4/5)</option>
                                <option value="3">&#9733;&#9733;&#9733;&#9734;&#9734; (3/5)</option>
                                <option value="2">&#9733;&#9733;&#9734;&#9734;&#9734; (2/5)</option>
                                <option value="1">&#9733;&#9734;&#9734;&#9734;&#9734; (1/5)</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="reviewtext">Example textarea</label>
                            <textarea class="form-control" name="reviewtext" id="reviewtext" rows="5" requiredf></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container-fluid">
                            <div class="row gutter-0">
                                <div class="col">
                                    <button type="submit" class="btn btn-lg btn-primary" name="Wrt">Publish Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>