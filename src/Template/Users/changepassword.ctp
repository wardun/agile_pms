<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Change Password</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($user) ?>
    <div class="box-body">

        <div class="form-group">
            <?php echo $this->Form->input('new_password', ['class' => 'form-control','type' => 'password',]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('confirm_password', ['class' => 'form-control','type' => 'password',]); ?>
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
