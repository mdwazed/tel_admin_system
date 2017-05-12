<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>


<div id="bodycontainer">
<h4>Showing All Connection</h4>
<?php
//print_r($pending);
	if(count($all_data)>'o')
	{
		echo 'Total Connection '.count($all_data);
		echo '&nbsp  &nbsp  &nbsp  &nbsp';
		echo 'Total Inuse '.count($inuse_data);
		 
		$this->table->set_heading('Ba No', 'Rank', 'Name','Unit','Appt','Tel No','Details','In Use');
		foreach($all_data as $row)
		{
			if($type == 'perm')
			{
				$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit, $row->appt, $row->tel_no,anchor('manage_conn/manage_perm/'.$row->id,'Details'),$row->inuse);
			}
			else if($type == 'casual')
			{
				$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit, $row->appt, $row->tel_no,anchor('manage_conn/manage_casual/'.$row->id,'Details'));
			}
		
			
				
		}
		echo $this->table->generate();
		//echo form_submit('app','Save');
		//echo form_close();
	}
	else
	{
		echo 'No such connection';
	}

?>

</div>