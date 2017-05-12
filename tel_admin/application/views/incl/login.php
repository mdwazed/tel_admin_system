<div style="float:right; color:#959595; padding-right:30px; width:auto;">
<?php 
	if($login_status == FALSE)
	{
		echo anchor('login/log_in','<h3>Log In</h3>'); 
	}
	else
	{
		echo '<h3>You are loged in as '. $login_status['username'].'    ' ;
		echo anchor('login/logout','Log Out');
		echo '</h3>'; 
	}
?>
</div>
