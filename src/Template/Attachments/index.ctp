<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachment Types'), ['controller' => 'AttachmentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment Type'), ['controller' => 'AttachmentTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachments index large-9 medium-8 columns content">
    <h3><?= __('Attachments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('attachment_type_id') ?></th>
                <th><?= $this->Paginator->sort('project_id') ?></th>
                <th><?= $this->Paginator->sort('task_id') ?></th>
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
                <td><?= $attachment->has('task') ? $this->Html->link($attachment->task->id, ['controller' => 'Tasks', 'action' => 'view', $attachment->task->id]) : '' ?></td>
                <td><?= h($attachment->file_name) ?></td>
                <td><?= h($attachment->created_at) ?></td>
                <td><?= $this->Number->format($attachment->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attachment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attachment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?>
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
</div>
