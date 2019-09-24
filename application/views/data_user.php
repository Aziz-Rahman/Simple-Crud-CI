
<!-- START: CONTENT -->
<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        
        <?php 
        if ( $this->session->flashdata( 'success' ) ) { 
            echo '<div class="info-alert alert alert-success alert-dismissible" role="alert" style="margin-top: 0;"><i class="fa fa-exclamation-triangle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'. $this->session->flashdata( 'success' ) .'</div>';
        }

        if ( $this->session->flashdata( 'info_alert' ) ) { 
            echo '<div class="info-alert alert alert-danger alert-dismissible" role="alert" style="margin-top: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'. $this->session->flashdata( 'info_alert' ) .'</div>';
        }
        ?>

        
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Users</h2>
                <div class="clearfix"></div>
            </div>

            <div id="content_add_data" class="container" style="display: none;">
                <form class="well form-horizontal" action="User_c/add_data_user" method="post" id="contact_form" enctype="multipart/form-data" style="float: left;">
                    <!-- <input type="hidden" name="<?php // echo $this->security->get_csrf_token_name();?>" value="<?php // echo $this->security->get_csrf_hash();?>"> -->
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h3 style="font-size: 15px;"><small><strong>Tambah Data</strong></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <span class="text-right pull-right" id="close_add_data" style="cursor: pointer; color: #f00;"><i class="fa fa-close"></i> close</span>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <br>

                    <div class="col-md-12">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Lengkap</label>  
                                <div class="col-md-10 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input name="full_name" placeholder="Nama Lengkap" class="form-control"  type="text">
                                    </div>
                                </div>
                            </div>

                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" >Email / Username</label> 
                                <div class="col-md-10 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input name="email" placeholder="email" class="form-control"  type="text">
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-2 control-label">Password</label>  
                                <div class="col-md-10 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input name="password" placeholder="***********" type="password"class="form-control"  type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label">Select image to upload</label>  
                                <div class="col-md-10 inputGroupContainer">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                        <input type="file" name="foto_profile" id="foto_profile" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-xs-12 col-md-3">
                                    <button type="submit" name="btn-add-user" class="btn btn-danger" style="width: 200px; border-radius:2%; ">
                                        Tambah User <span class="glyphicon glyphicon-send"></span>
                                    </button>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    

                    <div class="x_panel">
                        <div class="panel-heading">
                            <input type="button" id="add_data" value="Tambah Data" title="Tambah" class="btn btn-success btn-sm">
                        </div>
                        
                        <div class="x_content table-responsive">
                            <table id="my-table" class="table table-hover table-striped" id="dataTables-transaksi">
                                <thead>
                                    <tr>
                                        <th class="warning" width="60">No</th>
                                        <th class="warning">Foto Profil</th>
                                        <th class="warning">Nama Lengkap</th>
                                        <th class="warning">Username / Email</th>
                                        <th class="warning">Password</th>
                                        <th class="warning text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ( $get_data_user as $value ) {                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><img src="./assets/images/users/<?php echo $value['foto']; ?>" alt="Photo Profile" width="30"></td>
                                            <td><?php echo $value['nama_lengkap']; ?></td>
                                            <td class=""><?php echo $value['email']; ?></td>
                                            <td class=""><?php echo '***********'; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url( 'user_c/detail_user/'.base64_encode( $value['id'] ) ); ?>" title="Detail"><i class="fa fa-eye"></i></a> ||                                                 
                                                <a href="#myModalEdit212" data-toggle="modal" title="Edit" onclick="button_edit_data(this.id);" id="<?php echo $value['id']; ?>"><i class="fa fa-edit" style="color: orangered"></i></a> || 
                                                <a href="<?php echo base_url( 'user_c/delelet_user/'.base64_encode( $value['id'] ) ); ?>" onclick="return confirm('Are you sure want to delete this ?');" ><i class="fa fa-trash-o" style="color: orangered" title="Hapus"></i></a
                                            </td>
                                        </tr>

                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>


     <!-- START: POP-UP -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" data-toggle="modal" role="dialog" tabindex="-1" id="myModalEdit212" class="modal fade model_gw">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close close  pull-right text-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <!-- <span class="btn-custom-close" style="float: right;cursor: pointer;"><i class="fa fa-close"></i></span> -->
                    <h3 class="modal-title"><i class="fa fa-edit"></i> Edit Data User</h3>
                </div>
                <div class="info-warning alert alert-danger alert-dismissible" role="alert" style="display: none; margin-top: 0;"></div>
                <div class="modal-body">

                    <!-- START: CHANGE PASSWORD -->
                    <div class="change_password" style="display: none;">
                        <h4 class="modal-title"><strong> Change Password</strong></h4>
                        <br>
                        <form action="#" method="post" id="action_edit_pswd">
                            <div class="form-group">
                                <label>New Password :</label>
                                <input type="password" id="new_password" class="form-control" name="new_password" autocomplete="off" style="margin-bottom: 15px;">
                            </div>  

                            <div class="form-group">
                                <label>Re-Password :</label>
                                <input type="password" id="re_password" class="form-control" name="re_password" autocomplete="off" style="margin-bottom: 15px;">
                            </div>       

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="button" class="btn_cancel_change_password btn btn-info">Cancel</button>
                                        <button type="submit" name="btn-update-change-password" class="btn btn-warning btn-update-change-password">Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END: CHANGE PASSWORD -->

                    <!-- START: EDIT PRODILE -->
                    <div class="edit_data_user">
                        <h4 class="modal-title"><strong>Edit Profile</strong></h4>
                        <br>
                        <form action="#" method="post" id="action_edit_data">
                            <div class="form-group">
                                <label>Full Name :</label>
                                <input type="text" id="full_name" class="form-control" name="full_name" autocomplete="off" style="margin-bottom: 15px;">
                            </div>  

                            <div class="form-group">
                                <label>Email :</label>
                                <input type="text" id="email" class="form-control" name="email" autocomplete="off" style="margin-bottom: 15px;">
                            </div>     

                            <div class="form-group">
                                <label>Password: </label>
                                ***********
                                
                                <div id="btn_change_pswd">
                                    <!-- <button type="button" class="change_pass btn btn-xs btn-danger" style="text-decoration: none;"><i class="fa fa-pencil"></i> Change Password</button> -->
                                </div>
                            </div>   

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" name="" class="btn btn-warning btn-update-user-login">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END: EDIT PRODILE -->
      
                </div> <!-- END: Class modal-body -->
            </div>
        </div>
    </div>
    <!-- END: POP-UP -->

