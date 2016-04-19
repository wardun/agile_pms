<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Sprint</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($sprint) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('sprint', ['type' => 'text','class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('project_id', ['class' => 'form-control','options' => $projects]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('task_id', ['class' => 'form-control','options' => $tasks]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('is_completed', ['class' => 'form-control']); ?>
        </div>    
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->