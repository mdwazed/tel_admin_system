<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casual extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model(array('login_model','fetch_model'));
		
    }
	public function index()
	{
		
		$data['appts'] = $this->fetch_model->fetch_appt();
		$data['units'] = $this->fetch_model->fetch_unit();
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('casual_view',$data);
	}
	
	public function submit_casual()
	{
		if($this->input->post('submit'))
		{	
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('loc', 'Loc', 'required');
			$this->form_validation->set_rules('recom_auth', 'Recom Auth', 'required');
			$this->form_validation->set_rules('app_auth', 'App Auth', 'required');
			
				if ($this->form_validation->run() == FALSE)
				{
					//echo " pl submit again....." ;
					$data['appts'] = $this->fetch_model->fetch_appt();
					$data['units'] = $this->fetch_model->fetch_unit();
					$data['login_status'] = $this->login_model->get_logged_data();
					$this->load->view('casual_view',$data);
				}
				else
				{
					$this->load->model('insert_model');
					$this->insert_model->entry_insert_casual();
				
					$data['appts'] = $this->fetch_model->fetch_appt();
					$data['units'] = $this->fetch_model->fetch_unit();
					$data['login_status'] = $this->login_model->get_logged_data();
					$this->load->view('submit_success_view',$data);
				}
		}
	}

}

?>