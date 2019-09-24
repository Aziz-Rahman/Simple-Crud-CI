<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_c extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library( 'pdf' );
		$this->load->model( 'user_model' );
		session_login();
	}


	public function index() 
	{
		$this->load->view( 'includes/header-and-sidebar' );
		// $data = array(
		// 	'get_data_user' => $this->user_model->get_user()
		// );
		$data['get_data_user'] = $this->user_model->get_user();
		$this->load->view( 'data_user', $data );
		$this->load->view( 'includes/footer' );	
	}


	public function add_data_user() 
	{ 
		// $this->data_user_login();
		$this->load->view( 'includes/header-and-sidebar' );
		// $this->form_validation->set_rules( 'full_name', '<strong>FULLNAME</strong>', 'required' );
		// $this->form_validation->set_rules( 'email', '<strong>email</strong>', 'required' );
		// $this->form_validation->set_rules( 'password', '<strong>PASSWORD</strong>', 'required' );

		$error_msg = array(
				        array(
		                        'field' => 'full_name',
		                        'label' => 'FULLNAME',
		                        'rules' => 'required',
		                        'errors' => array(
            						'required' => ' The %s field is required.',
           						)
		                ),
		                array(
		                        'field' => 'email',
		                        'label' => 'EMAIL',
		                        'rules' => 'required|is_unique[users.email]', // is_unique[table.field]
		                        'errors' => array(
            						'required' => ' The %s field is required.',
            						'is_unique' => ' This %s already exists !'
           						)
		                ),
		                array(
		                        'field' => 'password',
		                        'label' => 'PASSWORD',
		                        'rules' => 'required|min_length[6]',
		                        'errors' => array(
            						'required' => ' The %s field is required.',
            						'min_length' => ' Password length of at least {param} characters.'
           						)
		                )
					);

		$this->form_validation->set_rules( $error_msg );

		if ( isset( $_POST['btn-add-user'] ) ) 
		{
			// SHOW VALIDATIONS
			if ( $this->form_validation->run() == FALSE ) 
			{ 
				$this->session->set_flashdata( 'info_alert', validation_errors( '<i class="fa fa-exclamation-triangle"></i>' ) );
				redirect( 'page_user', 'refresh' );
			} 
			// SAVE TO DB
			else 
			{ 
				$password = $this->input->post( 'password' );
				$password_hash = password_hash( $password, PASSWORD_DEFAULT );

				// Configuration upload photo
				$config['upload_path'] 		= './assets/images/users';
				$config['allowed_types'] 	= 'jpg|png|jpeg';
				$config['max_size']  		= 1024;
				// $config['max_width'] 		= 300;
                // $config['max_height']       = 400;
				$config['remove_space'] 	= TRUE;

				$this->load->library( 'upload', $config ); // Load configuration

				if ( $this->upload->do_upload("foto_profile") ) 
				{
					$photo = array( 'upload_data' => $this->upload->data() );
					$data = array(
						'nama_lengkap'	=>	$this->input->post( 'full_name' ),
						'email'			=>	$this->input->post( 'email' ),
						'password'		=>	$password_hash,
						'foto'			=>	$photo['upload_data']['file_name'],
					);

					$insert = $this->user_model->add_user_model( $data );

					if ( $insert )
					{
						$this->session->set_flashdata( 'success', 'Data berhasil disimpan!' );
					}
					else
					{
						$this->session->set_flashdata( 'info_alert', 'Terjadi kesalahan dalam sistem !' );
					}
				}
				else
				{
					$message_error = array();

					array_push( $message_error, '<p><i class="fa fa-exclamation-triangle"></i> Data failed to save!</p>');
					array_push( $message_error, $this->upload->display_errors( '<p><i class="fa fa-exclamation-triangle"></i> ' ) );

					$this->session->set_flashdata( 'info_alert', implode( ' ', $message_error ) );
				}

				// die();
				redirect( 'page_user', 'refresh' );
			}
		} 
		// DEFAULTH LOAD DATA
		else 
		{ 
			$this->load->view( 'errors/404' );
		}
		
		$this->load->view( 'includes/footer' );	
	}


	public function update_data_user( $id ) 
	{
		// Kalau data bukan dari ajax post
		if ( $this->input->server( 'REQUEST_METHOD' ) == 'POST' ) 
		{
			$full_name 	= $this->input->post( 'full_name' );
			$email 		= $this->input->post( 'email' );

			// data update
			$data = array(
				'nama_lengkap'	=>	$full_name,
				'email'			=>	$email
			);

			$update = $this->user_model->update_user_model( $id, $data );

			if ( $update )
			{
				// Create new session after update data
				$reate_new_sessi = array(
					'mysessi_name'	=>	$full_name,
					'mysessi_email'	=>	$email
				);

				$this->session->set_userdata( $reate_new_sessi ); // create new sessi
				$this->session->set_flashdata( 'success', 'Data berhasil diperbarui!' );
				redirect( 'page_user', 'refresh' );
			}
			else
			{
				$this->session->set_flashdata( 'info_alert', 'Data gagal diperbarui!' );
				redirect( 'page_user', 'refresh' );
			}
		} 
		else 
		{
			// redirect to 404
			$this->load->view( 'errors/404' );
		}
	}


	public function detail_user( $id ) 
	{
		$data['user_detail'] = $this->user_model->get_user_model_by_id( base64_decode( $id ) );

		$this->load->view( 'includes/header-and-sidebar' );
		$this->load->view( 'detail_user', $data );
		$this->load->view( 'includes/footer' );	
	}


	public function get_data_from_ajax() 
	{
		if ( $this->input->server( 'REQUEST_METHOD' ) == 'POST' ) 
		{
			$id =	$this->input->post( 'id' );
			$data['data_user'] = $this->user_model->get_user_model_by_id( $id );
			// print_r($data);
			echo json_encode( $data );
		} 
		else 
		{
			$this->load->view( 'errors/404' );
		}
	}


	public function edit_password( $id ) 
	{
		// Kalau data bukan dari ajax post
		if ( $this->input->server( 'REQUEST_METHOD' ) == 'POST' ) 
		{
			$new_password =	$this->input->post( 'new_password' );
			$re_password =	$this->input->post( 're_password' );

			$back_trim = substr( $id, 0, -5 ); // potong 5 angka dari belakang
			$front_trim = substr( $back_trim, 5 ); // potong 5 angka dari depan
			$the_id = $front_trim; //  id user


			if ( $this->session->userdata('mysessi_id') == $the_id ) 
			{ // check sessi id
				$message_error = array();

				if ( empty( $new_password ) AND empty( $re_password ) ) 
				{
					array_push( $message_error, "<p><i class=\"fa fa-exclamation-triangle\"></i> Password tidak boleh kosong, silahkan ulangi.</p>");
		        }

				if ( strlen( $new_password ) < 8 ) 
				{
		            array_push( $message_error, "<p><i class=\"fa fa-exclamation-triangle\"></i> Panjang karakter password minimal 8 karakter, silahkan ulangi.</p>");
		        }

		        if ( $new_password != $re_password ) 
		        {
					array_push( $message_error, "<p><i class=\"fa fa-exclamation-triangle\"></i> Password tidak sama, silahkan ulangi.</p>");
		        }
				

				if ( !empty( $message_error ) ) 
				{
					$this->session->set_flashdata( 'info_alert', implode( ' ', $message_error ) );
		            redirect( 'page_user', 'refresh' );
				} 
				else 
				{
					$password_hash = password_hash( $new_password, PASSWORD_DEFAULT );
					$this->user_model->update_password_model( $the_id, $password_hash );

					if ( $this->db->affected_rows() > 0 ) 
					{
						$this->session->set_flashdata( 'success', 'Password Anda berhasil diperbarui!' );
						redirect( 'page_user', 'refresh' );
					} 
					else 
					{
						$this->session->set_flashdata( 'info_alert', 'Password gagal diperbarui!' );
		            	redirect( 'page_user', 'refresh' );
					}
				}
			} 
			else 
			{
				$this->session->set_flashdata( 'info_alert', 'Terjadi kesalahan dalam sistem !' );
		        redirect( 'page_user', 'refresh' );
			} // end: check session id
		} 
		else 
		{
			// redirect to 404
			$this->load->view( 'errors/404' );
		}
	}


	public function delelet_user( $id ) 
	{
		$image_path = './assets/images/users/'; // image path

		// get db record from image to be deleted
	    $get_image = $this->user_model->get_foto( base64_decode( $id ) );

        // delete file, if exists...
        $filename = $image_path . $get_image['foto']; 

        if ( file_exists( $filename ) )
        {
            unlink( $filename );
        } 

        // Delete data
        $this->user_model->dell_user_model( base64_decode( $id ) );	
		$this->session->set_flashdata( 'success', 'Data berhasil dihapus!' );	
	    redirect( 'page_user', 'refresh' );
	}



	public function cetak_data_user() 
	{
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetFont('times', '', 14);
		$pdf->AddPage();
		//set margins
		$pdf->SetMargins(5, 5, 15);
		$pdf->SetHeaderMargin(false);
		$pdf->SetFooterMargin(false);
		$pdf->Ln(1);
		$pdf->Ln(0);
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, 10);
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->Cell(0, 0, 'TESTING PDF', 0, 1, 'C');
		$pdf->Output('report by me wkwkwk', 'I');
	}


	public function errors() 
	{
		$this->load->view( 'errors/404' );
	}

}
