<div class="box">
    <div class="box-header">
        <h3 class="box-title">View All Attachments</h3>
    </div><!-- /.box-header -->
    <?//= $this->Form->create() ?>
    <div class="box-body">
         <?= $this->Form->create('', ['type' => 'get']) ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $this->Form->input('attachment_type_id', ['options' => $attachmentTypes, 'class' => 'form-control', 'empty' => '--Select Type--']); ?>
                </div>
            </div>
              <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                    <?php echo $this->Form->input('project_id', ['options' => $projects, 'class' => 'form-control', 'empty' => '--Select Project--']); ?>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <input type="button" class="btn" id="submit" value="Submit" style="margin-top: 23px">
            </div>
        </div>
    </div><!-- /.box-body -->


    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('attachment_type_id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('file_name') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attachments as $attachment): ?>
                    <tr>
                        <td><?= $this->Number->format($attachment->id) ?></td>
                        <td><?= $attachment->has('attachment_type') ? $attachment->attachment_type->title : '' ?></td>
                        <td><?= $attachment->has('project') ? $attachment->project->title : '' ?></td>
                        <td><?= h($attachment->file_name) ? $this->Html->link($attachment->file_name, ['controller' => 'Attachments', 'action' => 'download', $attachment->id]) : ''?></td>
                        <td><?= h($attachment->created_at) ?></td>
                        <td><?= $this->Number->format($attachment->created_by) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', '', $attachment->id), array('class' => 'btn btn-sm btn-success view', 'title' => 'View', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $attachment->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('action' => 'download', '', $attachment->id), array('class' => 'btn btn-sm btn-primary ', 'title' => 'Download', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $attachment->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $attachment->first_name)]); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div><!-- /.box-body -->
</div>

<script>
    $(function () {
        $(".selectprojall").select();
        //$(".selectproj2").select();
//        $("#accordion").accordion();

       /*
        $('#submit').on('click', function () {
            var projectId = $('#project-id1').val();
            var sprintId = $('#attachment_type_id').val();
            $.post("<?php echo $this->Url->build(["controller" => "sprints", "action" => "getTasksofSprint"]) ?>", {_csrfToken: '<?= $this->request->param('_csrfToken') ?>', sprintId: sprintId, projectId: projectId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                $('#user-story-data').html(data);
            }).fail(function () {
                //alert("error");
            }).always(function () {
            });
        })

*/
    });
</script>
