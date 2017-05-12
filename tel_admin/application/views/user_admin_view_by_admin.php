<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>


<div id="bodycontainer">


	<h2 align="center" style="background-color:#99FFCC">User Administration </h2>
	<?php echo validation_errors(); ?>
	
		<?php
	
	$unit_options = array(
							""=>'Please select Unit',						
							'Area HQ, Bogra'=>'Area HQ, Bogra',
							'HQ 11 Inf Div'=>'HQ 11 Inf Div',
							'HQ 93 Armd Bde'=>'HQ 93 Armd Bde',
							'HQ 11 Arty Bde'=>'HQ 11 Arty Bde',
							'HQ 26 Inf Bde'=>'HQ 26 Inf Bde',
							'HQ 111 Inf Bde'=>'HQ 111 Inf Bde',
							'Bengal Cav'=>'Bengal Cav',
							'6 Engr Bn'=>'6 Engr Bn',
							'1 Sig Bn'=>'1 Sig Bn',
							'34 ST Bn'=>'34 ST Bn',
							'21 Fd Amb'=>'21 Fd Amb',
							'25 Fd Amb'=>'25 Fd Amb',
							'506 DOC'=> '506 DOC',
							'129 Fd Wksp, EME'=>'129 Fd Wksp, EME',
							'135 Fd Wksp, EME'=>'135 Fd Wksp, EME',
							'5 MP Unit'=>'5 MP Unit',
							'593 FIU'=>'593 FIU',
							'Sta HQ, Bogra'=>'Sta HQ, Bogra',
							'Sta HQ, Rajshahi'=>'Sta HQ, Rajshahi',
							'Sta HQ, Qadirabad'=>'Sta HQ, Qadirabad',
							'ACC&S'=>'ACC&S',
							'ECSME, Quadirabad'=>'ECSME, Quadirabad',
							'BIRC, Rajshahi'=>'BIRC, Rajshahi',
							'NCO’A'=>'NCO’A',
							'Static Sig Coy, Bogra'=>'Static Sig Coy, Bogra',
							'Ordep, Bogra'=>'Ordep, Bogra',
							'2 Fd Regt Arty'=>'2 Fd Regt Arty',
							'11 SP Regt Arty'=>'2 Fd Regt Arty',
							'19 Med Regt Arty'=>'19 Med Regt Arty',
							'27 Fd Regt Arty'=>'27 Fd Regt Arty',
							'29 Div Loc Bty Arty'=>'29 Div Loc Bty Arty',
							'15 E Bengal'=>'15 E Bengal',
							'17 E Bengal'=>'17 E Bengal',
							'1 BIR'=>'1 BIR',
							'10 BIR'=>'10 BIR',
							'11 BIR'=>'11 BIR',
							'26 BIR'=>'26 BIR',
							'CMES (Army), Bogra'=>'CMES (Army), Bogra',
							'SSD, Bogra'=>'SSD, Bogra',
							'SSD, Rajshahi'=>'SSD, Rajshahi',
							'SSD, Qadirabad'=>'SSD, Qadirabad',
							'CMH, Bogra'=>'CMH, Bogra',
							'CMH, Rajshahi'=>'CMH, Rajshahi',
							'CMH, Qadirabad'=>'CMH, Qadirabad',
							'Mil Farm Ishwardi'=>'Mil Farm Ishwardi',
							'Det ASU, Bogra'=>'Det ASU, Bogra',
							'Det ASU, Rajshahi'=>'Det ASU, Rajshahi',
							'Det DGFI, Bogra'=>'Det DGFI, Bogra',
							'Det DGFI, Rajshahi'=>'Det DGFI, Rajshahi',
							'BRU, Bogra'=>'BRU, Bogra',
							'GE (Army) Bogra'=>'GE (Army) Bogra',
							);
	

	
		$options = array(
				'' => 'Select Appt',
				'comd_26bde' => 'Comd 26 bde',
				'comd_111bde' => 'Comd 111 bde',
				'comd_93bde' => 'Comd 93 Armd bde',
				'comd_11bde' => 'Comd 11 Arty bde',
				'comd_ncoa' => 'Comd NCO Academy',
				'div_hq' => 'Div HQ',
				'area_hq' => 'Area HQ',
				'cdso' => 'CDSO',				
				);
				
	?>
	
	<?php echo form_open('/admin_panel/admin_user'); ?>
	
	<p><label for = "uname" /> User Name </label>
	<input type="text" name="uname" id="uname" value="<?php echo $usr_info[0]->usr_name ; ?>"/>
	<font color="#FF0000"></font></p>
	
	<p><label for = "fname" /> Full Name </label>
	<input type="text" name="fname" id="fname" value="<?php echo $usr_info[0]->full_name ; ?>"/></p>
	<p><label for = "unit" /> Unit </label>
	
	<?php echo form_dropdown('unit',$unit_options,$usr_info[0]->unit); ?>
	</p>
	<?php //echo form_dropdown('usr_appt',$options,$usr_info[0]->usr_appt); ?>
	<input type="hidden" name="id" id="id" value="<?php echo $usr_info[0]->id ; ?>"/></p>
	<p><input type="submit" value="Save" name="save" /></p>
	<?php echo form_close(); ?>
	
	




</div>


<?php $this->view('incl/footer'); ?>