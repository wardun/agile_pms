<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Team Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teamDetails index large-9 medium-8 columns content">
    <h3><?= __('Team Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('team_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teamDetails as $teamDetail): ?>
            <tr>
                <td><?= $this->Number->format($teamDetail->id) ?></td>
                <td><?= $teamDetail->has('team') ? $this->Html->link($teamDetail->team->id, ['controller' => 'Teams', 'action' => 'view', $teamDetail->team->id]) : '' ?></td>
                <td><?= $teamDetail->has('user') ? $this->Html->link($teamDetail->user->id, ['controller' => 'Users', 'action' => 'view', $teamDetail->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teamDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teamDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teamDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamDetail->id)]) ?>
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
