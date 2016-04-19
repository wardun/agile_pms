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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/dist/css/AdminLTE.min.css">

        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot ?>assets/plugins/iCheck/flat/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?=$this->request->webroot?>"><b>Agile</b>PMS</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
    </body>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $this->request->webroot ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $this->request->webroot ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</html>
