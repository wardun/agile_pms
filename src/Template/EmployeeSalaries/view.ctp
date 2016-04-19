<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee Salary'), ['action' => 'edit', $employeeSalary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee Salary'), ['action' => 'delete', $employeeSalary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeSalary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employee Salaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Salary'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employeeSalaries view large-9 medium-8 columns content">
    <h3><?= h($employeeSalary->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $employeeSalary->has('user') ? $this->Html->link($employeeSalary->user->id, ['controller' => 'Users', 'action' => 'view', $employeeSalary->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($employeeSalary->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Current Salaty') ?></th>
            <td><?= $this->Number->format($employeeSalary->current_salaty) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Increment Amount') ?></th>
            <td><?= $this->Number->format($employeeSalary->last_increment_amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($employeeSalary->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Increment Date') ?></th>
            <td><?= h($employeeSalary->last_increment_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($employeeSalary->created_at) ?></td>
        </tr>
    </table>
</div>