</div>
<!-- END: CONTENT -->

<script>
    // -------------------------------------------------------------
    // GET DATA EDIT
    function button_edit_data(clicked_id) {
        $('.change_password').hide();
        $('.edit_data_user').show();

        var key_access_id = '<?php echo $this->session->userdata('mysessi_id'); ?>';
        var key_access_em = '<?php echo $this->session->userdata('mysessi_email'); ?>';

        // alert(key_access);

        // ajax
        $.ajax({
            type: "POST",
            dataType: "json",
            url:"<?php echo base_url(); ?>user_c/get_data_from_ajax",
            data: { id: clicked_id },
            beforeSend: function() {
                // $('#ajax_loader_2').show();
            }
        }).done(function(responseData) {
            // console.log(responseData.data_user.id);
            $("#myModalEdit212").find("form#action_edit_data").attr("action", '<?php echo base_url( 'user_c/update_data_user/' ); ?>'+clicked_id);
            
            $('#full_name').val(responseData.data_user.nama_lengkap);
            $('#email').val(responseData.data_user.email);
            

            if ( responseData.data_user.email == key_access_em ) {
                // alert('ok');
                $("#btn_change_pswd").html('<button type="button" class="change_pass btn btn-xs btn-danger" style="text-decoration: none;"><i class="fa fa-pencil"></i> Change Password</button>');

                $('.change_pass').attr('id', responseData.data_user.id);
            } else {
                $("#btn_change_pswd").html('');
            }

        }).fail(function() {
           console.log('Failed');
        });
    }


   // UPDATE DATA
    $(".btn-update-user-login").on('click', function(e){

        e.preventDefault();

        var form_action = $("#myModalEdit212").find("form#action_edit_data").attr("action");

        var full_name = $('#full_name').val();
        var email = $('#email').val();

        $.ajax({
            // dataType: 'json',
            type: 'POST',
            url: form_action,
            data: {full_name: full_name, email: email},
            beforeSend: function() {
                // $('#ajax_loader_2').show();
            }
        }).done(function(data){

            location.reload();

        }).fail(function() {
           console.log('Failed');
           alert('Failed !');
        });
    });

    // -------------------------------------------------------------

    $('#add_data').on('click', function () {
        $('#content_add_data').slideToggle();
        $('#add_data').hide();
    });

    $('#close_add_data').on('click', function () {
        $('#content_add_data').slideToggle();
        $('#add_data').show();
    });

    // -------------------------------------------------------------

    // IF EDIT PASSWORD (OPEN FIELD EDIT PASSWORD)
    $(document).on('click', '.change_pass', function () {
        $('.change_password').show();
        $('.edit_data_user').hide();

        var the_id = $(this).attr('id');

        if ( the_id != '' ) {
            this_id = the_id;
        } else {
            this_id = '<?php echo substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyz0123456789' ), 0, 5 ); ?>';
        }

        var my_id = '<?php echo substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyz0123456789' ), 0, 5 ); ?>' + the_id + '<?php echo substr( str_shuffle( 'abcd0123456789' ), 0, 5 ); ?>';

        $(".change_password").find("form#action_edit_pswd").attr("action", '<?php echo base_url( 'user_c/edit_password/' ); ?>'+my_id);
    });


    // UPDATE PASSWORD
    $(".btn-update-change-password").on('click', function(e){

        e.preventDefault();

        var form_action = $(".change_password").find("form#action_edit_pswd").attr("action");

        var new_password = $('#new_password').val();
        var re_password = $('#re_password').val();

        $.ajax({
            // dataType: 'json',
            type: 'POST',
            url: form_action,
            data: {new_password: new_password, re_password: re_password},
            beforeSend: function() {
                // $('#ajax_loader_2').show();
            }
        }).done(function(data){

            location.reload();

        }).fail(function() {
           console.log('Failed');
           alert('Failed !');
        });
    });

    // -------------------------------------------------------------

    $('.btn_cancel_change_password').on('click', function () {
        $('.change_password').hide();
        $('.edit_data_user').show();
    });
    
</script>