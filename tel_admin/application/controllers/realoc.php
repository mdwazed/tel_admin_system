<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realoc extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation'); 
		$this->load->model(array('login_model','fetch_model'));
		
		
		//$this->load->database();
	
		
    }
	public function index()
	{
		//$this->load->view('incl/header');
		//$this->load->view('incl/leftbar');
		
		//$this->load->view('incl/adminbar');
		
		$data['units'] = $this->fetch_model->fetch_unit();
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('realoc_view',$data);
		
		//$this->load->view('incl/footer');
	}
	public function realoc_form()
	{
		if($this->input->post('submit'))
		{	
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('unit', 'Unit', 'required');
			$this->form_validation->set_rules('tel_no', 'Tel No', 'required');
			
				if ($this->form_validation->run() == FALSE)
				{
					//echo " pl submit again....." ;
					$data['login_status'] = $this->login_model->get_logged_data();
					$data['units'] = $this->fetch_model->fetch_unit();
					$this->load->view('realoc_view',$data);
				}
				else
				{	
					if($this->check_tel_no_aval())
					{
						$this->load->model('fetch_model');
					$data['ba_no'] = $this->input->post('ba_no');
					$data['rank'] = $this->input->post('rank');
					$data['name'] = $this->input->post('name');
					$data['unit'] = $this->input->post('unit');
					$data['appt'] = $this->input->post('appt');
					$data['tel_no'] = $this->input->post('tel_no');
					//print_r($data);		
					$tel_no = $data['tel_no'] ;
					/////get previous owner data/////////////
					$data['pre_data'] = $this->fetch_model->fetch_data($tel_no);
					//print_r($data);
					//$this->load->view('incl/header');
					//$this->load->view('incl/leftbar');
					///////////fol code reqr for getting user login status ////////////
				
					$data['appts'] = $this->fetch_model->fetch_appt();
					$data['login_status'] = $this->login_model->get_logged_data();
					$this->load->view('full_realoc_view',$data);
						//$this->load->view('incl/footer');
					}
					else
					{
						echo 'sorry this is not a valid tel no for this type of req. Consult static sig coy for valid tel no';
					}
						
				}
		}
		
	}
	function check_tel_no_aval()
	{
		//echo ;
		$data = $this->fetch_model->fetch_data($this->input->post('tel_no'));
		//var_dump($data);
		if(count($data)>0)
			return true;
		else
			return false;
	}
	function save_realoc_form()
	{
		//echo $data['ba_no'];
		if($this->input->post('save'))
		{
			$this->form_validation->set_rules('new_loc', 'New Loc', 'required');
			$this->form_validation->set_rules('recom_auth', 'Recom Auth', 'required');
			$this->form_validation->set_rules('app_auth', 'App Auth', 'required');
			
				if ($this->form_validation->run() == FALSE)
				{
					//echo " pl submit again....." ;
					$data['login_status'] = $this->login_model->get_logged_data();
					$data['units'] = $this->fetch_model->fetch_unit();
					$this->load->view('realoc_view',$data);
				}
				else
				{
			
						//echo 'submitted';
						//echo $this->input->post('ba_no');
						//echo $this->input->post('pre_ba_no');
						$this->load->model('insert_model');
						
						$this->insert_model->entry_insert();	
						$this->load->model('login_model');
						$data['login_status'] = $this->login_model->get_logged_data();
						$this->load->view('submit_success_view',$data);	
				}
			
			
		}
		else
		{
			
		}
		
	}
	function login_check()
	{
		$this->load->library('admin_auth');
		$this->admin_auth->auth();
	}

}

?>