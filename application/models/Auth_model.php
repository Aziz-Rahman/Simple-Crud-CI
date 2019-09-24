<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct() {
		// $this->load->database();
	}

	public function login_model( $email, $password ) 
	{
		// $password_hash = password_hash( $password, PASSWORD_DEFAULT );
		$query = $this->db->get_where( 'users', array( 'email' => $email ) );
		$get_data = $query->row_array();
		$check_data_from_db = $query->num_rows();

		if ( $check_data_from_db > 0 ) 
		{
			if ( password_verify( $password, $get_data['password'] ) ) 
			{
				return TRUE;
			} 
			else 
			{
				return FALSE;
			}
		}
	}

	public function get_user_login_model( $email ) 
	{
		$query = $this->db->get_where( 'users', array( 'email' => $email ) );
		return $get_data = $query->row_array();
	}

	public function register_model( $data ) 
	{
		return $this->db->insert( 'users', $data );
	}
}
