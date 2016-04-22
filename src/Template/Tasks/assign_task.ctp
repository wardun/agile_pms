<?php
if(isset($_POST['detail'])){
    $details = $_POST['detail'];
}else{
    $details = '';
}
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Assign task</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($task) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('title',['class' => 'form-control', 'value' => $task->task_name, 'disabled' => true]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->select('assgined_to', $users,['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('start_date', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('end_date', ['class' => 'form-control']); ?>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
