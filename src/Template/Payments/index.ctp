<div class="box">
    <div class="box-header">
        <h3 class="box-title">Payments</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('sprint') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('payment_receive_date') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <<td><?= $this->Number->format($payment->id) ?></td>
                        <td><?= $payment->has('project') ? $this->Html->link($payment->project->id, ['controller' => 'Projects', 'action' => 'view', $payment->project->id]) : '' ?></td>
                        <td><?= $this->Number->format($payment->sprint) ?></td>
                        <td><?= $this->Number->format($payment->amound) ?></td>
                        <td><?= h($payment->payment_receive_date) ?></td>
                        <td><?= $this->Number->format($payment->created_by) ?></td>
                        <td><?= h($payment->created_at) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $payment->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $payment->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]); ?>
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
