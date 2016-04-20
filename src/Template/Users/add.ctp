<?php
$userRoles = [1 => 'Admin', 'Project Manager', 'Employee'];
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add User</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($user) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->select('role', $userRoles, ['class' => 'form-control', 'empty' => '--Select Role--']); ?>
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
            <label>Date range:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="joindate" class="form-control pull-right datepicker">
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
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd"
        });

    });
</script>