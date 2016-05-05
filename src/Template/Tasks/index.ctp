<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tasks</h3>
    </div><!-- /.box-header -->
     <?//= $this->Form->create() ?>
    <div class="box-body">
         <?= $this->Form->create('', ['type' => 'get']) ?>
           <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="form-group">
                        <?php echo $this->Form->input('projectid', ['options' => $projects, 'class' => 'form-control', 'empty' => '--Select Project--', 'id' => 'project-id']); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary', 'style' => 'margin-top:25px')); ?>
            </div>
        </div>
    </div>
      
 <div class="box-body">
         <?php if ($tasks): ?>
            <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('task_name') ?></th>
                    <th><?= $this->Paginator->sort('task_duration') ?></th>
                    <th><?= $this->Paginator->sort('assgined_to') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('actual_end_date') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                     <?php foreach ($tasks as $task): ?>
                         <tr>
                        <td><?= $this->Number->format($task->id) ?></td>
                        <td><?= h($task->task_name) ?></td>
                        <td><?= h($task->task_duration) ?></td>
                        <td><?= $this->Number->format($task->assgined_to) ?></td>
                        <td><?= h($task->start_date) ?></td>
                        <td><?= h($task->end_date) ?></td>
                        <td><?= h($task->actual_end_date) ?></td>
                        <td><?= h($task->created_at) ?></td>
                        <td class="actions">
                            <?php echo !empty ($task->assgined_to) ? '' : $this->Html->link('<i class="fa fa-tag"></i>', array('action' => 'assign_task', '', $task->id), array('class' => 'btn btn-sm btn-primary', 'title' => 'Assign Task', 'escape' => false)); ?>
                            <?php echo ($userInfo['role'] != 3) ? $this->Html->link('<i class="fa fa-files-o"></i>', array('action' => 'qa', '', $task->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'QA', 'escape' => false)) : ''; ?>
                            <?php echo ($userInfo['role'] == 3) ? (($task->is_completed == 0 || $task->is_completed == 2) ? $this->Html->link('<i class="fa fa-check"></i>', array('action' => 'task_complete', '', $task->id), array('class' => 'btn btn-sm btn-primary', 'title' => 'Task Complete', 'escape' => false)) : '') : ''; ?>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $task->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $task->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $task->id)]); ?>

                        </td>
                    </tr>
                        <?php
                    endforeach;
                    ?>
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
        <?php endif; ?>
    </div><!-- /.box-body -->
</div>