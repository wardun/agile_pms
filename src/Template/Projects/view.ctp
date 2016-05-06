<?php
$progress = ceil(($completedTask * 100) / $totalTask);
?>
<div class="box">
    <div class="box-header">
        <h2 class="box-title"><?= $project->title ?></h2>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <h4>General Information</h4>
                <table class="vertical-table">
                    <tr>
                        <th><?= __('Client Name') ?></th>
                        <td><?= h($project->client_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Duration') ?></th>
                        <td><?= h($project->duration) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($project->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Managerid') ?></th>
                        <td><?= $this->Number->format($project->managerid) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Amount') ?></th>
                        <td><?= $this->Number->format($project->amount) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Duration Hours') ?></th>
                        <td><?= $this->Number->format($project->duration_hours) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Current Status') ?></th>
                        <td><?= $this->Number->format($project->current_status) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Achieve Status') ?></th>
                        <td><?= $this->Number->format($project->achieve_status) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created By') ?></th>
                        <td><?= $this->Number->format($project->created_by) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Start Date') ?></th>
                        <td><?= h($project->start_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('End Date') ?></th>
                        <td><?= h($project->end_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Actual End Date') ?></th>
                        <td><?= h($project->actual_end_date) ?></td>
                    </tr>
                </table>        
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <h4>Project Status</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="clearfix">
                            <span class="pull-left">Completed</span>
                            <small class="pull-right"><?= $progress ?>%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: <?= $progress ?>%;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="dev-hours">
                            <h5>Hours when project starts</h5>
                            <?= $startHour ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dev-hours">
                            <h5>Completed task hours</h5>
                            <?= $completedHour ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dev-hours">
                            <h5>Plan wise completed hours</h5>
                            <?= $planedHour ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="dev-hours">
                            <h5>Hours after complete</h5>
                            <?= $finaldHour ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <h4>Reason for delay</h4>
                <ul>
                    <?php
                    foreach ($allTasks as $task) {
                        $datetime1 = new \DateTime(date('Y-m-d', strtotime($task->end_date)));
                        $datetime2 = new \DateTime(date('Y-m-d', strtotime($task->actual_end_date)));
                        $interval = $datetime1->diff($datetime2);

                        if ($interval->format('%R%a') > 0) {
                            ?>
                            <li>There was some bug fixing issue for the task: <?= $task->task_name ?></li>
                            <?php
                        }

                        if ($task->is_new == 1) {
                            ?>
                            <li>Client newly assigned task at <?= $task->created_at ?>. Task was: <?= $task->task_name ?></li>
                            <?php
                        }
                    }
                    ?>
                </ul>

            </div>
        </div>
    </div>
</div>