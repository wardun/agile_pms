<div class="box">
    <div class="box-header">
        <h3 class="box-title">View All Attachments</h3>
    </div><!-- /.box-header -->
    <?//= $this->Form->create() ?>
    <div class="box-body">
         <?= $this->Form->create('', ['type' => 'get']) ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <?php echo $this->Form->input('attachment_type_id', ['options' => $attachmentTypes, 'class' => 'form-control', 'empty' => '--Select Type--','id'=> 'attach_type-id']); ?>
                </div>
            </div>
              <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-group">
                    <?php echo $this->Form->input('project_id', ['options' => $projects, 'class' => 'form-control', 'empty' => '--Select Project--','id'=> 'project-id']); ?>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <input type="button" class="btn" id="submit" value="Submit" style="margin-top: 23px">
            </div>
        </div>
    </div><!-- /.box-body -->

 <div class="box-body">
        <div id="viewAllattachment"></div>
    </div>
</div>

<script>
    $(function () {
        $(".selectprojall").select();
        //$(".selectproj2").select();
//        $("#accordion").accordion();

     
          $('#submit').on('click', function () {
            var projectId = $('#project-id').val();
            var attachtypeid = $('#attach_type-id').val();
            $.post("<?php echo $this->Url->build(["controller" => "attachments", "action" => "viewAllAttachment"]) ?>", {_csrfToken: '<?= $this->request->param('_csrfToken') ?>', attachtypeid: attachtypeid, projectId: projectId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                $('#viewAllattachment').html(data);
            }).fail(function () {
                //alert("error");
            }).always(function () {
            });
        });

    });
</script>
