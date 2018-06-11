        <div class="row login-form">
            <div class="col-md-3">
                <h3><?= $login_type ?> Login</h3><br>
                <?php if (isset($error_msg) && !empty($error_msg)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error_msg ?>
                </div>
                <? endif; ?>
                <form action="<?= $form_action ?>" method="POST">
                    <div class="form-group">
                        <label for="input-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="input-email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="input-pass" class="col-form-label">
                            Password
                            <a href="forgot-password" style="float: right;">Forgot Password?</a>
                        </label>
                        <input type="password" class="form-control" name="pass" id="input-pass" placeholder="Password" pattern=".{8,20}" required title="8 to 20 Characters Long"/>
                    </div>
                    <button class="btn btn-primary" type="submit"><strong>Login</strong></button>
                </form>
            </div>
        </div>
