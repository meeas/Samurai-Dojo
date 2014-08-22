<center><h2><b>DNS Lookup</b></h2></center><p>

<?php
echo "<form method=\"POST\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
?>

	<p>Who would you like to do a DNS lookup on? Give me an IP or hostname:</p>
	<p><input type="text" name="target_host" size="20"></p>
	<p><input type="submit" value="Submit" name="Submit_button"></p>
	
</form>
<?php
// Grab inputs
$targethost = $_REQUEST["target_host"];

echo "<pre>";
echo shell_exec("nslookup -timeout=1 " . $targethost);
echo "</pre>";
//phpinfo();
?>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For Command Injection Flaws:</b> Directly building a command to use in a
	shell? Bad idea! Check out command separators like ; and && depending on if 
	you are using Linux or Windows respectively.
	</span>'; 
}
// End hints section
?>
