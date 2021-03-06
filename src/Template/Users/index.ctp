<div class="box">
    <div class="box-header">
        <h3 class="box-title">Users</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('designation') ?></th>
                    <th><?= $this->Paginator->sort('joindate') ?></th>
                    <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td>
                            <?php
                            if($user->role == 1){
                                echo 'Admin';
                            }else if($user->role == 2){
                                echo 'Project Manager';
                            }else if($user->role == 3){
                                echo 'Developer';
                            }else if($user->role == 4){
                                echo 'QA';
                            }else if($user->role == 5){
                                echo 'Scrum Master';
                            }
                            ?>
                        </td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->first_name.' '.$user->last_name) ?></td>
                        <td><?= h($user->designation) ?></td>
                        <td><?= date('Y-m-d', strtotime($user->joindate)) ?></td>
                        <td><?= date('Y-m-d', strtotime($user->dob)) ?></td>
                        <td class="actions">
                           <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action' => 'edit', '', $user->id), array('class' => 'btn btn-sm btn-warning', 'title' => 'Edit', 'escape' => false)); ?>
                           <?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'changepassword', '', $user->id), array('class' => 'btn btn-sm btn-success view', 'title' => 'Change Password', 'escape' => false)); ?>
                            <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-times')), ['action' => 'delete', $user->id], ['class' => 'btn btn-sm btn-danger delete', 'title' => 'Delete', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->first_name)]); ?>
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
