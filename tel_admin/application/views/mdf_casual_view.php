<div id="bodycontainer">
<h4>Casual Req awaiting for connection</h4>
<?php
//print_r($pending);
	if(count($pending)>'o')
	{
		
		echo form_open('');
		//$tel_no = array();
		$this->table->set_heading('Ba No', 'Rank', 'Name','Unit');
		$atts = array(
              'width'      => '600',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
		foreach($pending as $row)
		{
			$this->table->add_row($row->ba_no, $row->rank, $row->name, $row->unit, anchor('admin_panel/conn_cfm/'.$row->id,'Connect',$atts));
			/*echo $row->id ;
			echo $row->ba_no ;
			echo $row->rank ;
			echo $row->name ;
			echo $row->unit ;
			echo anchor('admin_panel/conn_cfm/'.$row->id,'Connect',$atts);*/
		}
		echo $this->table->generate();
		//echo form_submit('connect_casual','Save');
		echo form_close();
	}
	else
	{
		echo 'No Pending request';
	}

?>

</div>

<?php $this->view('incl/footer'); ?>