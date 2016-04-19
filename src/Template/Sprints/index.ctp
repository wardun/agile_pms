<div class="box">
    <div class="box-header">
        <h3 class="box-title">Sprints</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sprint') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('task_id') ?></th>
                    <th><?= $this->Paginator->sort('is_completed') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sprints as $sprint): ?>
                    <tr>
                        <td><?= $this->Number->format($sprint->id) ?></td>
                        <td><?= $this->Number->format($sprint->sprint) ?></td>
                        <td><?= $sprint->has('project') ? $this->Html->link($sprint->project->id, ['controller' => 'Projects', 'action' => 'view', $sprint->project->id]) : '' ?></td>
                        <td><?= $sprint->has('task') ? $this->Html->link($sprint->task->id, ['controller' => 'Tasks', 'action' => 'view', $sprint->task->id]) : '' ?></td>
                        <td><?= $this->Number->format($sprint->is_completed) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', '', $sprint->id), array('class' => 'btn btn-small btn-success view', 'title' => 'View', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $sprint->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $sprint->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $sprint->id)]); ?>

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

