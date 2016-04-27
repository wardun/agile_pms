<?php
//echo $sprintCheck['sprint_status'];
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h5 class="box-title">Sprints</h5>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <?= $this->Form->create('', ['type' => 'get']) ?>
        <div class="row">
            <div class="col-lg-4">
                <label>Select Project</label>
                <div class="form-group">
                    <select name="project_id" class="form-control selectproj1 project-id" data-placeholder="Select Projects" id="project-id">
                        <option value="0">--Select Project--</option>
                        <?php
                        if ($projects) {
                            foreach ($projects as $project) {
                                $selected = ($projectId == $project->id) ? 'selected = selected' : '';
                                echo '<option value="' . $project->id . '" ' . $selected . '>' . $project->title . '</option>';
                            }
                            //                    unset($project);
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Select Sprint</label>
                    <select class="form-control selectproj2 sprint_id" id="sprints" name="sprint_id" data-placeholder="Select Sprint" <?= empty($sprintHtml) ? 'disabled=""' : '' ?>>
                        <?= $sprintHtml ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary', 'style' => 'margin-top: 23px')); ?>
            </div>
        </div>
    </div><!-- /.box-body -->

    <?php if (isset($sprintCheck['sprint_status'])) { ?>
        <?php if ($sprintCheck['sprint_status'] == 'not_yet_started') { ?>
            <div class="box-body">
                <div class="row">
                    <div class="box-body">
                        <h2>Sprint Not Yet Started</h2>
                    </div><!-- /.box-body -->
                </div>
            </div>
        <?php } else { ?>
            <div class="box-body">
                <div class="row">
                    <div class="color-palette-set">
                        <div class="col-lg-4">
                            <div class="bg-navy color-palette center p10">Sprint Start Date: 2016-04-15</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-navy color-palette center p10">Sprint End Date: 2016-04-30</div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-navy color-palette center p10">Remaining Days: 05 Days</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="box-header with-border">
                        <h5 class="box-title">Current Status</h5>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-6">
                            <div class="chart">
                                <canvas id="barChart" style="height:230px"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center">
                            <input type="text" class="knob" value="65" data-width="90" data-height="230" data-fgColor="#f56954">
                            <div class="knob-label">Bounce Rate</div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="box-header with-border">
                        <h5 class="box-title">Sprint Details</h5>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Assigned Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>Completed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="box-header with-border">
                        <h5 class="box-title">User wise Tasks Information</h5>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-4">
                            <h5>Developer 1</h5>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Assigned</th>
                                        <th>Hours</th>
                                        <th>Bugs</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4">
                            <h5>Developer 2</h5>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Assigned</th>
                                        <th>Hours</th>
                                        <th>Bugs</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4">
                            <h5>Developer 3</h5>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Assigned</th>
                                        <th>Hours</th>
                                        <th>Bugs</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>6 hours</td>
                                        <td>0</td>
                                        <td>Completed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="box-header with-border">
                        <h5 class="box-title">Daily Scrum Meeting Reports</h5>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Task 1</td>
                                        <td>2016-04-15</td>
                                        <td>Completed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>
        <?php } ?>
    <?php } ?>


</div><!-- /.box -->
<script>
    $(function () {
        $('.project-id').on('change', function () {
            var projectId = $(this).val();
            $.post("<?php echo $this->Url->build(["controller" => "sprints", "action" => "get-project-sprint"]) ?>", {_csrfToken: '<?= $this->request->param('_csrfToken') ?>', projectId: projectId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                if (data.length > 0) {
                    $('#sprints').html(data);
                    $('#sprints').removeAttr('disabled');
                }

            }).fail(function () {
                //alert("error");
            }).always(function () {
            });
        });


        //-------------
        //- BAR CHART -
        //-------------

        var areaChartData = {
            labels: ["Total", "Completed", "Sprint Plan", "Not Yet Completed"],
            datasets: [
                {
                    label: "Tasks",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [20, 11, 13, 9]
                }
            ]
        };

        var barChartCanvas = $("#barChart").get(0).getContext("2d");
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

        $(".knob").knob({
            /*change : function (value) {
             //console.log("change : " + value);
             },
             release : function (value) {
             console.log("release : " + value);
             },
             cancel : function () {
             console.log("cancel : " + this.value);
             },*/
            draw: function () {

                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv)  // Angle
                            , sa = this.startAngle          // Previous start angle
                            , sat = this.startAngle         // Start angle
                            , ea                            // Previous end angle
                            , eat = sat + a                 // End angle
                            , r = true;

                    this.g.lineWidth = this.lineWidth;

                    this.o.cursor
                            && (sat = eat - 0.3)
                            && (eat = eat + 0.3);

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value);
                        this.o.cursor
                                && (sa = ea - 0.3)
                                && (ea = ea + 0.3);
                        this.g.beginPath();
                        this.g.strokeStyle = this.previousColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });

    });
</script>

