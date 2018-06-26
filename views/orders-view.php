                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="heading-center">
                                            <h2>Orders</h2>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table table-striped" id="orders-table">
                                        </table>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#orders-table").DataTable({
                                            responsive: true,
                                            processing: true,
                                            serverSide: true,
                                            ajax: {
                                                url: "orders",
                                                type: 'POST'
                                            },
                                            columns: [
                                                {title: "ID", data: "orderId"},
                                                {title: "Consumer Name", data: "consumerName"},
                                                {title: "Tiffin Center Name", data: "tiffinCenterName"},
                                                {title: "Menu", data: "menu"},
                                                {title: "Amount", data: "amount"},
                                                {title: "Payment ID", data: "paymentId"},
                                                {title: "City", data: "city"},
                                                {title: "Date & Time", data: "datetime"},
                                                {title: "Status", data: "status"},
                                                {
                                                    title: "Action",
                                                    data: null,
                                                    render: function (data, type, row) {
                                                        if (data.status != "Completed")
                                                            return '<a href="orders?completed='+data.orderId+'" class="btn btn-primary">Mark as Completed</a>';
                                                        else
                                                            return '<em>No Actions Required</em>';
                                                    },
                                                },
                                            ],
                                            columnDefs: [
                                                {orderable: false, targets: [3, 9]}
                                            ],
                                            order: [[7, "DESC"]],
                                        });
                                    });
                                </script>
                            </div>
                        </div>
