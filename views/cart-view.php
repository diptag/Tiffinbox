        <div class="container">
            <br>
            <div style="text-align: center">
                <h2>Tiffin Box Cart</h2>
            </div>
            <?php if (isset($error_msg)): ?>
            <br>
            <div class="alert alert-warning">
                <?= $error_msg ?>
            </div>
            <?php endif; ?>
            <form action="checkout" method="POST">
                <table class="table table-striped" id="items-table">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Tiffin Center</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_SESSION["cart"])):
                                foreach ($_SESSION["cart"] as $id => $item):
                        ?>
                        <tr>
                            <td><?= $item["menu"] ?></td>
                            <td><?= $item["tiffin_center"] ?></td>
                            <td class="item-price"><i class="fa fa-inr"></i> <span><?= $item["price"] ?></span></td>
                            <td class="item-quantity"><input type="number" name="product<?= $i++ ?>" value="<?= $item["quantity"] ?>" min="1" max="10" /></td>
                            <td class="item-remove">
                                <button type="button" data-item="<?= $item["id"] ?>" class="btn btn-primary">Remove</button>
                            </td>
                            <td class="item-total"><i class="fa fa-inr"></i> <span><?= number_format(floatval($item["price"]) * $item["quantity"], 2, '.', '') ?></span></td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <p>Subtotal: <span style="float: right"><i class="fa fa-inr"></i> <span class="items-subtotal">0<span></span></p>
                        <p>Tax (5%): <span style="float: right"><i class="fa fa-inr"></i> <span class="items-tax">0<span></span></p>
                        <p>Grand Total: <span style="float: right"><i class="fa fa-inr"></i> <span class="items-grand-total">0<span></span></p>
                        <br>
                        <button type="button" class="btn btn-primary" id="clear-cart" style="float: right;">Clear</button>
                    </div>
                </div>
            </form>
        </div>

        <script charset="utf-8">
            var taxRate = 0.05;

            function updateItemTotal (item) {
                var total = parseInt($(item).val()) * parseFloat($(item).parent().parent().children('.item-price').children('span').text());
                $(item).parent().parent().children('.item-total').children('span').html(total.toFixed(2));
            }

            function updateTotal() {
                var subtotal = 0;

                $('.item-total').each( function () {
                    subtotal += parseFloat($(this).children('span').text());
                } );

                var tax = subtotal * taxRate;
                var total = subtotal + tax;

                $('.items-subtotal').html(subtotal.toFixed(2));
                $('.items-tax').html(tax.toFixed(2));
                $('.items-grand-total').html(total.toFixed(2));
            }
            $(function () {
                updateTotal();
                $('.item-quantity input').change( function () {
                    updateItemTotal(this);
                    updateTotal();
                } );

                $('.item-remove button').click(function() {
                    var item = $(this).data('item');
                    $.post("cart", {remove: item}, function () {
                        location.href = "cart";
                    });
                });

                $("#clear-cart").click(function() {
                    $.post("cart", {removeAll : "0"}, function () {
                        location.href = "home";
                    });
                });
            });
        </script>
