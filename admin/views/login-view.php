		<div class="vertical-align-wrap" style="display: flex; justify-content: center; align-items: center;">
            <div class="auth-box">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
                            <p class="lead">Login to your account</p>
                        </div>
                        <?php if (isset($error_msg) && !empty($error_msg)): ?>
                        <div class="alert alert-warning" role="alert">
                            <?= $error_msg ?>
                        </div>
                        <? endif; ?>
                        <form class="form-auth-small" action="login" method="POST">
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="email" class="form-control" id="signin-email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">The TiffinBox Admin Panel</h1>
                        <p>Satiate Your Hunger</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
