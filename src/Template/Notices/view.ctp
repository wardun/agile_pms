<div class="box">
    <div class="box-header">
          <h3 class="box-title"><?= h($notice->title) ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <td><?= h($notice->title) ?></td>  
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th><?= $this->Paginator->sort('notice_description') ?></th>
                        <td><?= $this->Text->autoParagraph(h($notice->notice_description)); ?></td>
                                              
                    </tr>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div>
