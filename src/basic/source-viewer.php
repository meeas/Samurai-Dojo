<div class="page-title"><h2>See the source for some cool apps</h2></div>

Just choose one form the list and submit.

<?php
echo "<form method=\"GET\" action=\"" .$_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'] . "\">";
echo '<input type="hidden" name="page" value="' . $_REQUEST["page"] . '">'; //Just to make ths work with get.
echo '<p><select size="1" name="php_file_name">';
foreach (new MyDirectoryIterator('.') as $fileInfo) {
    if($fileInfo->isDot() or  $fileInfo->getFilename() == "setupreset.php") continue;
	echo $fileInfo->GetExtension();
	if ($fileInfo->GetExtension() == "php") {
    echo '<option value="' . $fileInfo->getFilename() . '">' . $fileInfo->getFilename() . '</option>\n';
	}
}
?>
	</select></p>
	<p><input type="submit" value="Submit" name="submit"></p>
</form>
<?php
// Grab inputs
$phpfilename=$_REQUEST["php_file_name"];

echo '<b>' . $phpfilename . ' source code:</b>';
?>
<hr>
<pre>
<?php
if ($phpfilename <>"") {
	highlight_file($phpfilename);
}
?>
</pre>
<?php
class MyDirectoryIterator extends DirectoryIterator
{
    public function GetExtension()
    {
        $Filename = $this->GetFilename();
        $FileExtension = strrpos($Filename, ".", 1) + 1;
        if ($FileExtension != false)
            return strtolower(substr($Filename, $FileExtension, strlen($Filename) - $FileExtension));
        else
            return "";
    }
}
?>
<hr>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For Malicious File Execution/Insecure Direct Object Reference:</b>
	So, this script shows the source of most of the php files in this site, but not 
	all. Giving even this level of information about the application is a bad idea.
	What would be another good script to checkout? A script that you see in the 
	menu list on the left, but not the dropdown box? Using GET instead of POST
	makes this one easier to abuse, but with "Tamper Data" or "Paros" you could
	still screw with POST data.
	</span>'; 
}
// End hints section
?>
