<?php if(isset($_SESSION['message'])): ?>
<div aria-live="polite" class="mt-3" aria-atomic="true" style="position: relative">
    <div style="position: absolute; top: 0; right: 0;" class="">
        <div class="toast text-base <?php echo $_SESSION['type']; ?>" role="alert" id="tt" aria-live="assertive" aria-atomic="true"  data-delay="10000" style="min-height: 100px; width: 20rem;">
            <div class="toast-header <?php echo $_SESSION['type']; ?>">
                <img src="assets/images/logo-dark.svg" class="toast-rounded mr-2">
                <strong class="mr-auto text-dark">Geokiddies</strong>
                <small class="text-light"><?php if(isset($_SESSION['time'])): ?><?php echo $_SESSION['time']; ?><?php endif; ?></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body text-dark">
            <?php echo $_SESSION['message']; ?>
            </div>
        </div>
    </div>
</div>
<?php
   unset($_SESSION['message']);
   unset($_SESSION['type']);
   unset($_SESSION['time']);
  ?>
<?php endif; ?>