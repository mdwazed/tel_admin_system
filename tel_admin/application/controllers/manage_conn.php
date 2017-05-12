<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_conn extends CI_Controller {

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
	public function manage_perm($id)
	{
		echo 'manage prm';
		
			$data['type'] = 'perm';
			$data['login_status'] = $this->login_model->get_logged_data();
			$data['iteam'] = $this->fetch_model->get_perm_data($id);
			$data['units'] = $this->fetch_model->fetch_unit();
			$this->load->view('manage_conn_view',$data);

		
	}
	public function del_pending_perm($id)
	{
		$this->insert_model->entry_delete_perm($id);
		redirect('manage_conn/manage_pending_req', 'refresh');
	}
	public function del_pending_casual($id)
	{
		$this->insert_model->entry_delete_casual($id);
		redirect('manage_conn/manage_pending_req', 'refresh');
	}
	public function manage_casual($id)
	{
		echo 'manage casual';
		
		$data['type'] = 'casual';
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['iteam'] = $this->fetch_model->get_casual_data($id);
		$data['units'] = $this->fetch_model->fetch_unit();
		$this->load->view('manage_conn_view',$data);
	}
	public function update_conn()
	{
		if($this->input->post('update'))
		{
			$this->insert_model->update_data();
			
		}
		elseif($this->input->post('print_record'))
		{
			$this->print_record();
		}
		
	}
	
	public function print_record()
	{
				
		if($this->input->post('type')== 'perm')
		{
			
			$id = $this->input->post('id');
			$data['iteam'] = $this->fetch_model->get_perm_data($id);
		}
		elseif($this->input->post('type')== 'casual')
		{
		
			$id = $this->input->post('id');
			$data['iteam'] = $this->fetch_model->get_casual_data($id);
		}
		
		$this->load->view('print_record_view',$data);	
	}
	public function manage_pending_req()
	{
		$data['login_status'] = $this->login_model->get_logged_data();
		$data['pending'] = $this->fetch_model->fetch_pending_status();
		$this->load->view('pending_status_view',$data);
		$data['pending'] = $this->fetch_model->fetch_casual_pending_status();
		$this->load->view('pending_casual_status_view',$data);
	}
}

?>