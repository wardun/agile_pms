<div class="box">
    <div class="box-header">
        <h3 class="box-title">Projects</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('managerid') ?></th>
                    <th><?= $this->Paginator->sort('client_name') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('actual_end_date') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('duration') ?></th>
                    <th><?= $this->Paginator->sort('duration_hours') ?></th>
                    <th><?= $this->Paginator->sort('current_status') ?></th>
                    <th><?= $this->Paginator->sort('achieve_status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?= $this->Number->format($project->id) ?></td>
                            <td><?= $this->Number->format($project->managerid) ?></td>
                            <td><?= h($project->client_name) ?></td>
                            <td><?= h($project->start_date) ?></td>
                            <td><?= h($project->end_date) ?></td>
                            <td><?= h($project->actual_end_date) ?></td>
                            <td><?= $this->Generic->userLabel($project->amount) ?></td>
                            <td><?= h($project->duration) ?></td>
                            <td><?= h($project->duration_hours) ?></td>
                            <td><?= h($project->current_status) ?></td>
                            <td><?= h($project->achieve_status) ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link('<i class="fa fa-align-justify"></i>', array('action' => 'view', '', $project->id), array('class' => 'btn btn-sm btn-info', 'title' => 'View', 'escape' => false)); ?>
                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $project->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                                <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $project->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $project->first_name)]); ?>

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
