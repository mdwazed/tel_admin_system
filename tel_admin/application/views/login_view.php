<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>
<style>
	body
		{
		background-image:url(../../images/11div_less.jpg); background-repeat:no-repeat; background-position:center top;
		background-color:#FFFFFF; 
		
		} 
	table
		{
		margin-top:100px;
		
		}
</style>
</head>

<body>
	<table  align="center">
		<tr height="100px"></tr>
		<tr><td bgcolor="#99CCFF">
			<fieldset style="margin-right:10px;"><legend>Log In </legend>
	
				<form action="log_in" method="post">
					<p>Username: <input type="text" name="username" value="" /></p>
					<p>Password: <input type="password" name="password" value="" /></p>
					<p><input type="submit" name="submit" value="Login"  />
			<!--		<input type="submit" name="register" value="New User"  />--></p>
				</form>
			</fieldset>
		</td></tr>
	</table>

	
</body>
</html>
