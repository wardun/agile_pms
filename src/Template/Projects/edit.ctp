<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Project</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
   <?= $this->Form->create($project) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('managerid',['class' => 'form-control']);?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('client_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('description', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('amount', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('duration', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('duration_hours', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('current_status', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
             <label>Actual End Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <?php echo $this->Form->input('actual_end_date',['class' => 'form-control pull-right datepicker']);?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('created_by', ['class' => 'form-control']); ?>
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

    });
</script>