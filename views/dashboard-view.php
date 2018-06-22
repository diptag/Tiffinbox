                        <!-- Overview -->
                        <div class="container">
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
                                                <p>
                                                    <span class="number"><?= $this_week["total_orders"] ?></span>
                                                    <span class="percentage">
                                                        <i class="fa <?php if ($this_week["total_orders"] > $last_week["total_orders"]) echo "fa-caret-up text-success"; else echo "fa-caret-down text-danger" ?>"></i>
                                                        <?php if ($last_week["total_orders"] == 0) echo "100%"; else echo (abs($this_week["total_orders"] - $last_week["total_orders"])/$last_week["total_orders"]*100)."%"; ?>
                                                    </span>
                                                </p>
                                                <span class="info-label">Week Orders</span>
                                            </div>
                                            <div class="weekly-summary text-right">
                                                <p>
                                                    <span class="number"><i class="fa fa-inr"></i> <?php if ($this_week["total_amount"] == NULL) echo "0"; else echo $this_week["total_amount"]; ?></span>
                                                    <span class="percentage">
                                                        <i class="fa <?php if ($this_week["total_amount"] > $last_week["total_amount"]) echo "fa-caret-up text-success"; else echo "fa-caret-down text-danger" ?>"></i>
                                                        <?php if ($last_week["total_amount"] == 0) echo "100%"; else echo (abs($this_week["total_amount"] - $last_week["total_amount"])/$last_week["total_amount"]*100)."%"; ?>
                                                    </span>
                                                </p>
                                                <span class="info-label">Week Total</span>
                                            </div>
                                            <div class="weekly-summary text-right">
                                                <p>
                                                    <span class="number"><i class="fa fa-inr"></i> <?php if ($this_month["total_amount"] == NULL) echo "0"; else echo $this_month["total_amount"]; ?></span>
                                                    <span class="percentage">
                                                        <i class="fa <?php if ($this_month["total_amount"] > $last_month["total_amount"]) echo "fa-caret-up text-success"; else echo "fa-caret-down text-danger" ?>"></i>
                                                        <?php if ($last_month["total_amount"] == 0) echo "100%"; else echo (abs($this_month["total_amount"] - $last_month["total_amount"])/$last_month["total_amount"]*100)."%"; ?>
                                                    </span>
                                                </p>
                                                <span class="info-label">Month Total</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END OVERVIEW -->

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
                        </div>
                    </div>
