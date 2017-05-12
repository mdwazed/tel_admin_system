<?php 
$this->view('incl/header');
$this->view('incl/leftbar');
$this->view('incl/adminbar');
$this->view('incl/login');
$this->view('incl/hmenu');
?>
<div id="bodycontainer">
<h4>Tel Complain </h4>
	<?php 
	
		if(count($complain)>'o')
				{
					
					
					echo '<table>' ; 
					echo '<thead><th>Tel No </th><th>Complain</th><th>Solved</th></thead>' ;
						foreach($complain as $row)
						{
							
							echo '<tr><td>' ;
								echo $row->tel_no ;
							echo '</td><td>' ;
								echo $row->complain ;
							echo '</td><td>' ;
								echo anchor('/complain/complain_solved/'.$row->id,'Solved') ;
							
						}
					echo '</table>' ;
				}
				else
				{
					echo 'No Pending complain';
				}
		
	?>

</div>

<?php $this->view('incl/footer'); ?>