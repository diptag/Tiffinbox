                    <div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-modal-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="details-modal-content">
                            </div>
                        </div>
                    </div>

                    <div class="row menu-row">
                    <?php foreach ($tiffin_centers as $tiffin_center): ?>
                        <div class="col-md-6 col-sm-12 row">
                            <div class="col-md-6">
                                <img src="assets/images/Home/Image11.png">
                            </div>
                            <div class="col-md-6">
                                <h3 style="margin-bottom: 15px;"><?= $tiffin_center["name"] ?></h3>
                                <p><strong>Location:</strong> <?= $tiffin_center["city"].", ".$tiffin_center["state"] ?></p>
                                <p><strong>Menu:</strong> <?= $tiffin_center["menu"] ?></p>
                                <p><strong>Price:</strong> <i class="fa fa-inr"></i> <?= $tiffin_center["price"] ?></p>
                                <button type="button" class="btn btn-primary" style="margin-top: 10px; width: 100%;" data-toggle="modal" data-target="#details-modal" data-tfid="<?= $tiffin_center["id"] ?>">See Details</button>
                                <a href="#" class="btn btn-primary" style="margin-top: 10px; width: 100%;">Add to Cart</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>

                    <script>
                        $(function() {
                            $('#details-modal').on('show.bs.modal', function (event) {
                                var button = $(event.relatedTarget);
                                var tfid= button.data('tfid');
                                $('#details-modal-content').load("tiffin-center-details", {"tfid": tfid});
                            });
                        });
                    </script>
