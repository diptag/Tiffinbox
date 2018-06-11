                    <div id="image-upload-modal" class="modal fade" tabindex="-1" role="dialog" aria-labeledby="image-upload-modal-title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="dialog">
                            <form action="imageuploads" method="POST" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" style="display:inline;">Upload Image</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="close">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                    <?php if (isset($error_msg)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $error_msg ?>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $("#image-upload-modal-btn").trigger('click');
                                            });
                                        </script>
                                    <?php endif; ?>
                                        <div class="form-group">
                                            <label for="image_upload" class="form-label">Upload Image: </label>
                                            <input type="file" name="image_upload" class="form-control" required onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])" />
                                        </div>
                                        <div class="form-group">
                                            <label for="image_description" class="form-label">Description: </label>
                                            <input type="text" name="image_description" class="form-control" maxlength="50" required/>
                                        </div>
                                        <img id="preview-image" style="max-height: 100%; max-width: 100%; object-fit: contain;"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success col-md-2" type="submit">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Uploaded Images</h2>
                            <div class="right">
                                <a id="image-upload-modal-btn" class="btn btn-success" data-toggle="modal" data-target="#image-upload-modal">
                                    <i class="fa fa-plus"></i> &nbsp;&nbsp;<span>Upload New Image</span>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body" id="image-viewer">
                        </div>
                        <div class="panel-footer">
                            <div id="pagination" align="center"></div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $("#image-viewer").load("imageuploads?page=1");
                            $("#pagination").bootpag({
                                total: <?= $num_pages ?>,
                                page: 1,
                                maxVisible: 5,
                            }).on("page", function(e, num_page){
                                $("#image-viewer").load("imageuploads?page="+num_page);
                            });
                        });
                    </script>
