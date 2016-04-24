<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Sprints</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="form-group">
            <label>Select Project</label>
            <select class="form-control selectproj project-id" name="id[]" data-placeholder="Select Projects">
                <?php
                if ($projects) {
                    foreach ($projects as $project) {
                        echo '<option value="' . $project->id . '">' . $project->title . '</option>';
                    }
//                    unset($project);
                }
                ?>
            </select>
        </div>  
        <div id="sprints"></div>
    </div><!-- /.box-body -->


</div><!-- /.box -->
<script>
    $(function () {
        $(".selectproj").select();
//        $("#accordion").accordion(); 
       
         $('.project-id').on('change', function(){
            var projectId = $(this).val();
             $.post("<?php echo $this->Url->build(["controller" => "sprints", "action" => "tasks"]) ?>", {_csrfToken : '<?=$this->request->param('_csrfToken')?>', projectId: projectId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                $('#sprints').html(data);
                //$('#sub-categoryid').trigger("chosen:updated");
            }).fail(function () {
                //alert("error");
            }).always(function(){
            });
        }).change();
      

    });
</script>

