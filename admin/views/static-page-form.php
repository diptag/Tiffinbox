                <form action="<?= $form_action ?>" method="POST" class="panel" autocomplete="on" style="padding: 20px;">
                    <?php if (isset($error_msg)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_msg ?>
                    </div>
                    <?php endif; ?>
                    <div class="panel-heading">
                        <h3><?= $heading ?></h3>
                    </div>
                    <div class="form-group row align-content-center">
                        <label for="sp_name" class="col-md-2 col-form-label">Page Title:</label>
                        <div class="col-md-10">
                        <input type="text" name="sp_name" class="form-control" <?php if (isset($sp_name)) { echo "value=\"$sp_name\""; } ?> autofocus required/>
                        </div>
                    </div>
                    <div class="form-group row align-content-center">
                        <div class="col-md-12">
                            <textarea id='editor' name="sp_page_content" class="form-control">
                                <?php if (isset($sp_page_content)) echo $sp_page_content; ?>
                            </textarea>
                        </div>
                    </div>
                    <button class="btn btn-success center-submit" type="submit" <?php if (isset($sp_id)) { echo "name=\"sp_id\" value=\"$sp_id\""; } ?>><?= $heading ?></button>
                </form>
                <script>
                    CKEDITOR.replace('editor', {
                        height: 300
                    });
                </script>
