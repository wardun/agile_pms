<?php
if (isset($_POST['detail'])) {
    $details = $_POST['detail'];
} else {
    $details = '';
}
if (isset($_POST['start_date'])) {
    $start_date = $_POST['start_date'];
} else {
    $start_date = '';
}
if (isset($_POST['end_date'])) {
    $end_date = $_POST['end_date'];
} else {
    $end_date = '';
}
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Assign task</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($tasks) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('title', ['class' => 'form-control', 'value' => $tasks->task_name, 'disabled' => true]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('task_duration', ['class' => 'form-control', 'value' => $tasks->task_duration, 'disabled' => true]); ?>
        </div>
        <div class="form-group">
            <label>Assigned To</label>
            <?php echo $this->Form->select('assgined_to', $users, ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <div class="input-group" style="width: 80%">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="assign_date" value="<?php echo $start_date ?>" class="form-control pull-right datepicker">
            </div>
            <input type="text" name="start_time" class="form-control timepicker" placeholder="select time" style="float: right; width: 18%;position: relative;top: -34px">
        </div>
        <div class="form-group">
            <label>End Date:</label>
            <div class="input-group" style="width: 80%">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="delivery_date" value="<?php echo $end_date ?>" class="form-control pull-right datepicker">
            </div>
            <input type="text" name="end_time" class="form-control timepicker" placeholder="select time" style="float: right; width: 18%;position: relative;top: -34px">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="" value="1"> Force assign to this sprint
            </label>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->

<script>
    $(function () {
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd"
        });
        
        $('.timepicker').timepicker({
            timeFormat: 'H:mm:ss',
            //startTime: new Date(0,0,0,8,0,0),
            minHour: 9,
            maxHour: 20,
            interval: 60 // 1 hour
        });

    });
</script>
