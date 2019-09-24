<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* -------------------------------------
* CHECK SESSION LOGIN
* -------------------------------------
*/
if ( ! function_exists('session_login') ) {
    function session_login() 
    {
		// if ( $this->session->userdata( 'logged_in' ) ) {
    	if ( isset( $_SESSION['logged_in'] ) ) 
    	{
			return TRUE;
		} 
		else 
		{
			redirect('./');
		}
	}
}


/**
* -------------------------------------
* GET DATA USER LOGIN
* -------------------------------------
*/
// if ( ! function_exists('data_user_login') ) {
//     function data_user_login() {
// 		$CI = get_instance();
// 		$CI->load->model( 'user_model' );

// 		$CI->user_model->get_user_login();
// 	}
// }