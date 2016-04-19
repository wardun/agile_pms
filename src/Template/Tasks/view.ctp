<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sprints'), ['controller' => 'Sprints', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sprint'), ['controller' => 'Sprints', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tasks view large-9 medium-8 columns content">
    <h3><?= h($task->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Project') ?></th>
            <td><?= $task->has('project') ? $this->Html->link($task->project->id, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Task Name') ?></th>
            <td><?= h($task->task_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($task->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assgined To') ?></th>
            <td><?= $this->Number->format($task->assgined_to) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($task->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($task->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($task->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Actual End Date') ?></th>
            <td><?= h($task->actual_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($task->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Detail') ?></h4>
        <?= $this->Text->autoParagraph(h($task->detail)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($task->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Attachment Type Id') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('Task Id') ?></th>
                <th><?= __('File Name') ?></th>
                <th><?= __('File Type') ?></th>
                <th><?= __('Created At') ?></th>
                <th><?= __('Created By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($task->attachments as $attachments): ?>
            <tr>
                <td><?= h($attachments->id) ?></td>
                <td><?= h($attachments->attachment_type_id) ?></td>
                <td><?= h($attachments->project_id) ?></td>
                <td><?= h($attachments->task_id) ?></td>
                <td><?= h($attachments->file_name) ?></td>
                <td><?= h($attachments->file_type) ?></td>
                <td><?= h($attachments->created_at) ?></td>
                <td><?= h($attachments->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sprints') ?></h4>
        <?php if (!empty($task->sprints)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sprint') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('Task Id') ?></th>
                <th><?= __('Is Completed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($task->sprints as $sprints): ?>
            <tr>
                <td><?= h($sprints->id) ?></td>
                <td><?= h($sprints->sprint) ?></td>
                <td><?= h($sprints->project_id) ?></td>
                <td><?= h($sprints->task_id) ?></td>
                <td><?= h($sprints->is_completed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sprints', 'action' => 'view', $sprints->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sprints', 'action' => 'edit', $sprints->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sprints', 'action' => 'delete', $sprints->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sprints->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
