<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>
<?php 
	echo '<div><br/>';
	echo form_open('stat/disconn_casual');
	echo form_label('Tel No to be Disconnected','tel_no');
	echo form_input('tel_no','');
	echo form_submit('search','Search');
	echo form_close();
	echo '</div>';

?>
