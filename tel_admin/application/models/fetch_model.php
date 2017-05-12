<?php 

class fetch_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }

	function fetch_data($tel_no)
	{	
		
		$qry = $this->db->get_where('tbl_main',array('tel_no'=> $tel_no));
		
		return $qry->result();
		
		
	}
	function fetch_all_perm()
	{	
		//$qry = $this->db->get_where('tbl_main', array('connected' => TRUE));
		$qry = $this->db->query('SELECT * FROM tbl_main WHERE connected = TRUE ORDER BY unit, tel_no');
		return $qry->result();		
	}
	function fetch_all_perm_inuse() //for counting in use no of conn
	{	
		$qry = $this->db->get_where('tbl_main', array('connected' => TRUE, 'inuse'=>TRUE));
		return $qry->result();		
	}
	function fetch_all_casual()
	{	
		//$qry = $this->db->get_where('tbl_casual', array('conn' => TRUE));
		$qry = $this->db->query('SELECT * FROM tbl_casual WHERE conn = TRUE ORDER BY tel_no');
		return $qry->result();		
	}
	function fetch_recom_pending_data($recom_auth)
	{
		$qry = $this->db->get_where('tbl_main',array('recom_auth'=>$recom_auth, 'recom'=>FALSE));
		return $qry->result();
	}
	function fetch_casual_recom_pending_data($recom_auth)
	{
		$qry = $this->db->get_where('tbl_casual',array('recom_auth'=>$recom_auth, 'recom'=>FALSE));
		return $qry->result();
	}
	function fetch_app_pending_data($app_auth)
	{
		$qry = $this->db->get_where('tbl_main',array('app_auth'=>$app_auth, 'recom' => TRUE,'app'=>FALSE));
		return $qry->result();
	}
	function fetch_app_casual_pending_data($app_auth)
	{
		$qry = $this->db->get_where('tbl_casual',array('app_auth'=>$app_auth, 'recom' => TRUE,'app'=>FALSE));
		return $qry->result();
	}
	function fetch_cdso_pending_data()
	{
		$qry = $this->db->get_where('tbl_main',array('recom' => TRUE,'app'=>TRUE, 'app_cdso' => FALSE));
		return $qry->result();
	}
	function fetch_cdso_casual_pending_data()
	{
		$qry = $this->db->get_where('tbl_casual',array('recom' => TRUE,'app'=>TRUE, 'app_cdso' => FALSE));
		return $qry->result();
	}
	function fetch_mdf_pending_data()
	{
		$qry = $this->db->get_where('tbl_main',array('recom' => TRUE,'app'=>TRUE, 'app_cdso' => TRUE, 'connected' => FALSE));
		return $qry->result();
	}
	
	function fetch_mdf_casual_pending_data()
	{
		$qry = $this->db->get_where('tbl_casual',array('recom' => TRUE,'app'=>TRUE, 'app_cdso' => TRUE, 'conn' => FALSE));
		return $qry->result();
	}
	function get_casual_data($id)
	{	
		$qry = $this->db->get_where('tbl_casual',array('id'=> $id));
		return $qry->result();	
	}
	function get_perm_data($id)
	{	
		$qry = $this->db->get_where('tbl_main',array('id'=> $id));
		return $qry->result();	
	}
	function fetch_casual_data($tel_no)
	{	
		
		$qry = $this->db->get_where('tbl_casual',array('tel_no'=> $tel_no));
		return $qry->result();	
	}
	function fetch_pending_status()
	{
		$qry = $this->db->get_where('tbl_main',array('connected' => FALSE));
		return $qry->result();
	}
	function fetch_casual_pending_status()
	{
		$qry = $this->db->get_where('tbl_casual',array('conn' => FALSE));
		return $qry->result();
	}
	function fetch_tel_dir()
	{
		$qry =	$this->db->query('SELECT  ba_no, rank, name, unit, appt, tel_no, new_loc AS loc FROM tbl_main WHERE connected = TRUE AND inuse = TRUE UNION SELECT  ba_no, rank, name, unit,appt, tel_no, loc FROM tbl_casual WHERE conn = TRUE ');
		return $qry->result();
	}
	function fetch_tel_dir_name($name)
	{
		//$this->db->like('name', $name);
		$qry =	$this->db->query("SELECT ba_no, rank, name, unit, appt, tel_no, new_loc AS loc FROM tbl_main WHERE connected = TRUE AND inuse = TRUE AND name LIKE '%".$name."%' UNION SELECT ba_no, rank, name, unit,appt, tel_no, loc FROM tbl_casual WHERE conn = TRUE AND name LIKE '%".$name."%'");
		
		return $qry->result();
		
	}
	
	function fetch_tel_dir_unit($unit)
	{
		//$this->db->like('name', $name);
		$qry =	$this->db->query("SELECT ba_no, rank, name, unit, appt, tel_no, new_loc AS loc FROM tbl_main WHERE connected = TRUE AND inuse = TRUE AND unit LIKE '%".$unit."%' UNION SELECT ba_no, rank, name, unit,appt, tel_no, loc FROM tbl_casual WHERE conn = TRUE AND unit LIKE '%".$unit."%'");
		
		return $qry->result();
		
	}
	
	function fetch_tel_dir_name_unit($data)
	{
		//$this->db->like('name', $name);
		$qry =	$this->db->query("SELECT ba_no, rank, name, unit, appt, tel_no, new_loc AS loc FROM tbl_main WHERE connected = TRUE AND unit LIKE '%".$data['unit']."%' AND name LIKE '%".$data['name']."%' UNION SELECT ba_no, rank, name, unit,appt, tel_no, loc FROM tbl_casual WHERE conn = TRUE AND unit LIKE '%".$data['unit']."%' AND name LIKE '%".$data['name']."%'");
		
		return $qry->result();
		
	}
	function fetch_tel_dir_name_option()
	{
		$qry =	$this->db->query('SELECT DISTINCT name FROM tbl_main WHERE connected = TRUE UNION SELECT DISTINCT name FROM tbl_casual WHERE conn = TRUE ');
		return $qry->result();
	}
	function fetch_tel_dir_unit_option()
	{
		$qry =	$this->db->query('SELECT DISTINCT unit FROM tbl_main WHERE connected = TRUE UNION SELECT DISTINCT  unit FROM tbl_casual WHERE conn = TRUE ');
		return $qry->result();
	}
	public function get_user($login_name)
	{
		$qry = $this->db->get_where('usr',array('usr_name'=> $login_name));
		return $qry->result();	
	}
	
	function fetch_complain()
	{
		$qry = $this->db->get('tbl_complain');
		return $qry->result();
	}
	
	function fetch_users()
	{
		$qry = $this->db->get('usr');
		return $qry->result();
	}
	function fetch_appt()
	{
		$qry = $this->db->query('SELECT usr_appt FROM usr ORDER BY usr_appt ASC');
		return $qry->result();
	}
	function fetch_unit()
	{
		$qry = $this->db->query('SELECT unit FROM tbl_unit ORDER BY unit ASC');
		return $qry->result();
	}
}

?>