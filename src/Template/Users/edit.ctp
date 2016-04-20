<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($user) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('role',['class' => 'form-control']);?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('username', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('password', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('email', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('first_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('last_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('designation', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <?php echo $this->Form->input('joindate',['class' => 'form-control pull-right datepicker1']);?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('status', ['class' => 'form-control']); ?>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
<script>
    $(function () {
        $('.datepicker1').datepicker({
            format: "yyyy-mm-dd"
        });

    });
</script>