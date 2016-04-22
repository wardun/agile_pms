<?php
if(isset($_POST['detail'])){
    $details = $_POST['detail'];
}else{
    $details = '';
}
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Task</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($task) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('project_id', ['class' => 'form-control','options' => $projects]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('task_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Task Detail</label>
            <textarea name="detail" class="form-control"><?=$details?></textarea>
        </div>
<!--        <div class="form-group">
            <?php //echo $this->Form->input('assgined_to', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php //echo $this->Form->input('start_date', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php //echo $this->Form->input('end_date', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php //echo $this->Form->input('actual_end_date', ['class' => 'form-control']); ?>
        </div>-->
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->