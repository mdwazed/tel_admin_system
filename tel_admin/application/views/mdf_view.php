<div id="bodycontainer">
<h4>Req awaiting for connection</h4>
<?php
//print_r($pending);
	if(count($pending)>'o')
	{
		
		echo form_open('admin_panel/connect');
		$this->table->set_heading('Ba No', 'Rank', 'Name','Unit','Tel No','Connect');
		//$tel_no = array();
		foreach($pending as $row)
		{
			$data = array(
					'name' => $row->id,
					'value' => $row->tel_no,
					'checked' => FALSE
					);
			$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit, $row->tel_no, form_checkbox($data));
			/*echo $row->id ;
			echo $row->ba_no ;
			echo $row->rank ;
			echo $row->name ;
			echo $row->unit ;
			echo $row->tel_no ;
			$data = array(
					'name' => $row->id,
					'value' => $row->tel_no,
					'checked' => FALSE
					);
			echo form_checkbox($data);*/
			//echo form_checkbox($row->id,TRUE, FALSE);
			//echo form_hidden('tel_no',$row->tel_no);
			
		}
		echo $this->table->generate();
		echo form_submit('connect','Save');
		echo form_close();
	}
	else
	{
		echo 'No Pending request';
	}

?>

</div>

