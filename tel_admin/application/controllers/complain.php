<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Complain extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model(array('login_model','insert_model','fetch_model'));
		
    }
	public function index()
	{
		
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('complain_view',$data);
	}
	public function submit_complain()
	{
		
		$this->insert_model->insert_complain();
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('submit_success_view',$data);
	}
	
	public function address_complain()
	{
		
		$data['complain'] = $this->fetch_model->fetch_complain();
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('address_complain_view',$data);
	}
	
	public function complain_solved($id)
	{
		
		$this->insert_model->delete_complain($id);
		$data['complain'] = $this->fetch_model->fetch_complain();
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('address_complain_view',$data);
	}
}
?>
