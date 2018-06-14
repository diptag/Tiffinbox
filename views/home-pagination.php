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
                                <a href="#" class="btn btn-primary" style="margin-top: 10px; width: 100%;">See Details</a>
                                <a href="#" class="btn btn-primary" style="margin-top: 10px; width: 100%;">Add to Cart</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
