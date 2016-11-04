<div class="page-title"><h2>Create an account</h2></div>
<?php
echo "<form method=\"POST\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
// Grab inputs
$username = $_REQUEST["user_name"];
$password = $_REQUEST["password"];
$passwordconfirm = $_REQUEST["password_confirm"];
$mysignature = $_REQUEST["my_signature"];

if ($username  =="") {?>
	<p>Please choose the username, password and signature you wish to use:</p>
	<p>User Name:<br><input type="text" name="user_name" size="20"></p>
	<p>Password:<br><input type="password" name="password" size="20"></p>
	<p>Password Confirm:<br><input type="password" name="password_confirm" size="20"></p>
	<p>Signature:<br><textarea rows="10" cols="50" name="my_signature" size="20"></textarea></p>
	<p><input type="submit" value="Submit" name="Submit_button"></p>
</form>
<?php } ?>	
<?php
if ($username <>"") {
	if ($password == $passwordconfirm ) {
		$query = "INSERT INTO accounts (username, password, mysignature) VALUES
			('" . $username ."', '" . $password . "', '" . $mysignature ."')";
		//echo $query;
		$result = mysql_query($query);
		echo mysql_error($conn);
		echo "Account Made";
		} else {
		echo '<h1><font color="#ff0000">Passwords do not match</font></h1>';
		}
}
//phpinfo();
?>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For XSS:</b>XSS is easy stuff. This one shows off stored XSS (someone can
	run across it later in another app that uses the same database). Check out
	the "User Info" page for the results of this stored XSS.
	"&lt;script&gt;alert("XSS");&lt;/script&gt;" is the classic XSS demo, but 
	there are far more interesting things you could do which I plan show in a
	video later. Also, check out 
	<a href="http://ha.ckers.org/xss.html">Rsnake\'s XSS Cheat Cheat</a>
	for more ways you can encode XSS attacks that may allow you to get around 
	some filters.
	<br><br>
	<b>For SQL Injection:</b> Mostly errors, but they reveal too much information about 
	the application.
	</span>'; 
}
// End hints section
?>
