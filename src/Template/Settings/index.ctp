<div class="box">
    <div class="box-header">
        <h3 class="box-title">Settings</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('app_name') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('logo') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('website') ?></th>
                    <th><?= $this->Paginator->sort('sprint_duration') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($settings as $setting): ?>
                    <tr>
                        <td><?= $this->Number->format($setting->id) ?></td>
                        <td><?= h($setting->app_name) ?></td>
                        <td><?= h($setting->company_name) ?></td>
                        <td><?= h($setting->logo) ?></td>
                        <td><?= h($setting->phone) ?></td>
                        <td><?= h($setting->website) ?></td>
                        <td><?= $this->Number->format($setting->sprint_duration) ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link('<i class="fa fa-eye"></i>', array('action' => 'view', '', $setting->id), array('class' => 'btn btn-small btn-success view', 'title' => 'View', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $setting->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $setting->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]); ?>

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
