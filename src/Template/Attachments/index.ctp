<div class="box">
    <div class="box-header">
        <h3 class="box-title">View All Attachments</h3>
    </div><!-- /.box-header -->
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
                <td><?= $attachment->has('attachment_type') ? $this->Html->link($attachment->attachment_type->title, ['controller' => 'AttachmentTypes', 'action' => 'view', $attachment->attachment_type->id]) : '' ?></td>
                <td><?= $attachment->has('project') ? $this->Html->link($attachment->project->id, ['controller' => 'Projects', 'action' => 'view', $attachment->project->id]) : '' ?></td>
                <td><?= h($attachment->file_name) ?></td>
                <td><?= h($attachment->created_at) ?></td>
                <td><?= $this->Number->format($attachment->created_by) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', '', $attachment->id), array('class' => 'btn btn-sm btn-success view', 'title' => 'View', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $attachment->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                             <?php echo $this->Html->link('<i class="fa fa-download"></i>', array('action' => 'edit', '', $attachment->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
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

