<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>


<div id="bodycontainer">
<h4>Showing reallocation/shift req awaiting for recommandation</h4>
<?php
//print_r($pending);
	if(count($pending)>'o')
	{
		
		echo form_open('admin_panel/pending_req');
		$this->table->set_heading('Ba No', 'Rank', 'Name','Unit','tel No','Recom','Reject');
		
		//$selected[];
		foreach($pending as $row)
		{
			
			$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit, $row->tel_no, form_checkbox($row->id,TRUE, FALSE),anchor('/admin_panel/reject_perm/'.$row->id, 'Reject'));
			/*echo $row->id ;
			echo $row->ba_no ;
			echo $row->rank ;
			echo $row->name ;
			echo $row->unit ;
			echo $row->tel_no ;
			echo form_checkbox($row->id,TRUE, FALSE);*/
				
		}
		
		echo $this->table->generate(); 
		echo form_submit('recom','Save');
		echo form_close();
	}
	else
	{
		echo 'No Pending request';
	}

?>

</div>

