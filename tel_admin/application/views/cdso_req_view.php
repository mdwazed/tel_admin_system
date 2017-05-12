<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>


<div id="bodycontainer">
<h4>Req awaiting for CDSO's Approval</h4>
<?php
//print_r($pending);
	if(count($pending)>'o')
	{
		
		echo form_open('admin_panel/connect');
		$this->table->set_heading('Ba No', 'Rank', 'Name','Unit','Tel No','Recom By','App By','App','reject');
		//$selected[];
		foreach($pending as $row)
		{
			$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit,$row->tel_no,$row->recom_auth, $row->app_auth ,form_checkbox($row->id,TRUE, FALSE),anchor('/admin_panel/reject_perm/'.$row->id, 'Reject'));
			/*echo $row->id ;
			echo $row->ba_no ;
			echo $row->rank ;
			echo $row->name ;
			echo $row->unit ;
			echo $row->tel_no ;
			echo form_checkbox($row->id,TRUE, FALSE);*/
				
		}
		echo $this->table->generate();
		echo form_submit('app','Save');
		echo form_close();
	}
	else
	{
		echo 'No Pending request';
	}

?>

</div>

