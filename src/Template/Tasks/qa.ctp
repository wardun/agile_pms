<div class="box">
    <div class="box-header">
        <h3 class="box-title">QA Report</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <?php echo $this->Form->input('task_name', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <?php // echo $this->Form->input('description', ['class' => 'form-control']); ?>
                    <label>QA Report</label>
                    <textarea name="qa_report" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                     <label>Check Box</label>
                    <?php  echo $this->Form->checkbox('description', ['class' => 'form-control']); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary', 'style' => 'margin-top:25px')); ?>
            </div>
        </div>
    </div><!-- /.box-body -->

    <div class="box-body">
                <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Bug Lists</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tasks1</td>
                        <td>User story UI1</td>
                    </tr>
                     <tr>
                        <td>Tasks2</td>
                        <td>User story UI2</td>
                    </tr>
                     <tr>
                        <td>Tasks3</td>
                        <td>User story UI3</td>
                    </tr>
                </tbody>
                </table>
    </div><!-- /.box-body -->
</div>