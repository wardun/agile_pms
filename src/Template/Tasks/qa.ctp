<div class="box">
    <div class="box-header">
        <h3 class="box-title">QA Report</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <?= $this->Form->create($taskBug) ?>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Task Name:</label>
                    <?= $task->task_name; ?>
                    <input type="hidden" name="task_id" value="<?= $task->id; ?>">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <?php // echo $this->Form->input('description', ['class' => 'form-control']); ?>
                    <label>QA Report</label>
                    <textarea name="bug_detail" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Bug Free?</label>
                    <input type="checkbox" name="is_completed" value="1">
                </div>
            </div>
            <div class="col-lg-12">
                <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary', 'style' => 'margin-top:25px')); ?>
            </div>
        </div>
    </div><!-- /.box-body -->

    <div class="box-body">
        <?php if ($bugLists): ?>
            <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Bug Lists</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bugLists as $task): ?>
                        <tr>
                            <td><?= h($task->task_name) ?></td>
                            <td><?= h($task->bug_detail) ?></td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        <?php endif; ?>
    </div><!-- /.box-body -->
</div>