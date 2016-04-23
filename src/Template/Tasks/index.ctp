<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tasks</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('task_name') ?></th>
                    <th><?= $this->Paginator->sort('task_duration') ?></th>
                    <th><?= $this->Paginator->sort('assgined_to') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('actual_end_date') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $this->Number->format($task->id) ?></td>
                        <td><?= $task->has('project') ? $this->Html->link($task->project->id, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                        <td><?= h($task->task_name) ?></td>
                        <td><?= h($task->task_duration) ?></td>
                        <td><?= $this->Number->format($task->assgined_to) ?></td>
                        <td><?= h($task->start_date) ?></td>
                        <td><?= h($task->end_date) ?></td>
                        <td><?= h($task->actual_end_date) ?></td>
                        <td><?= h($task->created_at) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', '', $task->id), array('class' => 'btn btn-small btn-success view', 'title' => 'View', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-tag"></i>', array('action' => 'assign_task', '', $task->id), array('class' => 'btn btn-small btn-primary', 'title' => 'Assign Task', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $task->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $task->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $task->id)]); ?>

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
