<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notices index large-9 medium-8 columns content">
    <h3><?= __('Notices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('notice_description') ?></th>
                <th><?= $this->Paginator->sort('action_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notices as $notice): ?>
            <tr>
                <td><?= $this->Number->format($notice->id) ?></td>
                <td><?= h($notice->title) ?></td>
                <td><?= h($notice->notice_description) ?></td>
                <td><?= h($notice->action_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notice->id)]) ?>
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
