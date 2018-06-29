                <div class="row justify-content-center">
                    <form action="<?= $form_action ?>" id="tiffin-center-form" method="POST" class="form-center panel" accept-charset="utf-8" autocomplete="on" enctype="multipart/form-data">
                        <div class="panel-heading">
                            <h3>Add New Tiffin Center</h3>
                        </div>

                        <div class="panel-body">
                            <div id="error_msg" class="alert alert-danger" role="alert" <?php if (!isset($error_msg)) echo "hidden"; ?>>
                                <?php if (isset($error_msg)) echo $error_msg; ?>
                            </div>
                            <div class="form-group row align-content-center">
                                <label for="tc_name" class="col-md-2 col-form-label">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" name="tc_name" class="form-control" value="<?php if (isset($tiffin_center["name"])) echo $tiffin_center["name"]; ?>" pattern="[A-Za-z ]{3,}"  autofocus required title="Should at least 3 characters long"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_address" class="col-md-2 col-form-label">Address:</label>
                                <div class="col-md-10">
                                    <input type="text" name="tc_address" class="form-control" value="<?php if (isset($tiffin_center["address"])) echo $tiffin_center["address"]; ?>" pattern="[A-Za-z0-9 ,-]{3,}" required title="Enter a Valid Address"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_city" class="col-md-2 col-form-label">City:</label>
                                <div class="col-md-10">
                                    <input type="text" name="tc_city" class="form-control" value="<?php if (isset($tiffin_center["city"])) echo $tiffin_center["city"]; ?>" pattern="[A-Za-z ]{3,}" required title="Enter a valid City Name" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_state" class="col-md-2 col-form-label">State:</label>
                                <div class="col-md-10">
                                    <input type="text" name="tc_state" class="form-control" value="<?php if (isset($tiffin_center["state"])) echo $tiffin_center["state"]; ?>" pattern="[A-Za-z ]{3,}" required title="Enter a Valid State Name" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_email" class="col-md-2 col-form-label">Email:</label>
                                <div class="col-md-10">
                                    <input type="email" name="tc_email" class="form-control" value="<?php if (isset($tiffin_center["email"])) echo $tiffin_center["email"]; ?>" required title="Enter a Valid Email" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_contact" class="col-md-2 col-form-label">Contact No.:</label>
                                <div class="col-md-10">
                                    <input type="text" name="tc_contact" class="form-control" value="<?php if (isset($tiffin_center["contact_no"])) echo $tiffin_center["contact_no"]; ?>" pattern="[0-9]{10}" required title="Enter a Valid Contact Number"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_overview" class="col-md-2 col-form-label">Overview:</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="tc_overview" maxlength="255" required><?php if (isset($tiffin_center["overview"])) echo $tiffin_center["overview"]; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_plan" class="col-md-2 col-form-label">Plan:</label>
                                <div class="col-md-10">
                                    <select name="tc_plan" class="form-control">
                                        <?php foreach ($plans as $plan): ?>
                                        <option value="<?= $plan["id"] ?>" <?php if (isset($tiffin_center["plan_id"]) && $plan["id"] === $tiffin_center["plan_id"]) echo "selected"; ?>><?= $plan["name"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <?php if (!isset($tiffin_center)): ?>
                            <div class="form-group row">
                                <label for="tc_password" class="col-md-2 col-form-label">Password:</label>
                                <div class="col-md-10">
                                    <input type="password" id="tc_password1" name="tc_password" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tc_retype_password" class="col-md-2 col-form-label">Re - type Password:</label>
                                <div class="col-md-10">
                                    <input type="password" id="tc_password2" name="tc_retype_password" class="form-control" onblur="validatePassword();" required />
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="image_upload">Upload Image: </label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="image_upload" class="form-control" style="display: inline-block;" onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])" <?php if (!isset($tiffin_center)) echo "required" ?>/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <img id="preview-image" style="max-height: 100%; max-width: 100%; object-fit: contain;"/>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-success center-submit" type="submit" <?php if (isset($tiffin_center["id"])) echo "name=\"tc_id\" value=".$tiffin_center["id"]; ?>><?php if (isset($tiffin_center["id"])) echo "Edit Tiffin Center"; else echo "Add New Tiffin Center"; ?></button>
                    </form>
                </div>
                <script>
                    function validatePassword() {
                        var pwd = $("#tc_password1").val();
                        var repwd = $("#tc_password2").val();
                        if (pwd.length < 8) {
                            $("#error_msg").show();
                            $("#error_msg").html("Password too short! It should be at least 8 characters long.");
                        }
                        else if (pwd != repwd) {
                            $("#error_msg").show();
                            $("#error_msg").html("Passwords Do not Match!");
                        }
                    };

                </script>
