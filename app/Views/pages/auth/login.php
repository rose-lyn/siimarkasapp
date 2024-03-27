<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Login</h3>
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
            <form method="POST" action="<?= base_url('login/enter') ?>">
                <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>NIA</label>
                        <input type="text" class="form-control p_input" name="nia">
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input type="password" class="form-control p_input" name="password">
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div>
                        <a href="#" class="forgot-pass">Forgot password</a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                    </div>
              
                <p class="sign-up">Don't have an Account?<a href="<?= base_url('register') ?>"> Sign Up</a></p>
            </form>
            </div>
        </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
</div>