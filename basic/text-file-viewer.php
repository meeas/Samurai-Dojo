<center><h2><b>Hacker text files of old</b></h2></center><p>

Take the time to read some of these great old school hacker text files. Just choose one form the list and submit.

<?php
echo "<form method=\"POST\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
?>
	<p><select size="1" name="text_file_name">
	<option value="http://dojo-basic/readingroom/atms">An Overview of ATMs and Information on the Encoding System
	</option>
	<option selected value="http://dojo-basic/readingroom/auditool.txt">Intrusion Detection in Computers by Victor H. Marshall (January 29, 1991)
	</option>
	<option value="http://dojo-basic/readingroom/backdoor.txt">How to Hold Onto UNIX Root Once You Have It
	</option>
	<option value="http://dojo-basic/readingroom/hack1.hac">The Basics of Hacking, by the Knights of Shadow (Intro)
	</option>
	<option value="http://dojo-basic/readingroom/hacking101.hac">HACKING 101 - By Johnny Rotten - Course #1 - Hacking, Telenet, Life
	</option>
	</select></p>
	<p><input type="submit" value="Submit" name="B1"></p>
</form>
<pre>
<?php
// Grab inputs
$textfilename=$_REQUEST["text_file_name"];

if ($textfilename <>"") {
	$handle = fopen($textfilename, "r");
	echo stream_get_contents($handle);
	fclose($handle);
}
?>
</pre>
For other great old school hacking texts, check out <a href="http://www.textfiles.com/">http://www.textfiles.com/</a>.<p>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For Malicious File Execution/Insecure Direct Object Reference:</b>
	Hum, looks like I\'m grabbing files from another site. Could we use this as 
	a proxy? Tip: Try the Tamper Data FireFox plugin or maybe Paros Proxy.
	</span>'; 
}
// End hints section
?>
