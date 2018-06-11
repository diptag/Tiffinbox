                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <h2>Tiffin Centers</h2>
                                        <div class="right"><a href="add-tiffin-center" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;&nbsp;<span>Add New Tiffin Center</span></a></div>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped" id="data-table">
                                        <thead>
                                            <tr>
                                                <th>Order Number</th>
                                                <th>Customer Number</th>
                                                <th>Order Date</th>
                                                <th>Required Date</th>
                                                <th>Shipped Date</th>
                                                <th>Status</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $("#data-table").DataTable({
                                        responsive: true,
                                        processing: true,
                                        serverSide: true,
                                        ajax: {
                                            url: "tabletest",
                                            type: 'POST'
                                        },
                                        columns: [
                                            {data: "orderNumber"},
                                            {data: "customerNumber"},
                                            {data: "orderDate"},
                                            {data: "requiredDate"},
                                            {data: "shippedDate"},
                                            {data: "status"},
                                            {data: "comments"}
                                        ],
                                    });
                                });
                            </script>
                        </div>
                    </div>
