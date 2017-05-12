<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>


<div id="bodycontainer">
<h4>This page is not intended for gen users</h4>
<?php
		
		/*echo form_open('');
			echo form_label('Ba No', 'ba_no');
				echo form_input('ba_no','');
			echo form_label('Rank', 'rank');
				echo form_input('rank','');
			echo form_label('Name', 'name');
				echo form_input('name','');
			echo form_label('Unit', 'unit');
				echo form_input('unit','');
			echo form_label('Appt', 'appt');
				echo form_input('appt','');
			echo form_label('Reason', 'reason');
				echo form_input('reason','');
			echo form_label('Duration', 'duration');
				echo form_input('duration','');
			echo form_label('Loc', 'loc');
				echo form_input('loc','');
			echo form_label('Auth Govt Qtr', 'auth_govt_qtr');
				echo form_input('auth_govt_qtr','');
			echo form_label('Auth Tel Conn', 'auth_tel_conn');
				echo form_input('auth_tel_conn','');
			echo form_label('Recom_auth', 'recom_auth');
				echo form_dropdown('recom_auth',$options,'select');
			echo form_label('App Auth', 'app_auth');
				echo form_dropdown('app_auth',$options,'gso1_div_hq');
			
			echo form_submit('submit','Submit Request');
		echo form_close();*/

?>

</div>
<?php $this->view('incl/footer'); ?>