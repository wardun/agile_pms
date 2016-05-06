<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Payment</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($payment) ?>
    <div class="box-body">
        <div class="form-group">
            <label>Project</label>
            <?php echo $this->Form->select('project_id', $projects, ['label' => 'Select Project', 'class' => 'form-control project_id']); ?>
       </div>
        <div class="form-group">
            <label>Select Sprints</label>
            <?php echo $this->Form->select('sprint','', ['label' => 'Select Sprints', 'class' => 'form-control sprint']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('amound', ['label' => 'Amount','class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Payment Receive Date</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="payment_receive_date" class="form-control pull-right datepicker">
            </div>
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
        
        $('.project_id').on('change', function(){
            var projectId = $(this).val();
             $.post("<?php echo $this->Url->build(["controller" => "payments", "action" => "sprint"]) ?>", {_csrfToken : '<?=$this->request->param('_csrfToken')?>', projectId: projectId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                $('.sprint').html(data);
                //$('#sub-categoryid').trigger("chosen:updated");
            }).fail(function () {
                //alert("error");
            }).always(function(){
            });
        }).change();

    });
</script>