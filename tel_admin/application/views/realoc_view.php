<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>


<div id="bodycontainer">
<h4>Submit realloc/shift req here</h4><br/>

	<div style= "display:block;">
		<?php echo validation_errors(); ?>
	</div>
<?php 
	$options_unit = array(''=>'Select Unit');	
			foreach($units as $row)
			{
				$options_unit[$row->unit] =  $row->unit ;
			}
	
	
	echo form_open('realoc/realoc_form');
	echo form_label('Ba No:', 'ba_no');
		echo form_input('ba_no','');
	echo form_label('Rank:', 'rank');
		echo form_input('rank','');
	echo form_label('Name:*', 'name');
		echo form_input('name','');
	echo form_label('Unit:*', 'unit');
		echo form_dropdown('unit',$options_unit,'select');
	echo form_label('Appt:', 'appt');
		echo form_input('appt','');
	echo form_label('Tel No:*', 'tel_no');
		echo form_input('tel_no','');
	
		echo form_submit('submit','Create Form');



?>

</div>
<?php $this->view('incl/footer'); ?>