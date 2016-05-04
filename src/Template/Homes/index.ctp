<!-- Small boxes (Stat box) -->
<style>
    #calendar .datepicker{
        display: none !important;
    }
</style>
<div class="row">

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $totalEmployee ?></h3>
                <p>Total Employee</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <?php if ($userInfo['role'] == 1 || $userInfo['role'] == 2): ?>
                <a href="<?php echo $this->Url->build(["controller" => "users", "action" => "index"]) ?>" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
            <?php endif; ?>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $runningProjects ?></h3>
                <p>Running Projects</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ($userInfo['role'] == 1 || $userInfo['role'] == 2): ?>
                <a href="<?php echo $this->Url->build(["controller" => "projects", "action" => "index"]) ?>" class="small-box-footer">View All <i class="fa fa-arrow-circle-right"></i></a>
            <?php endif; ?>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $notices ?></h3>
                <p>New Notices</p>
            </div>
            <div class="icon">
                <i class="ion ion-easel"></i>
            </div>
            <a href="<?php echo $this->Url->build(["controller" => "notices", "action" => "index"]) ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->


    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $birthdayInfo ?></h3>
                <p>Birthday</p>
            </div>
            <div class="icon">
                <i class="ion ion-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<div class="row">
    <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">This Month's Calendar</h3>
            </div>
            <div class="box-body">
                <div id="calendar"></div>
            </div>
        </div>
    </section>
</div>

<div class="row">
    <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Projects Status</h3>
            </div>
            <div class="box-body">
                <?php for($i=1; $i<=$$runningProjects; $i++){?>
                <?php }?>
                <div class="row"><div class="col-lg-12"><h3>Project 1</h3></div></div>
                <div class="col-lg-6">
                    <canvas id="project1s1" style="height:250px"></canvas>
                    <script>
                        $(function () {
                            var areaChartData = {
                                labels: ["Total", "Completed", "Sprint Plan", "Not Yet Completed"],
                                datasets: [
                                    {
                                        label: "Sprint1",
                                        fillColor: "rgba(210, 214, 222, 1)",
                                        strokeColor: "rgba(210, 214, 222, 1)",
                                        pointColor: "rgba(210, 214, 222, 1)",
                                        pointStrokeColor: "#c1c7d1",
                                        pointHighlightFill: "#fff",
                                        pointHighlightStroke: "rgba(220,220,220,1)",
                                        data: [10, 6, 8, 9]
                                    },
                                    {
                                        label: "Sprint2",
                                        fillColor: "rgba(60,141,188,0.9)",
                                        strokeColor: "rgba(60,141,188,0.8)",
                                        pointColor: "#3b8bba",
                                        pointStrokeColor: "rgba(60,141,188,1)",
                                        pointHighlightFill: "#fff",
                                        pointHighlightStroke: "rgba(60,141,188,1)",
                                        data: [10, 6, 8, 9]
                                    }
                                ]
                            };

                            var barChartCanvas = $("#project1s1").get(0).getContext("2d");
                            var barChart = new Chart(barChartCanvas);
                            var barChartData = areaChartData;
                            //        barChartData.datasets[1].fillColor = "#00a65a";
                            //        barChartData.datasets[1].strokeColor = "#00a65a";
                            //        barChartData.datasets[1].pointColor = "#00a65a";
                            var barChartOptions = {
                                //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                                scaleBeginAtZero: true,
                                //Boolean - Whether grid lines are shown across the chart
                                scaleShowGridLines: true,
                                //String - Colour of the grid lines
                                scaleGridLineColor: "rgba(0,0,0,.05)",
                                //Number - Width of the grid lines
                                scaleGridLineWidth: 1,
                                //Boolean - Whether to show horizontal lines (except X axis)
                                scaleShowHorizontalLines: true,
                                //Boolean - Whether to show vertical lines (except Y axis)
                                scaleShowVerticalLines: true,
                                //Boolean - If there is a stroke on each bar
                                barShowStroke: true,
                                //Number - Pixel width of the bar stroke
                                barStrokeWidth: 2,
                                //Number - Spacing between each of the X value sets
                                barValueSpacing: 5,
                                //Number - Spacing between data sets within X values
                                barDatasetSpacing: 1,
                                //String - A legend template
                                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                                //Boolean - whether to make the chart responsive
                                responsive: true,
                                maintainAspectRatio: true
                            };

                            barChartOptions.datasetFill = false;
                            barChart.Bar(barChartData, barChartOptions);
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="row">
    <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Todays Task</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Task</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="row">
    <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Todays Scrum Report</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Downlaod</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project</td>
                            <td>Downlaod</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


<script>
    $(function () {

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            //Random default events
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    backgroundColor: "#f56954", //red
                    borderColor: "#f56954" //red
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2),
                    backgroundColor: "#f39c12", //yellow
                    borderColor: "#f39c12" //yellow
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                    backgroundColor: "#0073b7", //Blue
                    borderColor: "#0073b7" //Blue
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false,
                    backgroundColor: "#00c0ef", //Info (aqua)
                    borderColor: "#00c0ef" //Info (aqua)
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    backgroundColor: "#00a65a", //Success (green)
                    borderColor: "#00a65a" //Success (green)
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/',
                    backgroundColor: "#3c8dbc", //Primary (light-blue)
                    borderColor: "#3c8dbc" //Primary (light-blue)
                }
            ],
        });


    });
</script>