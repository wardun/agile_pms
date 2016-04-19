<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachment Types'), ['controller' => 'AttachmentTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment Type'), ['controller' => 'AttachmentTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attachments view large-9 medium-8 columns content">
    <h3><?= h($attachment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Attachment Type') ?></th>
            <td><?= $attachment->has('attachment_type') ? $this->Html->link($attachment->attachment_type->title, ['controller' => 'AttachmentTypes', 'action' => 'view', $attachment->attachment_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Project') ?></th>
            <td><?= $attachment->has('project') ? $this->Html->link($attachment->project->id, ['controller' => 'Projects', 'action' => 'view', $attachment->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Task') ?></th>
            <td><?= $attachment->has('task') ? $this->Html->link($attachment->task->id, ['controller' => 'Tasks', 'action' => 'view', $attachment->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('File Name') ?></th>
            <td><?= h($attachment->file_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attachment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($attachment->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($attachment->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('File Type') ?></h4>
        <?= $this->Text->autoParagraph(h($attachment->file_type)); ?>
    </div>
</div>
