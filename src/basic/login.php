<center><h2><b>Login</b></h2></center><p>
If you do not have an account, <a href="?page=register.php">Register</a><p>
<?php
if ($failedloginflag==1) {
	echo '<h1><font color="#ff0000">Bad user name or password!</font></h1>';
}
echo "<form method=\"POST\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
?>
	<p>Enter your username and password:</p>
	<p>Name:<br><input type="text" name="user_name" size="20"></p>
	<p>Password:<br><input type="password" name="password" size="20"></p>
	<p><input type="submit" value="Submit" name="Submit_button"></p>
</form>
<?php
//  The real login happens at the head of header.php, the stuff below is mostly filler.
?>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For SSL Injection:</b>The old "\' or 1=1 -- " is a classic, but there are others. Check out who 
	you are logged in as after you do the injection. 
	<br><br>
	<b>For Session and Authentication:</b>As for playing with sessions, try a 
	<a href="https://addons.mozilla.org/en-US/firefox/addon/4510">cookie editor</a> 
	to change your UID.
	<br><br>
	<b>For Insecure Authentication:</b>Try sniffing the traffic with Wireshark, Cain, Dsniff or Ettercap.	
	</span>'; 
}
// End hints section
?>

