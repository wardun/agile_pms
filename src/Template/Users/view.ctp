<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employee Salaries'), ['controller' => 'EmployeeSalaries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee Salary'), ['controller' => 'EmployeeSalaries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($user->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($user->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Employee Salaries') ?></h4>
        <?php if (!empty($user->employee_salaries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Current Salaty') ?></th>
                <th><?= __('Last Increment Date') ?></th>
                <th><?= __('Last Increment Amount') ?></th>
                <th><?= __('Created At') ?></th>
                <th><?= __('Created By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->employee_salaries as $employeeSalaries): ?>
            <tr>
                <td><?= h($employeeSalaries->id) ?></td>
                <td><?= h($employeeSalaries->user_id) ?></td>
                <td><?= h($employeeSalaries->current_salaty) ?></td>
                <td><?= h($employeeSalaries->last_increment_date) ?></td>
                <td><?= h($employeeSalaries->last_increment_amount) ?></td>
                <td><?= h($employeeSalaries->created_at) ?></td>
                <td><?= h($employeeSalaries->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EmployeeSalaries', 'action' => 'view', $employeeSalaries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EmployeeSalaries', 'action' => 'edit', $employeeSalaries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmployeeSalaries', 'action' => 'delete', $employeeSalaries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employeeSalaries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($user->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Cretaed At') ?></th>
                <th><?= __('Created By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->project_id) ?></td>
                <td><?= h($teams->user_id) ?></td>
                <td><?= h($teams->cretaed_at) ?></td>
                <td><?= h($teams->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
