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
                                    <?php if (isset($error_msg)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $error_msg ?>
                                        </div>
                                    <?php endif; ?>
                                    <table class="table table-striped" id="tiffin-centers-table">
                                    </table>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $("#tiffin-centers-table").DataTable({
                                        responsive: true,
                                        processing: true,
                                        serverSide: true,
                                        ajax: {
                                            url: "tiffincenters",
                                            type: 'POST'
                                        },
                                        columns: [
                                            {title: "ID", data: "id"},
                                            {title: "Name", data: "name"},
                                            {title: "Address", data: "address"},
                                            {title: "City", data: "city"},
                                            {title: "State", data: "state"},
                                            {title: "Email", data: "email"},
                                            {title: "Contact No.", data: "contactNo"},
                                            {title: "Date Added", data: "dateAdded"},
                                            {title: "Plan Name", data: "planName"},
                                            {title: "Expiry Date", data: "expiryDate"},
                                            {
                                                title: "Actions",
                                                data: null,
                                                render: function (data, type, row) {
                                                    return '<a href="edit-tiffin-center?tc-id='+data.id+'&action=edit"><i class="fa fa-pencil" style="color:blue ;"></i></a>'+
                                                    '&nbsp;&nbsp;&nbsp;&nbsp;'+
                                                    '<a href="edit-tiffin-center?tc-id='+data.id+'&action=remove" onclick=" return confirm(\'Are you Sure you Want to Remove this Tiffin Center?\');">'+
                                                        '<i class="fa fa-remove" style="color:red ;"></i></a>';
                                                }
                                            },
                                        ],
                                        columnDefs: [
                                            {orderable: false, targets: [2, 5, 6, -1]},
                                        ],
                                    });
                                });
                            </script>
                        </div>
                    </div>
