<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>
<div id="bodycontainer">
<h4>Submit Casual Conn Req Here </h4>
	<?php 
		echo validation_errors();
		
		
		
		
		$options_loc = array(
				'' => 'Select Loc',
			
				'majhira' => 'Majhira',
				'jbad' => 'Jahangirabad',
				'qbad' => 'Quadirabad',
				'raj' => 'Rajshahi',				
				);
		echo form_open('admin_panel/add_unit');
			echo form_label('Unit :', 'unit');
				echo form_input('unit','');
			
			echo form_label('Unit Loc :', 'unit_loc');
				echo form_dropdown('unit_loc',$options_loc,'majhira');
			
			echo form_submit('submit','Submit Request');
		echo form_close();
	?>

</div>

<?php $this->view('incl/footer'); ?>