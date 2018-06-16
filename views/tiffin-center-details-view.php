                                <div class="modal-header">
                                    <h2 id="details-modal-label" class="modal-title">Tiffin Center Details</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <?php if (isset($error_msg)): ?>
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error_msg ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="assets/images/Home/Image11.png">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 style="margin-bottom: 15px;"><?= $tiffin_center["name"] ?></h3>
                                            <p><strong>Location:</strong> <?= $tiffin_center["city"].", ".$tiffin_center["state"] ?></p>
                                            <p><strong>Menu:</strong> <?= $tiffin_center["menu"] ?></p>
                                            <p><strong>Price:</strong> <i class="fa fa-inr"></i> <?= $tiffin_center["price"] ?></p>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px; display: flex; justify-content: center;">
                                        <p><?= $tiffin_center["overview"] ?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                                <?php endif; ?>
