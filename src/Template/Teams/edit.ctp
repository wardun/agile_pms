<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Team</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($team) ?>
    <div class="box-body">
<<<<<<< HEAD
        <div class="form-group">
            <?php echo $this->Form->input('title', ['label' => 'Title', 'class' => 'form-control', 'empty' => true]); ?>
        </div>
        <div class="form-group">
            <?php
           if($team->team_details){
                echo $this->Form->input('' . $team->team_details->user_id . '', ['label' => 'Users', 'class' => 'form-control']);
                //echo '<option value="'.$user->id.'">'.$user->username.'</option>';
            }
            ?>
=======
<!--        <div class="form-group">
            <?php echo $this->Form->input('project_id',['class' => 'form-control']);?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('user_id', ['class' => 'form-control']); ?>
        </div>-->
        <div class="form-group">
            <?php echo $this->Form->input('cretaed_at', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('created_by', ['class' => 'form-control']); ?>
>>>>>>> 97efe3f0d17736b5a7ef43f38812e0cac1ccd00f
        </div>
    </div><!-- /.box-body -->

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div><!-- /.box -->
