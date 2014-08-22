<p align="center"><b><h1>Credits</h1></b></p>
<p>Samurai Dojo-Basic is a fork of an early version of Mutillidae.  Without the Mutillidae project, this application would not have been possible.  The following is the original credit section for Mutillidae.</p>
<p>--<br>Justin Searle<br>Samurai Project Lead</p>
<hr>

<p><a href="redirectandlog.php?forwardurl=http://www.irongeek.com/">Adrian Crenshaw</a> would like to thank 
the following people for helping him with the Mutillidae project:</p>
<p><a href="redirectandlog.php?forwardurl=http://www.owasp.org">OWASP</a> for making the vulnerability&nbsp; 
list I based this on.</p>
<p><a href="redirectandlog.php?forwardurl=http://www.issa-kentuckiana.org/">ISSA Kentuckiana</a></p>
<p><a href="redirectandlog.php?forwardurl=http://www.owasp.org/index.php/Louisville">OWASP Louisville </a></p>
<p><a href="redirectandlog.php?forwardurl=http://www.pocodoy.com/blog/">Brian Blankenship</a> for his support 
of the idea.</p>
<p><a href="redirectandlog.php?forwardurl=http://www.room362.com/">Mubix</a> for confirming the name</p>
<p><a href="redirectandlog.php?forwardurl=http://www.isd-podcast.com/">InfoSec Daily Podcast</a></p>
<p><a href="redirectandlog.php?forwardurl=http://pauldotcom.com/">PaulDotCom Podcast</a></p>
<p>All sorts of folks at <a href="redirectandlog.php?forwardurl=http://www.php.net/">PHP.net </a>for code snippets: kaigillmann </p>

<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><span style="background-color: #FFFF00">
	<b>For Unvalidated Redirects and Forwards:</b>  Unvalidated redirects can make the job of Phishers easier since the URL can be made to look like part of a trusted site. Notice how this page used “redirectandlog.php?forwardurl=” to send a user to another site, and log where it went. A Phisher could use this forward mechanism to make a Phishing URL look more legitimate. 
	</span>'; 
}
// End hints section
?>
