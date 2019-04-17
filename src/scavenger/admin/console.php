
<!-- todo: implement real session management -->
<?PHP
	$valid = "S2V5IDE5ID0gOWUzY2ZjNDhlY2NmODFhMGQ1NzY2M2UxMjlhZWYzY2I=";
	$session = $_COOKIE['admincookie']!='' ? $_COOKIE['admincookie'] : 'none';

	if($session != $valid) {
		echo("Not logged in!");
	}else{
?>

<h2>Add User</h2>
<form enctype="multipart/form-data" method="post" action="/index.php">
	<table cellspacing="5" cellpadding="5" border="0">
		<tr>
			<td valign="top">
				<strong>Name:</strong>
			</td>
			<td valign="top">
				<input type="text" name="name" id="name" size="40" value="" />
				
			</td>
		</tr>
		<tr>
			<td valign="top">
				<strong>Username:</strong>
			</td>
			<td valign="top">
				<input type="text" name="username" id="username" size="40" value="" />
				
			</td>
		</tr>
		<tr>
			<td valign="top">
				<strong>Password</strong>
			</td>
			<td valign="top">
				<input type="password" name="password" id="password" size="40" value="" />
				
			</td>
		</tr>
		<tr>
			<td valign="top">
				<strong>Role</strong>
			</td>
			<td valign="top">
				<input type="radio" name="role" id="role_0" value="Admin" /> Admin<br/>
				<input type="radio" name="role" id="role_1" value="Partner" /> Partner<br/>
				<input type="radio" name="role" id="role_2" value="Everyday User" /> Everyday User<br/>
				
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value=" Submit Form " />
			</td>
		</tr>
	</table>
</form>


<?PHP
}
?>
