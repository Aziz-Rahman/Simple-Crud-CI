<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrator</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <!-- Js -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

</head>
<body class="nav-md">



<div id="preloader">
    <img src="images/loading.gif" alt="Preloader">
</div>

<div class="container body">
    <div class="main_container">
        
        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo base_url(); ?>assets/images/users/user_36002.jpg" alt="Admin" class="profile_img">
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="setting-user.php"><i class="fa fa-cogs pull-right"></i> Pengaturan Profile</a></li>
                                <li><a href="<?php echo base_url('auth_login_register_c/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                            </ul>
                        </li>
                        <li>
                            <h3 style="color: white;font-weight: bold;margin: 33px 15px;">PT. XYZ</h3>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- START: SIDEBAR -->
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <!-- <a href="dashboard.php" class="site_title"><i class="fa fa-tree"></i> <span>Administrator</span></a> -->
                    <a class="navbar-brand" href="<?php echo base_url('./'); ?>">
                        <i class="fa fa-anchor" aria-hidden="true"></i>
                        <span class="site-title">PT. XYZ</span>
                    </a>
                </div>
                <div class="clearfix"></div>

              <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?php echo base_url(); ?>assets/images/users/user_36002.jpg" width="76px" alt="Admin" class="profile_img">
                    </div>
                    <div class="profile_info">
                        <h2><a href="#"><?php echo $this->session->userdata( 'mysessi_name' ); ?></a></h2>
                        <span style="font-size: 10px;"><?php echo $this->session->userdata( 'mysessi_email' ); ?></span>
                        <p><?php // echo $data['jabatan']; ?></p>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <div style="clear: both;"></div>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="margin-top: 20px;">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                            <li><a href="<?php echo base_url('page_user'); ?>"><i class="fa fa-users"></i> DATA USER</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

            </div>
        </div>
        <!-- END: SIDEBAR -->