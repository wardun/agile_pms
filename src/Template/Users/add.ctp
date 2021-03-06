<?php
$userRoles = [1 => 'Admin', 'Project Manager', 'Employee', 'QA', 'Scrum Master'];
if (isset($_POST['joindate'])) {
    $joinData = $_POST['joindate'];
} else {
    $joinData = '';
}
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
            <label>Join Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="joindate" value="<?php echo $joinData?>" class="form-control pull-right datepicker">
            </div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('salary', ['class' => 'form-control']); ?>
        </div>
        <!--        <div class="form-group">
        <?php // echo $this->Form->input('status', ['class' => 'form-control']);  ?>
                </div>-->
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