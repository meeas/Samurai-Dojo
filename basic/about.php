<title>Samurai Dojo-Basic About Page</title>
<p align="center"><b>A Deliberately Vulnerable PHP Application
Implementing the OWASP Top 10</b></p>

<br>

<p>The Samurai Dojo-Basic application impliments the
<a href="http://www.owasp.org/index.php/OWASP_Top_Ten_Project">OWASP Top 10</a> 
in PHP, and do it in such a way that it is easy to demonstrate common attacks to 
others. Many web app hobbyists and professionals used PHP, and 
it's pretty easy to pick up the basics of the language. The Dojo-Basic webpage 
is a set of relatively simple PHP scripts meant to illustrate the core concepts of the
<a href="http://www.owasp.org/index.php/OWASP_Top_Ten_Project">OWASP Top 10</a> 
vulnerabilities list. The primary purpose of this project is to demonstrate these
vulnerabilities for the sake of teaching core pentesting and secure coding concepts.</p>

<p>&nbsp;&nbsp;&nbsp; Here are the core goals of the Samurai Dojo-Basic project:</p>

<p>1. Make the code and examples simple to understand so as to get the point across of 
how a given vulnerability works. With 
some of the stuff in Webgoat it is s a little hard to figure how to exploit the 
code, Dojo-Basic almost exploits itself. My vulnerable apps won't be the most realistic, but 
they should illustrate the core concepts well.</p>

<p>2. Be geared in such a way that it's easy to update with new modules and 
hints.</p>

<p>3. Easy to install and run. Just download <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a> Lite 
for Windows or Linux, put the scripts in the htdocs directory, and click the 
"Setup/reset the DB" link in the main menu .</p>

<p>4. When folks find bugs in my crappy code, I can legitimately say it's a 
feature. :)</p>

<p>Go to the <a href="http://www.owasp.org/index.php/OWASP_Top_Ten_Project">
OWASP Top 10</a> page to read about a vulnerability, then choose a vulnerable page from 
the <a htref="?page=vuln-list.php">Vuln List</a> link in the "Pentester Help" menu
on the left. Try to discover and exploit the vulnerability. You can also try playing
with the code and fix the vulnerabilities.  It can be very educational. Most of the 
scripts are vulnerable to more than just one of the OWASP Top 10, as you will see in 
the <a htref="?page=vuln-list.php">Vuln List</a> page.</p>

<p><b>To install: </b> </p>

<p>1. Simply extract the files somewhere in the htdocs folder of
<a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a> (for example 
htdocs/dojo-basic), or run it from your Linux box after installing Apache/PHP/MySQL.</p>

<p>2. By the default, Dojo-Basic trys to connect to MySQL on the localhost with 
the username &quot;root&quot; and a password of "samurai". To change this, edit &quot;config.inc&quot; with the correct information for your environment.</p>

<p>3. It should go without saying that <u> <font color="#FF0000">you should NOT&nbsp; 
run this code on a production network</font></u>. Either run it on a 
private network, or restrict your web server software to only use the local 
loopback address. By default Dojo-Basic only allows access from localhost 
(127.*.*.*), assuming the .htaccess file I've written is honored. Edit the .htaccess 
file to change this behavior (not recommended on a public network, but you may 
want to do it for a class). If for some reason .htaccess is not parsed you can 
restrict the IP by finding the &quot;Listen&quot; line in the http.conf file and changing 
it to read: <font color="#008080">Listen 127.0.0.1:80</font></p>
<p>If you would like to learn about other deliberately vulnerable web 
applications, check out my article on the subject:</p>
