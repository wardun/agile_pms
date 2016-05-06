<div class="box">
    <div class="box-header">
          <h3 class="box-title"><?= h($notice->title) ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><?= $this->Number->format($notice->id) ?></td>
                        <td><?= h($notice->title) ?></td>                        
                    </tr>
            </tbody>
        </table>
   <div class="row" style="margin-left: 15px;">
        <h4><?= __('Notice Description') ?></h4>
        <?= $this->Text->autoParagraph(h($notice->notice_description)); ?>
    </div>
    </div><!-- /.box-body -->
</div>
