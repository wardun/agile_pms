<?php
$projectTitle = 'Agile PMS';
$pageTitle = isset($pageTitle) ? $pageTitle : $this->fetch('title');
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $projectTitle . ' | ' . $pageTitle ?></title>
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/font-awesome/css/font-awesome.min.css">
        
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/ionicons/css/ionicons.min.css">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/dist/css/skins/_all-skins.min.css">

        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/dist/css/custom.css">

        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/select2/select2.min.css">
        
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/dist/css/jquery.timepicker.min.css">
        
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/fullcalendar/fullcalendar.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo $this->request->webroot ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $this->element('header'); ?>
            <?php echo $this->element('navigation'); ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Flash->render() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->fetch('content') ?>
                        </div>
                    </div>
                </section>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
    </body>

    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $this->request->webroot ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
    <script src="<?php echo $this->request->webroot ?>assets/dist/js/raphael-min.js"></script>
    <script src="<?php echo $this->request->webroot ?>assets/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo $this->request->webroot ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
    <script src="<?php echo $this->request->webroot ?>assets/dist/js/moment.min.js"></script>
    <script src="<?php echo $this->request->webroot ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/fastclick/fastclick.min.js"></script>
     <!-- Select2 -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/select2/select2.full.min.js"></script>
    
    <script src="<?php echo $this->request->webroot ?>assets/dist/js/jquery.timepicker.min.js"></script>
    
    <script src="<?php echo $this->request->webroot ?>assets/plugins/chartjs/Chart.min.js"></script>
    <script src="<?php echo $this->request->webroot ?>assets/plugins/knob/jquery.knob.js"></script>
    
    <script src="<?php echo $this->request->webroot ?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="<?php echo $this->request->webroot ?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $this->request->webroot ?>assets/dist/js/pages/dashboard.js"></script>

</html>
