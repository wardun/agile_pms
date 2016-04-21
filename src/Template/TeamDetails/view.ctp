<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team Detail'), ['action' => 'edit', $teamDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team Detail'), ['action' => 'delete', $teamDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teamDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Team Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teamDetails view large-9 medium-8 columns content">
    <h3><?= h($teamDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Team') ?></th>
            <td><?= $teamDetail->has('team') ? $this->Html->link($teamDetail->team->id, ['controller' => 'Teams', 'action' => 'view', $teamDetail->team->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $teamDetail->has('user') ? $this->Html->link($teamDetail->user->id, ['controller' => 'Users', 'action' => 'view', $teamDetail->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($teamDetail->id) ?></td>
        </tr>
    </table>
</div>
