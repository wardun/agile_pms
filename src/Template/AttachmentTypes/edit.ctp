<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attachmentType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attachmentType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attachment Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachmentTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($attachmentType) ?>
    <fieldset>
        <legend><?= __('Edit Attachment Type') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('created_at');
            echo $this->Form->input('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
