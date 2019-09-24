<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_login_register_c extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'auth_model' );
		// $this->load->library( 'session' );
	}


	public function login() 
	{
		if ( $this->session->userdata( 'logged_in' ) ) 
		{
			$this->load->view( 'includes/header-and-sidebar' );
			$this->load->view( 'halaman_utama' );
			$this->load->view( 'includes/footer' );
		} 
		else 
		{
			// redirect('Homepage_c/login','refresh');
			$this->load->view( 'login' );
		}
	}


	public function check_login() 
	{

		$email = $this->input->post( 'email' );
		$password = $this->input->post( 'password' );
		// check login user
		$cuccess_login = $this->auth_model->login_model( $email, $password );

		if ( $cuccess_login == TRUE ) 
		{
			// get data user by login user
			$data = $this->auth_model->get_user_login_model( $email );

			// CREATE SESSION
			$creat_sessi = array(
				'mysessi_id'		=> $data['id'],
				'mysessi_name'		=> $data['nama_lengkap'],
		        'mysessi_email' 	=> $data['email'],
		        'mysessi_password' 	=> $data['password'],
		        'logged_in' 		=> TRUE
			);

			$this->session->set_userdata( $creat_sessi );
			redirect( 'Homepage_c' );

		} 
		else 
		{
			$this->session->set_flashdata( 'login_failed', 'email atau password salah!' );
			redirect( './' );
		}
	}


	public function register() 
	{
		if ( isset( $_POST['btn-register'] ) ) 
		{

			$error_msg = array(
					        array(
			                        'field' => 'full_name',
			                        'label' => 'FULLNAME',
			                        'rules' => 'required'
			                ),
			                array(
			                        'field' => 'email',
			                        'label' => 'EMAIL',
			                        'rules' => 'required'
			                ),
			                array(
			                        'field' => 'password',
			                        'label' => 'PASSWORD',
			                        'rules' => 'required'
			                )
						);

			$this->form_validation->set_rules( $error_msg );

			// SHOW VALIDATIONS
			if ( $this->form_validation->run() == FALSE ) 
			{ 
				$this->session->set_flashdata( 'info_alert', validation_errors( '<i class="fa fa-exclamation-triangle"></i>' ) );
				// redirect( 'login' );
				redirect( 'auth_login_register_c/login' );
			} 
			else 
			{
				$full_name 		= $this->input->post( 'full_name' );
				$email 			= $this->input->post( 'email' );
				$password 		= $this->input->post( 'password' );
				$password_hash 	= password_hash( $password, PASSWORD_DEFAULT );

				$data = array(
							'nama_lengkap' 	=> $full_name,
							'email' 		=> $email,
							'password' 		=> $password_hash
						);

				$add_user = $this->auth_model->register_model( $data );

				if ( $add_user ) 
				{
					$this->session->set_flashdata( 'success', 'Data berhasil disimpan!, silahkan login untuk melanjutkan.' );
					// die();
				} 
				else 
				{
					$this->session->set_flashdata( 'info_alert', 'GAGAL !' );
				}
				// redirect( 'login', 'refresh' );
				redirect( 'auth_login_register_c/login' );
			}
		}
	}


	public function logout() 
	{
		$this->session->sess_destroy();
    	redirect('./');
	}


	public function errors() 
	{
		$this->load->view( 'errors/404' );
	}

}
