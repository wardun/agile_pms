<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Task</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
      <?= $this->Form->create($task) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('project_id',['class' => 'form-control']);?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('task_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('detail', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('assgined_to', ['class' => 'form-control']); ?>
        </div>
          <div class="form-group">
            <?php echo $this->Form->input('created_at', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('created_by', ['class' => 'form-control']); ?>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
