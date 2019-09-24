<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct() {
		// $this->load->database();
	}

	public function get_user() 
	{
		$query = $this->db->get( 'users' );
		return $query->result_array();
	}

	public function get_user_login( $sessi ) 
	{
		$query = $this->db->get_where( 'users', array( 'email' => $sessi ) );
		return $query->row_array();
	}

	public function add_user_model( $data ) 
	{
		return $this->db->insert( 'users', $data );
	}

	public function update_user_model( $id, $data ) 
	{
		$this->db->where( 'id', $id );
		return $this->db->update( 'users', $data );
	}

	public function get_user_model_by_id( $id ) 
	{
		$query = $this->db->get_where( 'users', array( 'id' => $id ) );
		return $query->row_array();
	}

	public function get_foto( $id ) 
	{
		$query = $this->db->select('foto')
                ->where('id', $id)
                ->get('users');
		return $query->row_array();
	}

	public function update_password_model( $id, $password ) 
	{
		$this->db->set( 'password', $password );
		$this->db->where( 'id', $id );
		$this->db->update( 'users' );
	}

	public function dell_user_model( $id ) 
	{
		// $aaaaa = base64_decodOOe( $id );
		return $this->db->delete( 'users', array( 'id' => $id ) );
	}

}
