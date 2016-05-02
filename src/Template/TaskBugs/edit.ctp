<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $taskBug->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $taskBug->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Task Bugs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taskBugs form large-9 medium-8 columns content">
    <?= $this->Form->create($taskBug) ?>
    <fieldset>
        <legend><?= __('Edit Task Bug') ?></legend>
        <?php
            echo $this->Form->input('task_id', ['options' => $tasks]);
            echo $this->Form->input('bug_detail');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
