<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sprint'), ['action' => 'edit', $sprint->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sprint'), ['action' => 'delete', $sprint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sprint->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sprints'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sprint'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sprints view large-9 medium-8 columns content">
    <h3><?= h($sprint->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Project') ?></th>
            <td><?= $sprint->has('project') ? $this->Html->link($sprint->project->id, ['controller' => 'Projects', 'action' => 'view', $sprint->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Task') ?></th>
            <td><?= $sprint->has('task') ? $this->Html->link($sprint->task->id, ['controller' => 'Tasks', 'action' => 'view', $sprint->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sprint->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sprint') ?></th>
            <td><?= $this->Number->format($sprint->sprint) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Completed') ?></th>
            <td><?= $this->Number->format($sprint->is_completed) ?></td>
        </tr>
    </table>
</div>
