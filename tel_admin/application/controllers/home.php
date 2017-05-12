<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		
    }
	public function index()
	{
		$this->load->model('login_model');
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('home_view',$data);
		
	}
	public function about_us()
	{
		$this->load->model('login_model');
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('about_us_view',$data);
		
	}
	public function show_policies()
	{
		$this->load->view('show_policies_view');
	}

}

?>