<div class="modal sidebar fade" id="addresses" tabindex="-1" role="dialog" aria-labelledby="addressesLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="addressesLabel">My Addresses (<?php echo empty($useraddress) ? 0 : count($useraddress); ?>)</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row gutter-3">
        <?php if (empty($useraddress)): ?>
          <div class="col-12">
            <div class="text-center">
                <h3>Empty address</h3>
            </div>
          </div>
        <?php else: ?>
            <?php foreach ($useraddress as $address): ?>
              <div class="col-12">
                <div class="custom-control custom-choice">
                  <input type="radio" name="usergetaddress" class="custom-control-input" id="<?php echo $address['cart_token']; ?>">
                  <label class="custom-control-label text-dark" for="<?php echo $address['cart_token']; ?>">
                    <?php echo $address['address_shipping'] === 'empty' ? $address['address_invoice'] : $address['address_shipping']; ?> <?php echo $address['town_shipping'] === 'empty' ? $address['town_invoice'] : $address['town_shipping']; ?> <?php echo $address['state_shipping'] === 'empty' ? $address['state_invoice'] : $address['state_shipping']; ?>, <?php echo $address['country_shipping'] === 'empty' ? $address['country_invoice'] : $address['country_shipping']; ?>
                  </label>
                  <span class="choice-indicator"></span>
                </div>
              </div>
            <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</div>