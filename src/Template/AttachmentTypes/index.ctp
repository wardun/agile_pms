<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attachment Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachmentTypes index large-9 medium-8 columns content">
    <h3><?= __('Attachment Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attachmentTypes as $attachmentType): ?>
            <tr>
                <td><?= $this->Number->format($attachmentType->id) ?></td>
                <td><?= h($attachmentType->title) ?></td>
                <td><?= h($attachmentType->created_at) ?></td>
                <td><?= $this->Number->format($attachmentType->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attachmentType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attachmentType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attachmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachmentType->id)]) ?>
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
