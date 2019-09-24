<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login System</title>

<link href="<?php echo base_url( 'assets/css/bootstrap.min.css' ); ?>" rel="stylesheet">
<link href="<?php echo base_url( 'assets/fonts/css/font-awesome.min.css' ); ?>" rel="stylesheet">
<link href="<?php echo base_url( 'assets/css/animate.min.css' ); ?>" rel="stylesheet">
<link href="<?php echo base_url( 'assets/css/custom.css' ); ?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <?php //if ( isset( $error ) ) { echo $error; }; ?>

        <?php 
        if ( $this->session->flashdata( 'login_failed' ) ) { 
            echo '<div class="info-alert alert alert-danger alert-dismissible" role="alert" style="margin-top: 0;"><i class="fa fa-exclamation-triangle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'. $this->session->flashdata('login_failed' ) .'</div>';
        }

        if ( $this->session->flashdata( 'success' ) ) { 
            echo '<div class="info-alert alert alert-success alert-dismissible" role="alert" style="margin-top: 0;"><i class="fa fa-exclamation-triangle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'. $this->session->flashdata( 'success' ) .'</div>';
        }

        if ( $this->session->flashdata( 'info_alert' ) ) { 
            echo '<div class="info-alert alert alert-danger alert-dismissible" role="alert" style="margin-top: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'. $this->session->flashdata( 'info_alert' ) .'</div>';
        }
        ?>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo base_url(); ?>auth_login_register_c/check_login" method="post">
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div>
                            <input type="submit" name="btn-login" class="btn btn-default" value="Login">
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©<?php echo date( 'Y' ); ?> All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="<?php echo base_url(); ?>auth_login_register_c/register" method="post">
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" name="full_name" class="form-control" placeholder="Nama Lengkap" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div>
                            <input type="submit" name="btn-register" class="btn btn-default center" value="Register">
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©<?php echo date( 'Y' ); ?> All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url( 'assets/js/jquery.min.js' ); ?>"></script>
<!-- <script src="<?php//  echo base_url(); ?>assets/js/functions.js"></script> -->
<script>
    // hide info alert
    $('.info-alert').delay(10000).fadeOut(500);
</script>
</html>