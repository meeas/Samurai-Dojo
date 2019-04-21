<?php
        // Provide fake support for the OPTIONS method
        $method = $_SERVER['REQUEST_METHOD'];
        if (isset($method) && ($method === "OPTIONS")) {
                // Set a new header
                header('Allow: GET,HEAD,POST,SAMPLE,OPTIONS,TRACE,Key00=cfcd208495d565ef66e7dff9f98764da');
        }
        // OPTIONS returns the standard page with the new header

        // We cannot provide fake support for the TRACE method, as
	// the Apache server replies first with 405 Metohd Not Allowed
	// Implement instead a SAMPLE HTTP method
        if (isset($method) && ($method === "SAMPLE")) {
                // Set new headers
                header('X-Sample: S2V5MDk9OGJmMTIxMWZkNGI3Yjk0NTI4ODk5ZGUwYTQzYjlmYjM=');
        }
?>
<?php
	// Key 05 is 6f3ef77ac0e3619e98159e9b6febf557
	
	// generate a random number of  1 or 0
	$coinflip = rand(0,99);
	if ($coinflip == 1){
		// set our key03 as the session value
		setcookie("sessionid", "03-is-069059b7ef840f0c74a814ec9237b6ec");
	} else {
		// set a random md5 as the session value
		$rndm = rand();
		$value = "xx-xx-" . md5($rndm);
		setcookie("sessionid", $value);
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<!-- ==========================================================	-->
<!--	Created by Devit Schizoper                          	-->
<!--	Created HomePages http://LoadFoo.starzonewebhost.com   	-->
<!--	Created Day 01.12.2006                              	-->
<!-- ========================================================== -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="LoadFoO" />
	<meta name="description" content="Site description" />
	<meta name="keywords" content="key, words" />
	<meta name="key10" content="YjZmMDQ3OWFlODdkMjQ0OTc1NDM5YzYxMjQ1OTI3NzI=" />
	<title>Samurai Dojo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" src="js/textsizer.js"></script>
	<script type="text/javascript" src="js/rel.js"></script>
</head>

<body>
<div id="wrap">
<div id="top">
<h2><a href="/" title="Back to main page">Samurai Dojo</a></h2>
<div id="menu">
<ul>
<li><a href="/" class="current">home</a></li>
<li><a href="aboutus.php">about</a></li>
<li><a href="products.php">products</a></li>
<li><a href="partners.php">partners</a></li>
<li><a href="support.php">support</a></li>
<li><a href="contactus.php">contact</a></li>
<!-- key04=006f52e9102a8d3be2fe5614f42ba989  -->
</ul>
</div>
</div>
<div id="content">
<div style="float: right;"><a href="javascript:ts('body',1)">[+]</a> | <a
href="javascript:ts('body',-1)">[-]</a></div>
<div id="left">
<h2>Welcome to Samurai Dojo Industries</h2>
<p>Here at Samurai Dojo Industries we pride ourselves on the quality and quantity of the products that
we make and sell.  We have been doing business since 1982, and are in 11 different countries.</p>
<p>Our CEO, <a href="kevin.php">Kevin Flynn</a> is second to none when it comes to eliminating
his rivals.</p>
 <ul>
 <li>Our light discs were the original product</li>
 <li>The light cycles are our most visible accomplishment</li>
 <li>Attack spiders are the life of the party</li>
 </ul>
 </div>
<div id="right">
<ul id="nav">
	<li><a href="index.php">Home</a></li>
	<li><a href="products.php">Products</a></li>
	<li><a href="support.php">Support</a></li>
	<li><a href="contactus.php">Contact</a></li>
</ul>
</div>
<div id="clear"></div></div>
<div id="footer">
<p>Copyright 2009 by Samurai Dojo Industries. Designed by <a href="http://loadfoo.org/" rel="external">LoadFoO</a>. Released as an Open Source design</p>
</div>
</div>

</body>
</html>
