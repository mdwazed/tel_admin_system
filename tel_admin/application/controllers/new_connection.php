<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class New_connection extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		
    }
	public function index()
	{
		$this->load->model('login_model');
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('new_connection_view',$data);
	}
}
?>
