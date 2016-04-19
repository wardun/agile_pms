<div class="box">
    <div class="box-header">
        <h3 class="box-title">Teams</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('cretaed_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teams as $team): ?>
                    <tr>
                        <td><?= $this->Number->format($team->id) ?></td>
                        <td><?= $team->has('project') ? $this->Html->link($team->project->id, ['controller' => 'Projects', 'action' => 'view', $team->project->id]) : '' ?></td>
                        <td><?= $team->has('user') ? $this->Html->link($team->user->id, ['controller' => 'Users', 'action' => 'view', $team->user->id]) : '' ?></td>
                        <td><?= h($team->cretaed_at) ?></td>
                        <td><?= $this->Number->format($team->created_by) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', '', $team->id), array('class' => 'btn btn-small btn-success view', 'title' => 'View', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $team->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $team->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $team->user->id)]); ?>

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
    </div><!-- /.box-body -->
</div>
