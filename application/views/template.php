
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.3 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>LAB - Teknologi Informasi</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main-responsive.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/skins/all.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme_light.css" type="text/css" id="skin_color">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/print.css" type="text/css" media="print"/>
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css">
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body>
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="index.html">
                        CLIP<i class="clip-clip"></i>ONE
                    </a>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                        <!-- start: TO-DO DROPDOWN -->

                        <!-- end: TO-DO DROPDOWN-->
                        <!-- start: NOTIFICATION DROPDOWN -->

                        <!-- end: NOTIFICATION DROPDOWN -->
                        <!-- start: MESSAGE DROPDOWN -->
                       
                        <!-- end: MESSAGE DROPDOWN -->
                        <!-- start: USER DROPDOWN -->
                        <li class="dropdown current-user">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                <img src="<?php echo base_url();?>assets/images/avatar-1-small.jpg" class="circle-img" alt="">
                                <span class="username"><?php echo $this->session->userdata('username') ?></span>
                                <i class="clip-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                   <?php
                                    echo anchor('auth/logout', '<i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Log Out');
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <!-- end: USER DROPDOWN -->
                    </ul>
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">

            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                <div class="main-navigation navbar-collapse collapse">
                    <!-- start: MAIN MENU TOGGLER BUTTON -->
                    <div class="navigation-toggler">
                        <i class="clip-chevron-left"></i>
                        <i class="clip-chevron-right"></i>
                    </div>
                    <!-- end: MAIN MENU TOGGLER BUTTON -->
                    <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="clip-file"></i>
                            <span class="title"> PRESTASI </span><i class="icon-arrow"></i>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                        <?php
                        $level = $this->session->userdata('id_level_user');
                        if($level == 3){
                        ?>
                            <li>    
                                <a href="<?php echo base_url();?>index.php/prestasi/add" class="close-sidebar-left">
                                    <span class="title"> DAFTAR PRESTASI </span>
                                </a>
                            </li>
                        <?php
                        }?>
                            <li>
                                <a href="<?php echo base_url();?>index.php/prestasi" class="set-boxed-layout">
                                    <span class="title"> LIHAT PRESTASI </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    $level = $this->session->userdata('id_level_user');
                    if($level != 3){
                    ?>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="clip-user-2"></i>
                            <span class="title"> MAHASISWA </span><i class="icon-arrow"></i>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">

                            <li>    
                                <a href="<?php echo base_url();?>index.php/mahasiswa" class="close-sidebar-left">
                                    <span class="title"> DATA MAHASISWA </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                        <?php
                        }?>
                    <?php
                    $level = $this->session->userdata('id_level_user');
                    if($level == 1){
                    ?>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="clip-user-2"></i>
                            <span class="title"> DOSEN </span><i class="icon-arrow"></i>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">

                            <li>    
                                <a href="<?php echo base_url();?>index.php/dosen/addDosen" class="close-sidebar-left">
                                    <span class="title"> TAMBAH DOSEN </span>
                                </a>
                            </li>
                            <li>    
                                <a href="<?php echo base_url();?>index.php/dosen/data" class="close-sidebar-left">
                                    <span class="title"> DATA DOSEN </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    }?>

                </ul>
                    <!-- end: MAIN NAVIGATION MENU -->
                </div>
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
            <div class="main-content">
                <!-- start: PANEL CONFIGURATION MODAL FORM -->
                <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title">Panel Configuration</h4>
                            </div>
                            <div class="modal-body">
                                Here will be a configuration form
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: STYLE SELECTOR BOX -->
                            <!-- end: STYLE SELECTOR BOX -->
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-home-3"></i>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>

                            </ol>
                            <div class="page-header">
                                <h1>Dashboard <small>overview &amp; stats </small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    <?php

                    echo $contents;
                    ?>
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                2014 &copy; clip-one by cliptheme.
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title">Event Management</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                            Close
                        </button>
                        <button type="button" class="btn btn-danger remove-event no-display">
                            <i class='fa fa-trash-o'></i> Delete Event
                        </button>
                        <button type='submit' class='btn btn-success save-event'>
                            <i class='fa fa-check'></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/plugins/respond.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/excanvas.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <!--<![endif]-->
        <script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/blockUI/jquery.blockUI.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/less/less-1.5.0.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery.sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <script src="<?php echo base_url();?>assets/js/index.js"></script>

        <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js"></script>

        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Index.init();
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>