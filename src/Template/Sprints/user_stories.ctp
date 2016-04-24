<div class="box">
    <div class="box-header">
        <h3 class="box-title" style="text-align:center!important;">User Story</h3>
    </div><!-- /.box-header -->
    <?= $this->Form->create() ?>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-4">
                <label>Select Project</label>
                <div class="form-group">
                    <select class="form-control selectproj1 project-id" data-placeholder="Select Projects">
                        <option value="0">--Select Project--</option>
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
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Select Sprint</label>
                    <select class="form-control selectproj2 sprint_id" id="sprints" name="sprint_id" data-placeholder="Select Sprint" disabled="">
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <input type="button" class="btn" id="submit" value="Submit" style="margin-top: 23px">
            </div>
        </div>


        <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Task Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>fsdfsdfsd</td>               
                </tr>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div>

<script>
    $(function () {
        $(".selectproj1").select();
        $(".selectproj2").select();
//        $("#accordion").accordion();

        $('.project-id').on('change', function () {
            var projectId = $(this).val();
            $.post("<?php echo $this->Url->build(["controller" => "sprints", "action" => "get-project-sprint"]) ?>", {_csrfToken: '<?= $this->request->param('_csrfToken') ?>', projectId: projectId}, function (resp) {
                //alert(resp);
            }).done(function (data) {
                if (data.length > 0){
                    $('#sprints').html(data);
                    $('#sprints').removeAttr('disabled');
                }

            }).fail(function () {
                //alert("error");
            }).always(function () {
            });
        }).change();

//        $('.sprint_id').on('change', function () {
//            var sprintId = $(this).val();
//            $.post("<?php echo $this->Url->build(["controller" => "homes", "action" => "sprint_wise_tasks"]) ?>", {_csrfToken: '<?= $this->request->param('_csrfToken') ?>', sprintId: sprintId}, function (resp) {
//                //alert(resp);
//            }).done(function (data) {
//                $('#sprints').html(data);
//                //$('#sub-categoryid').trigger("chosen:updated");
//            }).fail(function () {
//                //alert("error");
//            }).always(function () {
//            });
//        }).change();


    });
</script>
