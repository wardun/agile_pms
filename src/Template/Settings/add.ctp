<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Settings</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($setting) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('app_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('company_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('logo', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('phone', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('website', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('sprint_duration', ['class' => 'form-control']); ?>
        </div>
      
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->