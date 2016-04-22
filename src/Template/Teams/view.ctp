<div class="teams view large-9 medium-8 columns content">
    <table class = "table">
        <caption>View of Team Id <?= h($team->id) ?></caption>
        <thead>
            <tr>
                <th>Project</th>
                <th>User</th>
                <th>Team Id</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <tr class = "active">
                <td><?= $team->has('project') ? $this->Html->link($team->project->id, ['controller' => 'Projects', 'action' => 'view', $team->project->id]) : '' ?></td>
                <td><?= $team->has('user') ? $this->Html->link($team->user->id, ['controller' => 'Users', 'action' => 'view', $team->user->id]) : '' ?></td>
                <td><?= $this->Number->format($team->id) ?></td>
                <td><?= $this->Number->format($team->created_by) ?></td>
                <td><?= h($team->cretaed_at) ?></td>
            </tr>
        </tbody>
    </table>
</div>
