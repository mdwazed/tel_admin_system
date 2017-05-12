<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>New user registration</title>
<style>
	p{margin-left:350px;}
	label{background-color:#3333FF; color:#FFFFFF;}
</style>
</head>

<body>
	
	<h2 align="center" style="background-color:#99FFCC">New User Registration </h2>
	<?php echo validation_errors(); ?>
	
		<?php
		
		$options_unit = array(''=>'Select Unit');	
			foreach($units as $row)
			{
				$options_unit[$row->unit] =  $row->unit ;
			}
	
	
	

				
	?>
	
	<?php echo form_open('login/register'); ?>
	
	<p><label for = "uname" /> User Name </label>
	<input type="text" name="uname" id="uname" value=""/>
	<font color="#FF0000"></font></p>
	<p><label for = "passwd" /> Pass Word </label>
	<input type="text" name="passwd" id="passwd" value=""/></p>
	<p><label for = "fname" /> Full Name </label>
	<input type="text" name="fname" id="fname" value=""/></p>
	<p><label for = "unit" /> Unit </label>
	
	<?php echo form_dropdown('unit',$options_unit); ?>
	<p><label for = "usr_appt" /> Appt </label>
	<?php echo form_input('usr_appt',''); ?>
	<p><label for = "invogue" /> Invogue </label>
	<?php echo form_input('invogue',TRUE); ?>
	<p><input type="submit" value="Register" name="register" /></p>
	<?php echo form_close(); ?>
	
	<h2 align="center" style="background-color:#99FFCC">Tel Admin System</h2>
	
	
</body>
</html>
