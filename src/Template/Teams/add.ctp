<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Team</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($team) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('project_id', ['class' => 'form-control','options' => $projects, 'empty' => true]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('user_id', ['class' => 'form-control','options' => $users, 'empty' => true]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('cretaed_at', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('created_by', ['class' => 'form-control']); ?>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
