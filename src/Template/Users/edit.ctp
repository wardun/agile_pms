<?php
$userRoles = [1 => 'Admin', 'Project Manager', 'Employee'];
if (isset($_POST['joindate'])) {
    $joinData = $_POST['joindate'];
} else {
    $joinData = date('Y-m-d', strtotime($user->joindate));
}

$lastIncrement = date('Y-m-d', strtotime($salaryInfo->last_increment_date));
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($user) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->select('role', $userRoles, ['class' => 'form-control', 'default' => $user->role]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('username', ['class' => 'form-control']); ?>
        </div>
        <!--        <div class="form-group">
        <?php // echo $this->Form->input('password', ['class' => 'form-control']); ?>
                </div>-->
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
                <input type="text" name="joindate" value="<?php echo $joinData ?>" class="form-control pull-right datepicker">
            </div>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('salary', ['class' => 'form-control', 'value' => $salaryInfo->current_salaty]); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('last_increment_amount', ['class' => 'form-control', 'value' => $salaryInfo->last_increment_amount]); ?>
        </div>
        <div class="form-group">
            <label>Last Increment Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="last_increment_date" value="<?php echo $lastIncrement ?>" class="form-control pull-right datepicker">
            </div>
        </div>
        <!--        <div class="form-group">
        <?php // echo $this->Form->input('status', ['class' => 'form-control']); ?>
                </div>-->
        <div class="form-group">
            <?php
            if ($user->employee_salaries) {
                echo $this->Form->input('' . $user->employee_salaries->current_salaty . '', ['label' => 'Salary', 'class' => 'form-control']);
                //echo '<option value="'.$user->id.'">'.$user->username.'</option>';
            }
            ?>
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