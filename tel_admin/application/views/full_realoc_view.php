<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>
<div id="bodycontainer">
<h4>Fill up the form below to complete the req </h4>
	<div style="background-color:#CCFFFF;">
	<?php echo validation_errors(); ?>
	<h4>Previous Users Info</h4>
<?php 

	
	echo validation_errors();
		 	
			echo '<pre>Ba No:'.$pre_data[0]->ba_no.'</pre>';
			echo '<pre>Rank:'.$pre_data[0]->rank.'</pre>';
			echo '<pre>Name:'.$pre_data[0]->name.'</pre>';
			echo '<pre>Unit:'.$pre_data[0]->unit.'</pre>';
			echo '<pre>Appt:'.$pre_data[0]->appt.'</pre>';
			
			echo '<h4>Present Users Info</h4>' ;
			echo '<pre>Ba No: '.$ba_no.'</pre>' ;
			echo '<pre>Rank: '.$rank.'</pre>' ;
			echo '<pre>Name: '.$name.'</pre>';
			echo '<pre>Unit: '.$unit.'</pre>';
			echo '<pre>Appt: '.$appt.'</pre>';
			echo '<pre>Tel No: '.$tel_no.'</pre>';
			
		echo '</div>' ;
	
	$options_appt = array(''=>'Select Recom Auth');	
			foreach($appts as $row)
			{
				$options_appt[$row->usr_appt] =  $row->usr_appt ;
			}
	
	$options_app = array(
				'area_hq' => 'Area HQ',
				'cdso' => 'CDSO',				
				);
	
		echo form_open('realoc/save_realoc_form');
		echo form_label('New Loc:*', 'new_loc');
			echo form_input('new_loc','');
		echo form_label('Date Reqr By:', 'dt_reqr_by');
			echo form_input('dt_reqr-by','');
		echo form_label('Bill Off:', 'bill_off');
			echo form_input('bill_off','');
		echo form_label('Bill Pte:', 'bill_pte');
			echo form_input('bill_pte','');
		echo form_label('Reason:', 'reason');
			echo form_input('reason','');
		echo form_label('Recom Auth:*', 'recom_auth');
			echo form_dropdown('recom_auth',$options_appt,'Select Recom Auth');
		echo form_label('App Auth:*', 'app_auth');
			echo form_dropdown('app_auth',$options_app,'Area HQ');
		$data = array(
				'ba_no' => $ba_no,
				'rank' => $rank,
				'name' => $name,
				'unit' => $unit,
				'appt' => $appt,
				'tel_no' => $tel_no,
				'pre_ba_no' => $pre_data[0]->ba_no,
				'pre_rank' => $pre_data[0]->rank,
				'pre_name' => $pre_data[0]->name,
				'pre_unit' => $pre_data[0]->unit,
				'pre_appt' => $pre_data[0]->appt
				);
		echo form_hidden($data);
		echo form_submit('save','Submit Req');



?>