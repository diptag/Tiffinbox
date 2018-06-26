        <div class="row login-form">
            <div class="col-md-3">
                <h3>Add New Menu</h3><br>
                <?php if (isset($error_msg) && !empty($error_msg)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error_msg ?>
                </div>
                <? endif; ?>
                <form action="add-menu" method="POST">
                    <div class="form-group">
                        <label for="menu-items" class="col-form-label">Menu Items</label>
                        <textarea name="menu" id="menu-items" placeholder="Menu Items" rows="5" maxlength="255" style="width: 100%" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Price" required/>
                    </div>
                    <button class="btn btn-primary" type="submit"><strong>Add Menu</strong></button>
                </form>
            </div>
        </div>
