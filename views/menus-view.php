                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <h2 style="margin-left: 30px;">Menus</h2>
                                            <div style="position: absolute; right: 50px; top: 8%"><a href="add-menu" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;&nbsp;<span>Add New Menu</span></a></div>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <table class="table table-striped" id="menus-table">
                                        </table>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        var table = $("#menus-table").DataTable({
                                            responsive: true,
                                            processing: true,
                                            serverSide: true,
                                            ajax: {
                                                url: "menus",
                                                type: 'POST'
                                            },
                                            columns: [
                                                {title: "ID", data: "menuId"},
                                                {title: "Menu", data: "menu"},
                                                {title: "Date & Time", data: "datetime"},
                                                {title: "Price", data: "price"},
                                                {title: "Status", data: "status"},
                                                {
                                                    title: "Action",
                                                    data: null,
                                                    render: function (data, type, row) {
                                                        if (data.status != "Active")
                                                            return '<a href="menus?activate='+data.menuId+'" class="btn btn-primary">Set as Active</a>';
                                                        else
                                                            return '<a href="menus?deactivate='+data.menuId+'" class="btn btn-primary">Set as Inactive</a>';
                                                    },
                                                },
                                            ],
                                            columnDefs: [
                                                {orderable: false, targets: [5]}
                                            ],
                                            order: [[3, "DESC"]],
                                        });
                                    });
                                </script>
                            </div>
                        </div>
