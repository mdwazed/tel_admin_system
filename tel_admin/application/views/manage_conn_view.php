<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
?>


<div id="bodycontainer">
<h4>Manage Connection</h4><br/>
<?php 

//var_dump($iteam);
//var_dump($type);
	
	
	echo form_open('/manage_conn/update_conn');
	
	
	$options_unit = array('select unit'=>'Select Unit');	
			foreach($units as $row)
			{
				$options_unit[$row->unit] =  $row->unit ;
			}
	
	
	
	echo form_label('Ba No:', 'ba_no');
		echo form_input('ba_no',$iteam[0]->ba_no);
	echo form_label('Rank:', 'rank');
		echo form_input('rank',$iteam[0]->rank);
	echo form_label('Name:', 'name');
		echo form_input('name',$iteam[0]->name);
	echo form_label('Unit:', 'unit');
		echo form_dropdown('unit',$options_unit,$iteam[0]->unit);
	echo form_label('Appt:', 'appt');
		echo form_input('appt',$iteam[0]->appt);
	echo form_label('Tel No:', 'tel_no');
		echo form_input('tel_no',$iteam[0]->tel_no);
		
	if($type == 'perm')
	{
	echo form_label('Loc:', 'loc');
		echo form_input('loc',$iteam[0]->new_loc);
	}
	else if($type == 'casual')
	{
	echo form_label('Loc:', 'loc');
		echo form_input('loc',$iteam[0]->loc);
	}
	
	echo form_label('Recom Auth:', 'recom_auth');
		echo form_input('recom_auth',$iteam[0]->recom_auth);
	echo form_label('Recom:', 'recom');
		echo form_input('recom',$iteam[0]->recom);
	echo form_label('Approval Auth:', 'app_auth');
		echo form_input('app_auth',$iteam[0]->app_auth);
	echo form_label('Approved:', 'app');
		echo form_input('app',$iteam[0]->app);
	echo form_label('Approval CDSO:', 'app_cdso');
		echo form_input('app_cdso',$iteam[0]->app_cdso);
	
	
	
	if($type == 'perm')
	{
		echo form_label('Connected:', 'connected');
			echo form_input('connected',$iteam[0]->connected);
	}
	else if($type == 'casual')
	{
		echo form_label('Connected:', 'connected');
			echo form_input('connected',$iteam[0]->conn);
	}
	echo form_label('In Use:', 'inuse');
		echo form_input('inuse',$iteam[0]->inuse);
	
	echo form_hidden('id',$iteam[0]->id);
	echo form_hidden('type',$type);
	
		echo form_submit('update','Update');
		echo form_submit('print_record','Print Record');
		//echo form_submit('delete_record','Delete');
		echo anchor('admin_panel/connect','Back To Previous Page');
		

?>
</div>
<?php $this->view('incl/footer'); ?>
