                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Overview</h3>
                            <p class="panel-subtitle">Period: <?= $startDate." - ".$curDate?></p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div id="headline-chart" class="ct-charts"></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="weekly-summary text-right">
                                        <span class="number"><?= $this_week["total_orders"] ?></span>
                                        <span class="percentage">
                                            <i class="fa <?php if ($this_week["total_orders"] > $last_week["total_orders"]) echo "fa-caret-up text-success"; else echo "fa-caret-down text-danger" ?>"></i>
                                            <?php if ($last_week["total_orders"] == 0) echo "100%"; else echo (abs($this_week["total_orders"] - $last_week["total_orders"])/$last_week["total_orders"]*100)."%"; ?>
                                        </span>
                                        <span class="info-label">Week Orders</span>
                                    </div>
                                    <div class="weekly-summary text-right">
                                        <span class="number"><i class="fa fa-inr" style="font-size: 30px;"></i> <?php if ($this_week["total_amount"] == NULL) echo "0"; else echo $this_week["total_amount"]; ?></span>
                                        <span class="percentage">
                                            <i class="fa <?php if ($this_week["total_amount"] > $last_week["total_amount"]) echo "fa-caret-up text-success"; else echo "fa-caret-down text-danger" ?>"></i>
                                            <?php if ($last_week["total_amount"] == 0) echo "100%"; else echo (abs($this_week["total_amount"] - $last_week["total_amount"])/$last_week["total_amount"]*100)."%"; ?>
                                        </span>
                                        <span class="info-label">Week Total</span>
                                    </div>
                                    <div class="weekly-summary text-right">
                                        <span class="number"><i class="fa fa-inr" style="font-size: 30px;"></i> <?php if ($this_month["total_amount"] == NULL) echo "0"; else echo $this_month["total_amount"]; ?></span>
                                        <span class="percentage">
                                            <i class="fa <?php if ($this_month["total_amount"] > $last_month["total_amount"]) echo "fa-caret-up text-success"; else echo "fa-caret-down text-danger" ?>"></i>
                                            <?php if ($last_month["total_amount"] == 0) echo "100%"; else echo (abs($this_month["total_amount"] - $last_month["total_amount"])/$last_month["total_amount"]*100)."%"; ?>
                                        </span>
                                        <span class="info-label">Month Total</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- RECENT ORDERS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recent Orders</h3>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Consumer ID</th>
                                                <th>Tiffin Center</th>
                                                <th>Amount</th>
                                                <th>City</th>
                                                <th>Date &amp; Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach ($recent_orders as $order):
                                        ?>
                                            <tr>
                                                <td><?= $order["id"] ?></td>
                                                <td><?= $order["consumer_id"] ?></td>
                                                <td><?= $order["tiffin_center_name"] ?></td>
                                                <td><?= $order["amount"] ?></td>
                                                <td><?= $order["city"] ?></td>
                                                <td><?= $order["date"] ?></td>
                                                <td>
                                                <?php
                                                    if ($order["status"] == "Completed")
                                                        echo "<span class=\"label label-success\">".$order["status"]."</span>";
                                                    elseif ($order["status"] == "Pending")
                                                        echo "<span class=\"label label-warning\">".$order["status"]."</span>";
                                                    elseif ($order["status"] == "Cancelled")
                                                        echo "<span class=\"label label-danger\">".$order["status"]."</span>";
                                                    elseif ($order["status"] == "Failed")
                                                        echo "<span class=\"label label-danger\">".$order["status"]."</span>";
                                                ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 7 Days</span></div>
                                        <div class="col-md-6 text-right"><a href="orders" class="btn btn-primary">View All Orders</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END RECENT ORDERS -->
                        </div>
                        <div class="col-md-6">
                            <!-- TASKS -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">My Tasks</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                </div>
                            </div>
                            <!-- END TASKS -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Javascript -->
            <script>
                $(function () {
                    Highcharts.chart('headline-chart', {
                        chart: {
                            type: 'areaspline'
                        },
                        title: {
                            text: 'Orders Comparison with Last Week'
                        },
                        xAxis: {
                            categories: [
                                'Monday',
                                'Tuesday',
                                'Wednesday',
                                'Thursday',
                                'Friday',
                                'Saturday',
                                'Sunday'
                            ],
                        },
                        yAxis: {
                            title: {
                                text: 'Orders'
                            }
                        },
                        tooltip: {
                            shared: true,
                            valueSuffix: ' orders'
                        },
                        plotOptions: {
                            areaspline: {
                                fillOpacity: 0.5
                            }
                        },
                        series: [{
                            name: 'Last Week',
                                data: [
                                <?php foreach($last_week_orders as $orders)
                                    echo $orders.", ";
                                ?>
                                ]
                        }, {
                            name: 'This Week',
                                data: [
                                <?php foreach($this_week_orders as $orders)
                                    echo $orders.", ";
                                ?>
                                ]
                        }]
                    });
                });
            </script>
