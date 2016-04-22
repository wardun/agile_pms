<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Project</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($project) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('title', ['label' => 'Project Name','type' => 'text', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Manager</label>
            <?php echo $this->Form->select('managerid', $managers, ['label' => 'Select Manager', 'class' => 'form-control manager-id']); ?>
        </div>
        <div class="form-group">
            <label>Select Team</label>
            <?php echo $this->Form->select('team_id', '', ['label' => 'Select Team', 'class' => 'form-control team']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('client_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php // echo $this->Form->input('description', ['class' => 'form-control']); ?>
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Start Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="start_date" class="form-control pull-right datepicker">
            </div>
        </div>
        <div class="form-group">
            <label>End Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="end_date" class="form-control pull-right datepicker">
            </div>
        </div>
<!--        <div class="form-group">
            <label>Actual End Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="actual_end_date" class="form-control pull-right datepicker">
            </div>
        </div>-->
        <div class="form-group">
            <?php echo $this->Form->input('amount', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('duration', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('duration_hours', ['class' => 'form-control']); ?>
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
        
        $('.manager-id').on('change', function(){
            var managerId = $(this).val();
             $.post("<?php echo $this->Url->build(["controller" => "projects", "action" => "teams"]) ?>", {_csrfToken : '<?=$this->request->param('_csrfToken')?>', managerId: managerId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                $('.team').html(data);
                //$('#sub-categoryid').trigger("chosen:updated");
            }).fail(function () {
                //alert("error");
            }).always(function(){
            });
        }).change();

    });
</script>