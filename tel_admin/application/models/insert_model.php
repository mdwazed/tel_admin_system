<?php

class Insert_model extends CI_Model{
	
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	
	function entry_insert()
	{
		
	
			$data['ba_no'] = $this->input->post('ba_no');
			$data['rank'] = $this->input->post('rank');
			$data['name'] = $this->input->post('name');
			$data['unit'] = $this->input->post('unit');
			$data['appt'] = $this->input->post('appt');
			$data['tel_no'] = $this->input->post('tel_no');
			$data['date_req'] = $this->input->post('date_req');
			$data['pre_ba_no'] = $this->input->post('pre_ba_no');
			$data['pre_rank'] = $this->input->post('pre_rank');
			$data['pre_name'] = $this->input->post('pre_name');
			$data['pre_unit'] = $this->input->post('pre_unit');
			$data['pre_appt'] = $this->input->post('pre_appt');
			$data['present_loc'] = $this->input->post('present_loc');
			$data['new_loc'] = $this->input->post('new_loc');
			$data['bill_off'] = $this->input->post('bill_off');
			$data['bill_pte'] = $this->input->post('bill_pte');
			$data['reason'] = $this->input->post('reason');
			$data['recom_auth'] = $this->input->post('recom_auth');
			$data['app_auth'] = $this->input->post('app_auth');
			//print_r($data);
			$this->db->insert('tbl_main',$data);
	}
	function update_data()
	{
		//var_dump($_POST);
		$type = $this->input->post('type');
		$data = array(
				'ba_no' => $this->input->post('ba_no'),
				'rank' => $this->input->post('rank'),
				'name' => $this->input->post('name'),
				'unit' => $this->input->post('unit'),
				'appt' => $this->input->post('appt'),
				'tel_no' => $this->input->post('tel_no'),
				
				'recom_auth' => $this->input->post('recom_auth'),
				'recom' => $this->input->post('recom'),
				'app_auth' => $this->input->post('app_auth'),
				'app' => $this->input->post('app'),
				'app_cdso' => $this->input->post('app_cdso'),
				'inuse' => $this->input->post('inuse'),
				);
		if($type == 'perm')
		{
			$data['new_loc'] = $this->input->post('loc');
			$data['connected'] = $this->input->post('connected');
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_main',$data);	
			redirect('/stat/all_perm', 'refresh');		
		}
		else if($type == 'casual')
		{
			$data['loc'] = $this->input->post('loc');
			$data['conn'] = $this->input->post('connected');
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('tbl_casual',$data);
			redirect('/stat/all_casual', 'refresh');
		}
		
	}
	function recommend()
	{
		foreach($_POST as $key => $value)
			{
				if($key != 'recom')
				{
					//echo $key.'->'.$value;
					$data = array(
							'recom' => TRUE,
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_main',$data);
				}
			}
	}
	
	public function app()
	{
		foreach($_POST as $key => $value)
			{
				if($key != 'app')
				{
					//echo $key.'->'.$value;
					$data = array(
							'app' => TRUE,
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_main',$data);
				}
			}
	}
	public function app_cdso()
	{
		foreach($_POST as $key => $value)
			{
				if($key != 'app')
				{
					//echo $key.'->'.$value;
					$data = array(
							'app_cdso' => TRUE,
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_main',$data);
				}
			}
	}
	public function disconnect_previous()
	{
		//var_dump($_POST);
		foreach($_POST as $key => $value)
			{				
				if($key != 'connect')
				{
					//echo $key.'->'.$value;
				
					//$this->db->where('tel_no',$value);
					$this->db->delete('tbl_main',array('tel_no' => $value, 'connected' => TRUE));
				}
			}
	}
	public function connect()
	{
		//var_dump($_POST);
		foreach($_POST as $key => $value)
			{
				if($key != 'connect')
				{
					//echo $key.'->'.$value;
					$data = array(
							'connected' => TRUE,
							'conn_date' => date('Y-m-d')
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_main',$data);
				}
			}
	}
	
	
	function entry_delete_perm($id)
	{
		$this->db->delete('tbl_main',array('id' => $id));
	}
	function entry_delete_casual($id)
	{
		$this->db->delete('tbl_casual',array('id' => $id));
	}


////////////////////////////// function of casual connection which are diff from above method///////////////////////
	function entry_insert_casual()
	{	
			$data['ba_no'] = $this->input->post('ba_no');
			$data['rank'] = $this->input->post('rank');
			$data['name'] = $this->input->post('name');
			$data['unit'] = $this->input->post('unit');
			$data['appt'] = $this->input->post('appt');
			$data['reason'] = $this->input->post('reason');
			$data['duration'] = $this->input->post('duration');
			$data['loc'] = $this->input->post('loc');
			$data['auth_govt_qtr'] = $this->input->post('auth_govt_qtr');
			$data['auth_tel_conn'] = $this->input->post('auth_tel_conn');
			$data['recom_auth'] = $this->input->post('recom_auth');
			$data['app_auth'] = $this->input->post('app_auth');
			
			//print_r($data);
			$this->db->insert('tbl_casual',$data);
	}
	function recommend_casual()
	{
		foreach($_POST as $key => $value)
			{
				if($key != 'recom_casual')
				{
					//echo $key.'->'.$value;
					$data = array(
							'recom' => TRUE,
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_casual',$data);
				}
			}
	}
	
	public function app_casual()
	{
		foreach($_POST as $key => $value)
			{
				if($key != 'app')
				{
					//echo $key.'->'.$value;
					$data = array(
							'app' => TRUE,
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_casual',$data);
				}
			}
	}
	
	public function app_cdso_casual()
	{
		foreach($_POST as $key => $value)
			{
				if($key != 'app_casual')
				{
					//echo $key.'->'.$value;
					$data = array(
							'app_cdso' => TRUE,
							);
					$this->db->where('id',$key);
					$this->db->update('tbl_casual',$data);
				}
			}
	}
	
	public function connect_casual()
	{
					
		$data = array(
				'conn' => TRUE,
				'conn_date' => date('Y-m-d'),
				'tel_no' => $this->input->post('tel_no')
				);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('tbl_casual',$data);				
			
	}
	public function disconn_casual($id)
	{
		$this->db->delete('tbl_casual',array('id' => $id));
	}
	function register()
	{
		
	
			$data['usr_name'] = $this->input->post('uname');
			$data['full_name'] = $this->input->post('fname');
			$data['passwd'] = $this->input->post('passwd');
			$data['usr_type'] = $this->input->post('');
			$data['unit'] = $this->input->post('unit');
			$data['usr_appt'] = $this->input->post('usr_appt');
			$data['invogue'] = $this->input->post('invogue');
		
			//print_r($data);
			$this->db->insert('usr',$data);
	}
	function update_user()
	{
		//var_dump($_POST);
	
		$data = array(
				'usr_name' => $this->input->post('usr_name'),
			
				'passwd' => $this->input->post('passwd'),
				'full_name' => $this->input->post('fname'),
				'unit' => $this->input->post('unit'),				
				);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('usr',$data);		
	}
	function delete_user($id)
	{
	
		$this->db->where('id',$id);
		$this->db->delete('usr');		
	}
	///////////////// complain table /////////////////////////
	
	public function insert_complain()
	{
		$data['tel_no'] = $this->input->post('tel_no');
		$data['complain'] = $this->input->post('complain');
			
			
		$this->db->insert('tbl_complain',$data);
	}
	
	public function delete_complain($id)
	{
		$this->db->delete('tbl_complain',array('id' => $id));
	}
	public function add_unit()
	{
		$data['unit'] = $this->input->post('unit');
		$data['unit_loc'] = $this->input->post('unit_loc');
			
			
		$this->db->insert('tbl_unit',$data);
	}
}
?>