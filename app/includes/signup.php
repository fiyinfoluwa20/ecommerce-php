<div class="col-lg-7 mb-10">
    <div class="row align-items-end mb-2">
        <div class="col-md-10 pb-5">
            <h1 class="pb-3">Register</h1>
            <p class="lead">Not our registered customer yet?</p>
            <p class="text-muted text-base">Registration with Geokiddies is quick and easy, and fantastic discounts and much more are open for you! The whole process will not take you more than a minute!</p>
            <p class="text-muted text-base">If you have any questions, please feel free to 
            <a href="contact">contact us</a>, our customer service center is working for you 24/7.
            </p>
        </div>
    </div>

    <form method="post" id="flop" action="<?php echo $redirect; ?>">
        <div id="hxz">
            <p id="yei"></p>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label class="form-label" for="sign-up-firstname">First name</label>
                <input class="form-control" type="text" name="firstname" placeholder="Joe" id="sign-up-firstname">
            </div>
            <div class="form-group col-lg-6">
                <label class="form-label" for="sign-up-lastname">Last name</label>
                <input class="form-control" type="text" name="lastname" placeholder="black" id="sign-up-lastname">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12">
                <label class="form-label" for="sign-up-email">Email Address</label>
                <input class="form-control" type="email" name="email" placeholder="joe.black@gmail.com" id="sign-up-email">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="sign-up-psw">password</label>
                <div class="password-toggle">
                    <input type="password" id="sign-up-psw" name="password" class="form-control">
                    <label class="password-toggle-btn">
                        <input type="checkbox" class="custom-control-input">
                        <i class="icon-eye password-toggle-indicator"></i>
                    </label>
                </div>
            </div>

            <div class="form-group col-lg-6">
                <label for="sign-up-passwordCnf">confirm password</label>
                <div class="password-toggle">
                    <input type="password" id="sign-up-passwordCnf" name="passwordcnf" class="form-control">
                    <label class="password-toggle-btn">
                        <input type="checkbox" class="custom-control-input">
                        <i class="icon-eye password-toggle-indicator"></i>
                    </label>
                </div>
            </div>
        
        </div>
        <div class="input-group form-group d-none pb-2" id="generator">
            <div class="col-lg-6">
                <div class="result-container">
                    <span id="rst-pw"></span>
                    <button class="btn" type="button" id="clipboard"><i class="icon-copy"></i></button>
                </div>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-primary btn-sm" type="button" id="gen">
                Generate password
                </button>
            </div>
        </div>
        <div class="form-group mb-1">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="sign-up-terms" type="checkbox" name="terms">
                <label class="custom-control-label text-muted" for="sign-up-terms"> 
                <span class="text-base">I agree to the 
                    <a href="terms.php"> terms and condition </a>
                </span>
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" name="subscribe" id="sign-up-subscribe" type="checkbox">
                <label class="custom-control-label text-muted" for="sign-up-subscribe">
                <span class="text-base">Subscribe to our newsletter</span>
                </label>
            </div>
        </div>
        <div class="pt-4">
            <button class="btn btn-primary" type="submit" name="flop">register</button>
        </div>
    </form>    

</div>