<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task Bug'), ['action' => 'edit', $taskBug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task Bug'), ['action' => 'delete', $taskBug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskBug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Task Bugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Bug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="taskBugs view large-9 medium-8 columns content">
    <h3><?= h($taskBug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Task') ?></th>
            <td><?= $taskBug->has('task') ? $this->Html->link($taskBug->task->id, ['controller' => 'Tasks', 'action' => 'view', $taskBug->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($taskBug->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Bug Detail') ?></h4>
        <?= $this->Text->autoParagraph(h($taskBug->bug_detail)); ?>
    </div>
</div>
