<?php
// Begin hints section
if (($_COOKIE["showhints"]==1 && $dosomething != "togglehints") or ($_COOKIE["showhints"]==0 && $dosomething == "togglehints")) {
	echo '<p><span style="background-color: #FFFF00">
	<b>Security Misconfiguration and Error Handling</b>
<br>This is a hard category for me to code vulnerabilities for because it is not directly a vulnerability with the web app, but with how it is installed or how the web server is configured. Things to check for would be items like:
<br>
<br>1. Is the webserver software (Apache, IIS, etc) up to date?
<br>2. How about the libraries your application uses? Are they up to date? Problems could exist because of code you never wrote, but were included as a library.
<br>3. Is you web app running on a box with unneeded services? The web app may be fine, but some other vulnerable service could let someone in.
<br>4. Make sure you are not using default passwords.
<br>5. How does your server handle errors? Sometimes too much information is given back to the attacker via error message and banners. No reason to help out your attackers. Mutillidae has his issue in spades, just type a single quote into some of the forms to see what I mean.
<br>6. Some functions are rather dangerous. If the configuration was hardened many of the problems under "Malicious File Execution" would be harder to exploit since an attacker could not directly tell PHP to grab a file from an offsite URL.

<br><br>
Also, depending on your application software stack, there could be a sorts of recommended ways to harden configuration. In the case of PHP, Madirish has a guide that may help: <a href="http://www.madirish.net/?article=229">http://www.madirish.net/?article=229</a>
	
<br>
	</span>'; 
}
// End hints section
?>
