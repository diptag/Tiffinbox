                        <br>
                        <div class="container">
                            <div style="display: flex; justify-content: center;">
                                <h2>Overview</h2>
                            </div>
                            <?php if (isset($error_msg) && !empty($error_msg)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error_msg ?>
                            </div>
                            <? endif; ?>
                            <br>
                            <form action="overview" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="overview" class="col-md-2 col-form-label">Overview:</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="overview" maxlength="255" required><?php if (isset($tiffin_center["overview"])) echo $tiffin_center["overview"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="image_upload">Upload Image: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" name="image_upload" class="form-control" style="display: inline-block;" onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])" <?php if (!isset($tiffin_center)) echo "required" ?>/>
                                    </div>
                                </div>
                                <button class="btn btn-primary center-submit" type="submit">Update Overview</button>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img id="preview-image" style="max-height: 100%; max-width: 100%; object-fit: contain;"/>
                                    </div>
                                </div>
                            </form>
                        </div>
