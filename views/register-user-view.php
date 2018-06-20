        <div class="row login-form">
            <div class="col-md-5">
                <h3>Register User</h3><br>
                <div id="error_msg" class="alert alert-danger" role="alert" <?php if (!isset($error_msg)) echo "hidden"; ?>>
                    <?php if (isset($error_msg)) echo $error_msg; ?>
                </div>
                <form action="register-user" method="POST">
                    <div class="form-group">
                        <label for="input-name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="input-name" placeholder="Name" pattern="[A-Za-z ]{3,}" autofocus required title="Should at least 3 characters long"/>
                    </div>
                    <div class="form-group">
                        <label for="input-address" class="col-form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="input-address" placeholder="Address" pattern="[A-Za-z0-9 ]{6,}" required title="Should at least 6 characters long"/>
                    </div>
                    <div class="form-group">
                        <label for="input-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="input-email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <label for="input-contact" class="col-form-label">Contact No.</label>
                        <input type="text" class="form-control" name="contact" id="input-contact" placeholder="Contact No." pattern="[0-9]{10}" required title="Enter a Valid 10 digit Contact Number"/>
                    </div>
                    <div class="form-group">
                        <label for="input-city" class="col-form-label">City</label>
                        <input type="text" class="form-control" name="city" id="input-city" placeholder="City" pattern="[A-Za-z ]{3,}" required title="Enter a Valid City Name"/>
                    </div>
                    <div class="form-group">
                        <label for="input-state" class="col-form-label">State</label>
                        <input type="text" class="form-control" name="state" id="input-state" placeholder="State" pattern="[A-Za-z ]{3,}" required title="Enter a Valid State Name"/>
                    </div>
                    <div class="form-group">
                        <label for="input-pass" class="col-form-label">Password</label>
                        <input type="password" class="form-control" name="pass" id="input-pass" placeholder="Password" pattern=".{8,20}" required title="Password should be 8 to 20 Characters Long"/>
                    </div>
                    <div class="form-group">
                        <label for="input-repass" class="col-form-label">Retype Passowrd</label>
                        <input type="password" class="form-control" name="repass" id="input-repass" placeholder="Retype Passowrd" onblur="validatePassword()" pattern=".{8,20}" required title="8 to 20 Characters Long"/>
                    </div>
                    <button class="btn btn-primary" type="submit"><strong>Register</strong></button>
                </form>
            </div>
            <script>
                function validatePassword() {
                    var pwd = $("#input-pass").val();
                    var repwd = $("#input-repass").val();
                    if (pwd != repwd) {
                        $("#error_msg").show();
                        $("#error_msg").html("Passwords Do not Match!");
                    }
                };
            </script>
        </div>
