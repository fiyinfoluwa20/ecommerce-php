<div class="collapse <?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? $_SESSION['SVA']['ipc'] > 0 ? 'show ' . 'fade' : '' : ''; ?>" id="shippingAddress">
    <div class="row align-items-end mb-2">
        <div class="col-md-6">
            <h2 class="h3 mb-0">Shipping Address</h2>
        </div>
    </div>
    <div class="row gutter-1 mb-6">
        <div class="form-group col-md-6">
            <label for="firstname_shipping1">First Name</label>
            <input type="text" class="form-control" id="firstname_shipping1" name="firstname_shipping" value="<?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? !isset($_SESSION['SVA']['name2']) ? '' : $_SESSION['SVA']['name2'] : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="lastname_shipping1">Last Name</label>
            <input type="text" class="form-control" id="lastname_shipping1" name="lastname_shipping" value="<?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? !isset($_SESSION['SVA']['lname2']) ? '' : $_SESSION['SVA']['lname2'] : ''; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="email_shipping1">email</label>
            <input type="email" class="form-control" id="email_shipping1" name="email_shipping" value="<?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? !isset($_SESSION['SVA']['email2']) ? '' : $_SESSION['SVA']['email2'] : ''; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="state_shipping1">State</label>
            <select class="form-control text-uppercase" id="state_shipping1" name="state_shipping">
                  <?php $a = Auth::state(Auth::$auths);
                    if (!empty($a)){
                        if ($a['attribute'] == 0) {
                           echo  '<option value="">select a state</option>';
                        }
                        foreach ($a as $b){
                            echo $b;
                        }
                    }
                  ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="town_shipping1">Town</label>
            <select class="form-control text-uppercase" id="town_shipping1" name="town_shipping">
                <?php $a = Auth::town();
                    if (!empty($a)){
                        if ($a['a'] == 0) {
                           echo  '<option value="">select a town</option>';
                        }
                        foreach ($a as $b){
                            echo $b;
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="country_shipping1">Country</label>
            <select class="form-control text-uppercase" id="country_shipping1" name="country_shipping">
                <?php if(User::$auth == 1 && isset($_SESSION['SVA']) && isset($_SESSION['SVA']['country_shipping'])): ?>
                <option value="<?php echo $_SESSION['SVA']['country2']; ?>"><?php echo $_SESSION['SVA']['country2']; ?></option>
                <?php endif; ?>
                <option value="Nigeria">Nigeria</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="telephone_shipping1">telephone</label>
            <input type="text" class="form-control" id="telephone_shipping1" name="telephone_shipping" value="<?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? !isset($_SESSION['SVA']['phone2']) ? '' : $_SESSION['SVA']['phone2'] : ''; ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="company_shipping1">Company Name <span class="text-muted">(optional)</span> </label>
            <input type="text" class="form-control" id="company_shipping1" name="company_shipping" value="<?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? !isset($_SESSION['SVA']['company2']) ? '' : $_SESSION['SVA']['company2'] : ''; ?>">
        </div>
        <div class="form-group col-md-12">
            <label for="address_shipping1">Address</label>
            <input type="text" class="form-control" id="address_shipping1" name="address_shipping" value="<?php echo User::$auth == 1 && isset($_SESSION['SVA']) ? !isset($_SESSION['SVA']['address2']) ? '' : $_SESSION['SVA']['address2'] : ''; ?>">
        </div>

    </div>
</div> 