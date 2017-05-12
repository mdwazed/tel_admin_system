<?php 

class login_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
	public function get_logged_data()
	{
		if($this->session->userdata('logged_in'))
		{
			$login_status = array(
									'username' => $this->session->userdata('username'),
									'user_type' => $this->session->userdata('user_type'),
									'usr_appt' => $this->session->userdata('usr_appt')
									);
		}
		else
		{
			$login_status = FALSE ;
		}	
		return $login_status;
	}
}
?>