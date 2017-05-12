<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>


<div id="bodycontainer">
<h4>Assign No To Casual Req</h4>
<?php 
	//print_r($to_conn_data);
	echo form_open('admin_panel/connect');
	echo form_label('Assign Tel no for '.$to_conn_data[0]->rank.'  '.$to_conn_data[0]->name.'  ','tel_no');
	echo form_input('tel_no');
	echo form_hidden('id',$to_conn_data[0]->id);
	echo form_submit('connect_casual','Save');
	echo form_close();
	
?>

</div>
<?php $this->view('incl/footer'); ?>