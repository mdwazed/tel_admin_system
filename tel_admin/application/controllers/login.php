<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct()
    {
        
        parent::__construct();
		$this->load->helper(array('url','form','html'));
		//$this->load->library('session'); 
		
		
		//$this->load->database();
	
		
    }
	public function log_in()
	{
		/*$sess_data = array(
					'username' => 'cdso',
					'user_type' => 'admin',
					'usr_appt' => 'cdso',
					'logged_in' => TRUE
					);
		$this->session->set_userdata($sess_data);
		redirect('/home','refresh');
		*/
		
		
		if($this->input->post('submit'))
		{
			$this->login_validate();			
		}
		elseif($this->input->post('register'))
		{
			$this->load->view('register_view');
		}
		else
		{
			$this->load->view('login_view');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/home','refresh');
	}
	function login_validate()
	{
		
		$this->load->model('fetch_model');
		  // authenticate
		  $login_name = $this->input->post('username');
		  $login_pwd = $this->input->post('password');
	
		
		  // read user's credentials from db, through fetch Model
		  $data = $this->fetch_model->get_user($login_name);
		  //var_dump($data);
			//print_r($data);
			//echo $data[0]['user_unit'];
			$uname = $data[0]->usr_name;
			$pwd = $data[0]->passwd;
			$invogue = $data[0]->invogue;
		  
		  if (  $login_name === $uname   &&  $login_pwd === $pwd && $invogue == TRUE)  {
				$this->session->set_userdata('username', $uname);
				$this->session->set_userdata('user_type', $data[0]->usr_type);
				$this->session->set_userdata('usr_appt', $data[0]->usr_appt );
				$this->session->set_userdata('logged_in', TRUE);
				//echo 'login success<br>' ;
				//echo $this->session->userdata('user_name');
				//echo $this->session->userdata('user_type');
				//echo $this->session->userdata('user_unit');
				//echo $this->session->userdata('login_state');
				//$this->session->sess_destroy();
				//echo $this->session->userdata('user_name');
				redirect('/home','refresh');
		  } else {
			redirect('login/log_in','refresh');    // redirect back to login page
		
			
		  }
	}
	function register()
	{
		//$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('insert_model');
		$this->load->model('fetch_model');
		if($this->input->post('register'))
		{
			$this->form_validation->set_rules('uname', 'User Name', 'required');
			$this->form_validation->set_rules('passwd', 'Pass Word', 'required');
			$this->form_validation->set_rules('fname', 'Full Name', 'required');
			$this->form_validation->set_rules('unit', 'Unit', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				//echo " pl submit again....." ;
				$data['units'] = $this->fetch_model->fetch_unit();
				$this->load->view('register_view',$data);
			}
			else 
			{
				
					$this->insert_model->register();
					redirect('stat/show_users','refresh');
				
			}
			
			
		}
		else
			{
				$data['units'] = $this->fetch_model->fetch_unit();
				$this->load->view('register_view',$data);
			}
	}
}
?>
