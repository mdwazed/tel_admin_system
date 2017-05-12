<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_auth extends CI_Controller{

	 public function auth()
    {
       //$this->load->library('session'); 
       $sess_data = array(
					'username' => 'wa',
					'user_type' => 'admin',
					'logged_in' => TRUE
					);
		$this->session->set_userdata($sess_data);
		echo 'session started' ;
		echo $this->session->userdata('username');
		
		
    }
	
}
?>