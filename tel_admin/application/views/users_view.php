<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>


<div id="bodycontainer">
<h4>Showing All Users</h4><br/>
<?php
//print_r($pending);
	if(count($users)>'o')
	{
		echo '<table>' ;
		echo '<thead><th>Id </th><th>User Name </th><th>Passwd</th><th>full Name</th><th>Unit</th><th>Appt</th><th>Invogue</th><th>Delete</th></thead>' ;
		
		
			foreach($users as $row)
			{
				echo '<tr><td>' ;
					echo $row->id ;
				echo '</td><td>' ;
					echo $row->usr_name ;
				echo '</td><td>' ;
					echo 'Hidden' ;
				echo '</td><td>' ;
					echo $row->full_name ;
				echo '</td><td>' ;
					echo $row->unit ;
				echo '</td><td>' ;
					echo $row->usr_appt ;
				echo '</td><td>' ;
					echo $row->invogue ? 'Yes' : 'No' ;
				echo '</td><td>' ;
					echo anchor('admin_panel/admin_user/'.$row->id, 'Delete') ;
			
				echo '</td><tr>' ;				
			}
		echo '</table>' ;
	}
	else
	{
		echo 'No Pending request';
	}

?>

</div>