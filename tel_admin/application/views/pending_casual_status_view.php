


<div id="bodycontainer">
<h4>Showing pending casual request</h4>

	
		
		<?php
				//print_r($pending);
				if(count($pending)>'o')
				{
					
					
					echo '<table>' ; 
					echo '<thead><th>Ba No </th><th>Rank</th><th>Name</th><th>Unit</th><th>Recom Auth</th><th>Recom</th><th>Approve Auth</th><th>Approved</th></thead>' ;
						foreach($pending as $row)
						{
							
							echo '<tr><td>' ;
								echo $row->ba_no ;
							echo '</td><td>' ;
								echo $row->rank ;
							echo '</td><td>' ;
								echo $row->name ;
							echo '</td><td>' ;
								echo $row->unit ;
							echo '</td><td>' ;
								echo $row->recom_auth ;
							echo '</td><td>' ;
								echo $row->recom ? 'Yes' : 'No' ;
							echo '</td><td>' ;
								echo $row->app_auth ;
							echo '</td><td>' ;
								echo $row->app ? 'Yes' : 'No';	
							echo '</td><td>';
				
							if($login_status['usr_appt']== 'cdso')
							{
								echo anchor('manage_conn/del_pending_casual/'.$row->id,'Delete');
							}
											
							echo '</td></tr>' ;
						}
					echo '</table>' ;
				}
				else
				{
					echo 'No Pending request';
				}
		
		?>

</div>
<?php $this->view('incl/footer'); ?>