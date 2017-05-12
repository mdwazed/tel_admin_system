<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');

?>
<div id="bodycontainer">
<h4>Submit Tel Complain Here </h4>
	<?php 
		echo validation_errors();
		
		echo form_open('complain/submit_complain');
			echo form_label('Tel No :', 'tel_no');
				echo form_input('tel_no','');
			echo form_label('Complain :', 'complain');
				echo form_textarea('complain','');
			
			echo form_submit('submit','Submit Complain');
		echo form_close();
	?>

</div>

<?php $this->view('incl/footer'); ?>
