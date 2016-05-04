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
                <?php
                if ($proejcts) {
                    foreach ($proejcts as $proejct) {
                        $sprintInfo = $sprintStatus[$proejct->id];
                        ?>
                        <div class="row"><div class="col-lg-12"><h3>Project: <?= $proejct->title ?></h3></div></div>
                        <?php
                        if ($sprintStatus[$proejct->id]) {
                            foreach ($sprintStatus[$proejct->id] as $sprintInfo) {
                                $sprint = json_decode($sprintInfo);
                                ?>
                                <div class="col-lg-6">
                                    <h4 class="center">Sprint <?=$sprint->sprint?></h4>
                                    <canvas id="project<?= $proejct->id ?>s<?=$sprint->sprint?>" style="height:250px"></canvas>
                                    <script>
                                        $(function () {
                                            //-------------
                                            //- PIE CHART -
                                            //-------------
                                            // Get context with jQuery - using jQuery's .get() method.
                                            var pieChartCanvas = $("#project<?= $proejct->id ?>s<?=$sprint->sprint?>").get(0).getContext("2d");
                                            var pieChart = new Chart(pieChartCanvas);
                                            var PieData = [
                                                {
                                                    value: <?=$sprint->total?>,
                                                    color: "#3C8DBC",
                                                    highlight: "#3C8DBC",
                                                    label: "Total"
                                                },
                                                {
                                                    value: <?=$sprint->completed?>,
                                                    color: "#00a65a",
                                                    highlight: "#00a65a",
                                                    label: "Completed"
                                                },
                                                {
                                                    value: <?=$sprint->pending?>,
                                                    color: "#f56954",
                                                    highlight: "#f56954",
                                                    label: "Pending"
                                                }
                                            ];
                                            var pieOptions = {
                                                //Boolean - Whether we should show a stroke on each segment
                                                segmentShowStroke: true,
                                                //String - The colour of each segment stroke
                                                segmentStrokeColor: "#fff",
                                                //Number - The width of each segment stroke
                                                segmentStrokeWidth: 2,
                                                //Number - The percentage of the chart that we cut out of the middle
                                                percentageInnerCutout: 50, // This is 0 for Pie charts
                                                //Number - Amount of animation steps
                                                animationSteps: 100,
                                                //String - Animation easing effect
                                                animationEasing: "easeOutBounce",
                                                //Boolean - Whether we animate the rotation of the Doughnut
                                                animateRotate: true,
                                                //Boolean - Whether we animate scaling the Doughnut from the centre
                                                animateScale: false,
                                                //Boolean - whether to make the chart responsive to window resizing
                                                responsive: true,
                                                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                                                maintainAspectRatio: true,
                                                //String - A legend template
                                                //legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
                                            };
                                            //Create pie or douhnut chart
                                            // You can switch between pie and douhnut using the method below.
                                            pieChart.Doughnut(PieData, pieOptions);
                                        });
                                    </script>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                    }
                }
                ?>
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