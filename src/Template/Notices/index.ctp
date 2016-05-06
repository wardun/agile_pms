<div class="box">
    <div class="box-header">
        <h3 class="box-title">Notices</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('notice_description') ?></th>
                    <th><?= $this->Paginator->sort('action_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notices as $notice): ?>
                    <tr>
                        <td><?= $this->Number->format($notice->id) ?></td>
                        <td><?= h($notice->title) ?></td>
                        <td><?= h($notice->notice_description) ?></td>
                        <td><?= h($notice->action_date) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $notice->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $notice->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $notice->id)]); ?>
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
