
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Image Chooser</title>

        <link rel="manifest" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/jquery.toast.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.toast.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/datatables/dataTables.bootstrap.css">
        <style>
            .blur-loading::after {
                background: rgba(255, 255, 255, 0.45) url("<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ajax-loader.gif") no-repeat scroll center center;
                bottom: 0;
                content: "";
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                z-index: 9;
            }

            .jq-toast-wrap {
                z-index: 7000;
            }
        </style>
    </head>
    <script>
        function displayMessage(type) {
            if (type === 1) {
                $.toast({
                    text: '<h5> Thành công !</h5>',
                    showHideTransition: 'fade', // It can be plain, fade or slide
                    bgColor: '#00A65A',
                    allowToastClose: false, // Show the close button or not
                    hideAfter: 3000, // `false` to make it sticky or time in miliseconds to hide after
                    stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                    position: 'top-center'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                });
            } else {
                $.toast({
                    text: '<h5> Đã có lỗi không mong muốn xảy ra!</h5>',
                    showHideTransition: 'slide', // It can be plain, fade or slide
                    bgColor: '#DD4B39',
                    allowToastClose: false, // Show the close button or not
                    hideAfter: 3000, // `false` to make it sticky or time in miliseconds to hide after
                    stack: 5, // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once

                    position: 'top-center'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                });
            }
        }
    </script>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo Yii::app()->createUrl('documentary/index') ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Quản trị viên</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <span class="hidden-xs">Quản trị viên</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">

                                        <p>
                                            Admin - Quản trị viên
                                            <small>Thành viên từ 2015</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!--                                    <li class="user-body">
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Followers</a>
                                                                            </div>
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Sales</a>
                                                                            </div>
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Friends</a>
                                                                            </div>
                                                                        </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo Yii::app()->createUrl('user/logout') ?>" class="btn btn-default btn-flat">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <!--                            <li>
                                                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                                        </li>-->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->renderPartial('//layouts/sideBar') ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                    <!--                    <ol class="breadcrumb">
                                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                            <li class="active">Dashboard</li>
                                        </ol>-->
                </section>

                <!-- Main content -->
                <?php echo $content; ?>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Macchat</a>.</strong> All rights reserved.
            </footer>

            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->


        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- Sparkline -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/dist/js/app.min.js"></script>

    </body>
</html>
