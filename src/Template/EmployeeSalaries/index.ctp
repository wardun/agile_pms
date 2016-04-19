<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Employee Salary'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="employeeSalaries index large-9 medium-8 columns content">
    <h3><?= __('Employee Salaries') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('current_salaty') ?></th>
                <th><?= $this->Paginator->sort('last_increment_date') ?></th>
                <th><?= $this->Paginator->sort('last_increment_amount') ?></th>
                <th><?= $this->Paginator->sort('created_at') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeeSalaries as $employeeSalary): ?>
            <tr>
                <td><?= $this->Number->format($employeeSalary->id) ?></td>
                <td><?= $employeeSalary->has('user') ? $this->Html->link($employeeSalary->user->id, ['controller' => 'Users', 'action' => 'view', $employeeSalary->user->id]) : '' ?></td>
                <td><?= $this->Number->format($employeeSalary->current_salaty) ?></td>
                <td><?= h($employeeSalary->last_increment_date) ?></td>
                <td><?= $this->Number->format($employeeSalary->last_increment_amount) ?></td>
                <td><?= h($employeeSalary->created_at) ?></td>
                <td><?= $this->Number->format($employeeSalary->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $employeeSalary->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employeeSalary->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employeeSalary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeSalary->id)]) ?>
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
