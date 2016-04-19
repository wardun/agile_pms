<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attachment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Attachment Types'), ['controller' => 'AttachmentTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment Type'), ['controller' => 'AttachmentTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachments form large-9 medium-8 columns content">
    <?= $this->Form->create($attachment) ?>
    <fieldset>
        <legend><?= __('Edit Attachment') ?></legend>
        <?php
            echo $this->Form->input('attachment_type_id', ['options' => $attachmentTypes]);
            echo $this->Form->input('project_id', ['options' => $projects]);
            echo $this->Form->input('task_id', ['options' => $tasks, 'empty' => true]);
            echo $this->Form->input('file_name');
            echo $this->Form->input('file_type');
            echo $this->Form->input('created_at');
            echo $this->Form->input('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
