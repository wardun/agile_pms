<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $employeeSalary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $employeeSalary->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Employee Salaries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeeSalaries form large-9 medium-8 columns content">
    <?= $this->Form->create($employeeSalary) ?>
    <fieldset>
        <legend><?= __('Edit Employee Salary') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('current_salaty');
            echo $this->Form->input('last_increment_date');
            echo $this->Form->input('last_increment_amount');
            echo $this->Form->input('created_at');
            echo $this->Form->input('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
