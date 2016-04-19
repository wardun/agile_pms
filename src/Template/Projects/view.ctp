<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sprints'), ['controller' => 'Sprints', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sprint'), ['controller' => 'Sprints', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Client Name') ?></th>
            <td><?= h($project->client_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= h($project->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Managerid') ?></th>
            <td><?= $this->Number->format($project->managerid) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount') ?></th>
            <td><?= $this->Number->format($project->amount) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration Hours') ?></th>
            <td><?= $this->Number->format($project->duration_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Current Status') ?></th>
            <td><?= $this->Number->format($project->current_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Achieve Status') ?></th>
            <td><?= $this->Number->format($project->achieve_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($project->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($project->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($project->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Actual End Date') ?></th>
            <td><?= h($project->actual_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($project->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($project->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($project->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Attachment Type Id') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('Task Id') ?></th>
                <th><?= __('File Name') ?></th>
                <th><?= __('File Type') ?></th>
                <th><?= __('Created At') ?></th>
                <th><?= __('Created By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->attachments as $attachments): ?>
            <tr>
                <td><?= h($attachments->id) ?></td>
                <td><?= h($attachments->attachment_type_id) ?></td>
                <td><?= h($attachments->project_id) ?></td>
                <td><?= h($attachments->task_id) ?></td>
                <td><?= h($attachments->file_name) ?></td>
                <td><?= h($attachments->file_type) ?></td>
                <td><?= h($attachments->created_at) ?></td>
                <td><?= h($attachments->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sprints') ?></h4>
        <?php if (!empty($project->sprints)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sprint') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('Task Id') ?></th>
                <th><?= __('Is Completed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->sprints as $sprints): ?>
            <tr>
                <td><?= h($sprints->id) ?></td>
                <td><?= h($sprints->sprint) ?></td>
                <td><?= h($sprints->project_id) ?></td>
                <td><?= h($sprints->task_id) ?></td>
                <td><?= h($sprints->is_completed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sprints', 'action' => 'view', $sprints->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sprints', 'action' => 'edit', $sprints->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sprints', 'action' => 'delete', $sprints->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sprints->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($project->tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('Task Name') ?></th>
                <th><?= __('Detail') ?></th>
                <th><?= __('Assgined To') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Actual End Date') ?></th>
                <th><?= __('Created At') ?></th>
                <th><?= __('Created By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->tasks as $tasks): ?>
            <tr>
                <td><?= h($tasks->id) ?></td>
                <td><?= h($tasks->project_id) ?></td>
                <td><?= h($tasks->task_name) ?></td>
                <td><?= h($tasks->detail) ?></td>
                <td><?= h($tasks->assgined_to) ?></td>
                <td><?= h($tasks->start_date) ?></td>
                <td><?= h($tasks->end_date) ?></td>
                <td><?= h($tasks->actual_end_date) ?></td>
                <td><?= h($tasks->created_at) ?></td>
                <td><?= h($tasks->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($project->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Project Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Cretaed At') ?></th>
                <th><?= __('Created By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->teams as $teams): ?>
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
