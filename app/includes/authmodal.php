<div class="modal fade" id="authmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav list-inline" role="tablist">
                    <li class="list-inline-item font-weight-bolder">
                        <a style="font-size: 23px;" class="nav-link nav-link-lg active" data-toggle="tab" href="#loginmodal" role="tab" id="loginModal" aria-controls="loginmodal" aria-selected="true">Login</a>
                    </li>
                    <li class="list-inline-item font-weight-bolder">
                        <a style="font-size: 23px;" class="nav-link nav-link-lg" data-toggle="tab" href="#registerModal" role="tab" id="registerModalLink" aria-controls="registerModal" aria-selected="false">Register</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <hr>
                <div class="tab-content">
                    <div class="tab-pane fade active show px-25" id="loginmodal" role="tabpanel" aria-labelledby="loginModal">
                        <div id="hzzz" class="pb-3d">
                            <p id="sss"></p>
                        </div>
                        <form method="post" id="floi" action="checkout">
                            <div class="form-group">
                                <label for="sign-in-modal-email">Email address</label>
                                <input type="text" class="form-control" name="email" id="sign-in-modal-email">
                            </div>
                            <div class="form-group">
                                <div class="float-right"><a class="form-text small" data-toggle="modal" data-dismiss="modal" aria-label="Close" href="#forgotpasswordmodal" role="tab" id="forgotpasswordmodald" aria-controls="forgotpasswordmodal" aria-selected="true">Forgot password?</a></div>
                                <div class="pt-2"><label for="pass-visibility" class="form-label">password</label></div>
                                <div class="password-toggle">
                                    <input type="password" name="password" class="form-control">
                                    <label class="password-toggle-btn">
                                        <input type="checkbox" id="pass-visibility" class="custom-control-input">
                                        <i class="icon-eye password-toggle-indicator"></i>
                                        <span class="sr-only">Show password</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="remember" type="checkbox" name="remember">
                                    <label class="custom-control-label text-muted" for="remember">remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-outline-primary" type="submit" name="floi">Log in</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade px-25" id="registerModal" role="tabpanel" aria-labelledby="registerModalLink">
                        <div id="hxz">
                            <p id="yei"></p>
                        </div>
                        <form method="post" id="flop" action="checkout">
                            <div class="form-group">
                                <label class="form-label" for="sign-up-modal-firstname">First name</label>
                                <input class="form-control" type="text" name="firstname" placeholder="Joe" id="sign-up-modal-firstname">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sign-up-modal-lastname">Last name</label>
                                <input class="form-control" type="text" name="lastname" placeholder="black" id="sign-up-modal-lastname">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sign-up-modal-email">Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="joe.black@gmail.com" id="sign-up-modal-email">
                            </div>
                            <div class="form-group">
                                <label for="oojggk">password</label>
                                <div class="password-toggle">
                                    <input type="password" id="oojggk" name="password" class="form-control">
                                    <label class="password-toggle-btn">
                                        <input type="checkbox" class="custom-control-input">
                                        <i class="icon-eye password-toggle-indicator"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-none" id="generator">
                                <div class="col-lg-8">
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
                            </div>
                            <div class="form-group">
                                <label for="pass-visibility">confirm password</label>
                                <div class="password-toggle">
                                    <input type="password" name="passwordcnf" class="form-control">
                                    <label class="password-toggle-btn">
                                        <input type="checkbox" class="custom-control-input">
                                        <i class="icon-eye password-toggle-indicator"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group my-2">
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
                            <div class="pt-4 text-center">
                                <button class="btn btn-block btn-outline-primary" type="submit" name="flop"><i class="fa fas-user mr-2"></i>Register</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>