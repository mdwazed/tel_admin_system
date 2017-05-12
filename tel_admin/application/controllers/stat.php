<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stat extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->model(array('fetch_model','login_model','insert_model'));
		$this->load->library('table');
		//$this->login_validate();	 	
		
    }
	public function all_perm()
	{
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['all_data'] = $this->fetch_model->fetch_all_perm();
		$data['inuse_data'] = $this->fetch_model->fetch_all_perm_inuse();
		$data['type'] = 'perm' ;
		$this->load->view('all_view',$data);
	}
	public function all_casual()
	{
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['all_data'] = $this->fetch_model->fetch_all_casual();
		$data['inuse_data'] = $this->fetch_model->fetch_all_casual();
		$data['type'] = 'casual' ;
		$this->load->view('all_view',$data);
	}
	public function disconn_casual()
	{
		if($this->input->post('do_disconn'))
		{
			$this->insert_model->disconn_casual($this->input->post('id'));
			redirect('/stat/all_casual', 'refresh');
			echo 'disconnected';
		}
		else if($this->input->post('search'))
		{
			
			$tel_no = $this->input->post('tel_no');
			$data['details'] = $this->fetch_model->fetch_casual_data($tel_no);
			$data['login_status'] = $this->login_model->get_logged_data();
			$this->load->view('disconn_detail_view',$data);
		}
		else
		{
			$data['login_status'] = $this->login_model->get_logged_data();
			$this->load->view('disconn_view',$data);
		}
	}
	public function search_conn()
	{
		
	}
	public function show_status()
	{
		//$this->load->library('table');
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['pending'] = $this->fetch_model->fetch_pending_status();
		$this->load->view('pending_status_view',$data);
		$data['pending'] = $this->fetch_model->fetch_casual_pending_status();
		$this->load->view('pending_casual_status_view',$data);
		
	}
	public function tel_dir()
	{
		
		if($this->input->post('submit'))
		{
			//echo 'submitted' ;
			if($this->input->post('name'))
			{
				if($this->input->post('unit'))
				{
					//echo 'both submitted';
					$n_u = array(
							'name' => $this->input->post('name'),
							'unit' => $this->input->post('unit')
							);
							
					$data['dir'] = $this->fetch_model->fetch_tel_dir_name_unit($n_u); //both name and unit submitte
					$data['n'] = $this->fetch_model->fetch_tel_dir_name_option();
					$data['u'] = $this->fetch_model->fetch_tel_dir_unit_option();
				}
				else
				{
					//echo $this->input->post('name');
					$data['dir'] = $this->fetch_model->fetch_tel_dir_name($this->input->post('name')); //only name submitted
					$data['n'] = $this->fetch_model->fetch_tel_dir_name_option();
					$data['u'] = $this->fetch_model->fetch_tel_dir_unit_option();
					
					
				}
			}
			if($this->input->post('unit'))
			{
				//echo 'unit submitted';
				$data['dir'] = $this->fetch_model->fetch_tel_dir_unit($this->input->post('unit')); //only unit submitted
				$data['n'] = $this->fetch_model->fetch_tel_dir_name_option();
				$data['u'] = $this->fetch_model->fetch_tel_dir_unit_option();
			}
		}
		else
		{
			//echo 'nothing sub';
			$data['dir'] = $this->fetch_model->fetch_tel_dir();  // nothing submitted
			$data['n'] = $this->fetch_model->fetch_tel_dir_name_option();
			$data['u'] = $this->fetch_model->fetch_tel_dir_unit_option();
		}
		$this->load->view('tel_dir_view',$data);
	}
	
	public function show_users()
	{
		//$this->load->library('table');
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['users'] = $this->fetch_model->fetch_users();
		$this->load->view('users_view',$data);
				
	}
}
?>