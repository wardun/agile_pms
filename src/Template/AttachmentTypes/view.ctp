<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attachment Type'), ['action' => 'edit', $attachmentType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment Type'), ['action' => 'delete', $attachmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachmentType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachment Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attachmentTypes view large-9 medium-8 columns content">
    <h3><?= h($attachmentType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($attachmentType->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attachmentType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($attachmentType->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($attachmentType->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($attachmentType->attachments)): ?>
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
            <?php foreach ($attachmentType->attachments as $attachments): ?>
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
</div>
