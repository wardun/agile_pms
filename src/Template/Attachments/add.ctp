<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Upload Meeting Information</h3>
    </div><!-- /.box-header -->
<?=$this->Form->create($attachment,['type' => 'file']) ?>
    <div class="box-body">
        <div class="form-group">
            <?php echo $this->Form->input('attachment_type_id', ['options' => $attachmentTypes, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('project_id', ['options' => $projects, 'class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('file_name', ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <input type="file" name="sprint_file">
        </div>
    </div>

    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')); ?>
    </div>
</div>
