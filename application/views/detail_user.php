START: CONTENT -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Detail User</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_panel">
                <div class="row">

                    <div class="col-xs-12">
                        <a href="<?php echo base_url( 'page_user' ); ?>"><i class="fa fa-angle-double-left"></i> Back</a>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <!-- <form action="action-update.php?key=MjQ=" method="post" id="contact_form" class="well form-horizontal" enctype="multipart/form-data" style="float: left;"> -->
                        <div class="col-md-3">
                            <div class="display-img-user">
                                <img src="<?php echo base_url( './assets/images/users/'. $user_detail['foto'] ); ?>" alt="" width="250px">
                                <a href="<?php echo base_url( 'user_c/delelet_user/'. base64_encode( $user_detail['id'] ) ); ?>" onclick="return confirm('Are you sure want to remove this ?');" title="Delete">
                                    <span style="position:absolute;top:0;font-size: 15px;color: #fff; background: #f00;height: 20px;width: 20px;text-align: center;line-height: 20px;"><i class="fa fa-close"></i></span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Lengkap</label> 
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input class="form-control" type="text" value="<?php echo $user_detail['nama_lengkap']; ?>" disabled="disabled">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label> 
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input class="form-control" type="text" value="<?php echo $user_detail['email']; ?>" disabled="disabled">
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Password</label>  
                                    <div class="col-md-10 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input type="password" value="***********" class="form-control" disabled="disabled">
                                        </div>
                                    </div>
                                   <!--  <div class="col-md-3" style="padding-top: 10px;">
                                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#editPassword" style="text-decoration: none;">
                                            <i class="fa fa-pencil"></i> Change Password
                                        </button>
                                    </div> -->
                                </div>
                            </fieldset>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: CONTENT