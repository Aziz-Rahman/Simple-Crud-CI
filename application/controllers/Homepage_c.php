<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_c extends CI_Controller {

	public function __construct() {
		parent::__construct();
		session_login();
		// $this->load->helper("gue_helper");
	}


	public function index() 
	{
		if ( $this->session->userdata( 'logged_in' ) ) {
			$this->load->view( 'includes/header-and-sidebar' );
			$this->load->view( 'halaman_utama' );
			$this->load->view( 'includes/footer' );
		} else {
			$this->load->view( 'login' );
		}
	}


	public function errors() 
	{
		$this->load->view( 'errors/404' );
	}
}
