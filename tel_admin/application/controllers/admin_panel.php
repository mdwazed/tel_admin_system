<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_panel extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->model(array('fetch_model','insert_model','login_model'));
		
		$this->login_validate();
		$this->load->library('table'); 	
		
    }
	public function login_validate()
	{
		
		if(!$this->login_model->get_logged_data())
		{
			redirect('/login/log_in', 'refresh');		
		}
		
	}
	public function pending_req() //pending request for recommeendation//////
	{
		
		if($this->input->post('recom'))
		{
			$this->insert_model->recommend();
		}
		
		$data['pending'] = $this->fetch_model->fetch_recom_pending_data($this->session->userdata('usr_appt'));
		///////////fol code reqr for getting user login status ////////////////////
		
		$data['login_status'] = $this->login_model->get_logged_data();
		//echo 'pending';
		$this->load->view('pending_req_view',$data);
		
		////////// req for casual conn//////////////////////////////////////////
		
		if($this->input->post('recom_casual'))
		{
			
			$this->insert_model->recommend_casual();
		}
		
		$data['pending'] = $this->fetch_model->fetch_casual_recom_pending_data($this->session->userdata('usr_appt'));
		///////////fol code reqr for getting user login status ////////////////////
		//$this->load->model('login_model');
		//$data['login_status'] = $this->login_model->get_logged_data();
		//echo 'pending';
		$this->load->view('pending_casual_req_view',$data);
	}
	
	public function app_awaiting_req()  //pending request for approval//////
	{
		if($this->input->post('app'))
		{
			
			$this->insert_model->app();
		}
		
		$data['pending'] = $this->fetch_model->fetch_app_pending_data($this->session->userdata('usr_appt'));
		///////////fol code reqr for getting user login status ////////////////////
	
		$data['login_status'] = $this->login_model->get_logged_data();
		//echo 'pending';
		$this->load->view('app_req_view',$data);
		
		/////////////////casual connection//////////////
		if($this->input->post('app_casual'))
		{
			
			$this->insert_model->app_casual();
		}
		
		$data['pending'] = $this->fetch_model->fetch_app_casual_pending_data($this->session->userdata('usr_appt'));
		///////////fol code reqr for getting user login status ////////////////////
		
		$data['login_status'] = $this->login_model->get_logged_data();
		//echo 'pending';
		$this->load->view('app_casual_req_view',$data);
	}
	public function connect()
	{
		$login_data = $this->login_model->get_logged_data();
		
		if($login_data['usr_appt'] == 'cdso')
		{
			/////////function for cdso s approval////////////////////
			if($this->input->post('app'))
			{
				
				$this->insert_model->app_cdso();
			}
			
			$data['pending'] = $this->fetch_model->fetch_cdso_pending_data();
			///////////fol code reqr for getting user login status for getting the user appt ////////////////////
		
			$data['login_status'] = $this->login_model->get_logged_data();
			//echo 'pending';
			$this->load->view('cdso_req_view',$data);
			
					/////////function for connection in MDF////////////////////
			
			if($this->input->post('connect'))
			{
				
				$this->insert_model->disconnect_previous();
				$this->insert_model->connect();
				
			}
			
			$data['pending'] = $this->fetch_model->fetch_mdf_pending_data();
			///////////fol code reqr for getting user login status for getting the user appt ////////////////////
		
			$data['login_status'] = $this->login_model->get_logged_data();
			//echo 'pending';
			$this->load->view('mdf_view',$data);
	
	
			///////////method of casual connection/////////////////////////////////////////////////////////////
			/////////function for cdso s approval////////////////////
			if($this->input->post('app_casual'))
			{
				
				$this->insert_model->app_cdso_casual();
			}
			
			$data['pending'] = $this->fetch_model->fetch_cdso_casual_pending_data();
			///////////fol code reqr for getting user login status for getting the user appt ////////////////////
		
			$data['login_status'] = $this->login_model->get_logged_data();
			//echo 'pending';
			$this->load->view('cdso_casual_req_view',$data);
			
					/////////function for connection in MDF////////////////////
			
			if($this->input->post('connect_casual'))
			{
				$this->insert_model->connect_casual();
				
			}
			
			$data['pending'] = $this->fetch_model->fetch_mdf_casual_pending_data();
			///////////fol code reqr for getting user login status for getting the user appt ////////////////////
			
			$data['login_status'] = $this->login_model->get_logged_data();
			//echo 'pending';
			$this->load->view('mdf_casual_view',$data);
		}
		else
		{
			echo 'Sorry u r not admin of Static Sig';
			echo anchor('home', 'Click here to go back');
		}
	}
	public function conn_cfm($id)
	{
		
		$data['to_conn_data']=$this->fetch_model->get_casual_data($id);
	
		$data['login_status'] = $this->login_model->get_logged_data();
		$this->load->view('insert_tel_no_view',$data);
	}
	public function user_admin()
	{
		if($this->input->post('save'))
		{
			$this->insert_model->update_user();
			$this->session->sess_destroy();
			redirect('/home', 'refresh');
		}
		else
		{
			$data['login_status'] = $this->login_model->get_logged_data();
			$data['usr_info'] = $this->fetch_model->get_user($this->session->userdata('username'));
			$this->load->view('user_admin_view',$data);
		}
	}
	
	public function admin_user($id)
	{
		
		
			$this->insert_model->delete_user($id);
			$data['login_status'] = $this->login_model->get_logged_data();
			$data['users'] = $this->fetch_model->fetch_users();
			$this->load->view('users_view',$data);
		
			
		
	}
	public function reject_perm($id)
	{
		//echo $id;
		$this->insert_model->entry_delete_perm($id);
		$this->pending_req();
		
		//$data['login_status'] = $this->login_model->get_logged_data();
		//$this->load->view('submit_success_view',$data);
		
	}
	public function reject_casual($id)
	{
		//echo $id;
		$this->insert_model->entry_delete_casual($id);
		$this->pending_req();
		//$data['login_status'] = $this->login_model->get_logged_data();
		//$this->load->view('submit_success_view',$data);
	}
	public function add_unit()
	{
		if($this->input->post('submit'))
		{
			$this->insert_model->add_unit();
		
			$data['login_status'] = $this->login_model->get_logged_data();
			$this->load->view('add_unit_view',$data);
		}
		else
		{
			$data['login_status'] = $this->login_model->get_logged_data();
			$this->load->view('add_unit_view',$data);
		}
	}
/*	public function show_status()
	{
		//$this->load->library('table');
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['pending'] = $this->fetch_model->fetch_pending_status();
		$this->load->view('pending_status_view',$data);
		$data['pending'] = $this->fetch_model->fetch_casual_pending_status();
		$this->load->view('pending_casual_status_view',$data);
		
	}*/
	
}
?>