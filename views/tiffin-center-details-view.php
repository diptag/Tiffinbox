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
                                            <img src="slir/h230-w230-c1x1<?= STATIC_IMG_DIR."tiffin_centers/".$tiffin_center["image"] ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <h3 style="margin-bottom: 15px;"><?= $tiffin_center["name"] ?></h3>
                                            <p><strong>Location:</strong> <?= $tiffin_center["city"].", ".$tiffin_center["state"] ?></p>
                                            <p><strong>Menu:</strong> <?= $tiffin_center["menu"] ?></p>
                                            <p><strong>Price:</strong> <i class="fa fa-inr"></i> <?= $tiffin_center["price"] ?></p>
                                            <p><strong>Rating:</strong> <?= $tiffin_center["rating"] ?> <i class="fa fa-star"></i></p>
                                        </div>
                                    </div>
                                    <br>
                                    <p><?= $tiffin_center["overview"] ?></p>
                                    <hr>
                                    <h5>Rate Us</h5>
                                    <form action="testimonials" method="POST">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" required/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                            <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                            <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                            <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                            <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Kinda bad - 1.5 stars"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                            <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                        </fieldset>
                                        <textarea class="form-control" name="testimonial" maxlength="255" rows="4" required></textarea>
                                        <br>
                                        <?php if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] != "Consumer"): ?>
                                            <em>You Need to Log in to Rate</em>
                                        <?php else: ?>
                                        <button type="submit" class="btn btn-primary" name="tfid" value="<?= $tiffin_center["id"] ?>">Submit</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                                <?php endif; ?>
