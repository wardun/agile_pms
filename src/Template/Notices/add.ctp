<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Add Notice</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($notice) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('title', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="notice_description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Action Date:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="action_date" class="form-control pull-right datepicker">
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
        });
</script>