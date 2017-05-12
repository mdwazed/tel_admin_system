
<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>
<?php 
	
	//var_dump($details);
	echo '<div><br/>';
	echo form_open('stat/disconn_casual');
	//echo $details[0]->id.'<br/>';
	echo 'Rank:  '.$details[0]->rank.'<br/>';
	echo 'Name:  '.$details[0]->name.'<br/>';
	echo 'Unit: '.$details[0]->unit.'<br/>';
	echo 'Tel No: '.$details[0]->tel_no.'<br/>';
	echo form_hidden('id',$details[0]->id);
	echo form_submit('do_disconn','Disconnect!');
	echo form_close();
	echo '<div>';

?>
