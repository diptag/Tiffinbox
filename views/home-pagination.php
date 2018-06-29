                    <div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-modal-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="details-modal-content">
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="message-modal-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="message-modal-content">
                                <div class="modal-body"><h3></h3></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row menu-row">
                    <?php foreach ($tiffin_centers as $tiffin_center): ?>
                        <div class="col-md-6 col-sm-12 row">
                            <div class="col-md-6">
                                <img src="slir/h220-w220-c1x1<?= STATIC_IMG_DIR."tiffin_centers/".$tiffin_center["image"] ?>">
                            </div>
                            <div class="col-md-6">
                                <h3 style="margin-bottom: 15px;"><?= $tiffin_center["name"] ?></h3>
                                <p><strong>Location:</strong> <?= $tiffin_center["city"].", ".$tiffin_center["state"] ?></p>
                                <p><strong>Menu:</strong> <?= $tiffin_center["menu"] ?></p>
                                <p><strong>Price:</strong> <i class="fa fa-inr"></i> <?= $tiffin_center["price"] ?></p>
                                <button type="button" class="btn btn-primary" style="margin-top: 10px; width: 100%;" data-toggle="modal" data-target="#details-modal" data-tfid="<?= $tiffin_center["id"] ?>">See Details</button>
                                <button type="submit" name="item" value="<?= $tiffin_center["id"] ?>" data-item="<?= $tiffin_center["id"] ?>" class="btn btn-primary add-to-cart" style="margin-top: 10px; width: 100%;">Add to Cart</button>
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

                            $(".add-to-cart").click(function() {
                                $.post("cart", {item: $(this).data("item")}, function (data) {
                                    $("#message-modal-content .modal-body h3").html(data);
                                    $("#message-modal").modal("show");
                                })
                            })
                        });
                    </script>
