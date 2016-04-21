<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Team</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($team) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('title', ['label' => 'Team Name', 'class' => 'form-control', 'empty' => true]); ?>
        </div>
        <div class="form-group">
            <!--<label>Select User</label>-->
            <select class="form-control select2" name="user_id[]" multiple="multiple" data-placeholder="Select Users">
                <?php
                if ($users) {
                    foreach ($users as $user) {
                        echo '<option value="'.$user->id.'">'.$user->username.'</option>';
                    }
                    unset($user);
                }
                ?>
            </select>
        </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

    });
</script>