<aside class="col-lg-5">
    <div class="row">
    <div class="col-md-10 mb-3">
        <h1 class="pb-3">Login</h1>
        <p class="lead">Already our customer?</p>
    </div>
    <form method="post" class="col-lg-12" id="floi" action="<?php echo $redirect; ?>">
        <div id="hzzz" class="pb-3d">
            <p id="sss"></p>
        </div>
        <div class="form-group col-12 mb-2">
            <label for="sign-in-email">Email address</label>
            <input type="text" class="form-control" name="email" id="sign-in-email">
        </div>
        <div class="form-group col-12">
        <label for="sign-in-password">password</label>
            <div class="password-toggle">
                <input type="password" id="sign-in-password" name="password" class="form-control">
                <label class="password-toggle-btn">
                    <input type="checkbox" class="custom-control-input">
                    <i class="icon-eye password-toggle-indicator"></i>
                    <span class="sr-only">Show password</span>
                </label>
            </div>
        </div>
        <div class="form-group col-12 my-2">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="remember" type="checkbox" name="remember">
                <label class="custom-control-label text-muted" for="remember">remember me</label>
            </div>
        </div>
        <div class="col-12 mt-1">
            <button class="btn btn-primary" type="submit" name="floi">Log In</button>
        </div>
    </form>

    </div>
</aside>