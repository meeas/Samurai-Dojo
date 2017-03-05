<?php
    if (!empty($_POST["username"])) {
        mysqli_connect("localhost", "root", "samurai") or die(mysqli_error());
        mysqli_select_db("samurai_dojo_scavenger");
        $resultset = mysqli_query("select * from partners_data where username = '".$_POST["username"]."';") or die(mysqli_error());
        $result = mysqli_fetch_assoc($resultset);
        if ($_POST["password"] == $result["password"]){
            header("Location: partner_main.php?username=".$result["username"]);
            exit();
        }
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
	<title>Samurai Dojo Industries</title>
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
<li><a href="/">home</a></li>
<li><a href="aboutus.php">about</a></li>
<li><a href="products.php">products</a></li>
<li><a href="partners.php" class="current">partners</a></li>
<li><a href="support.php">support</a></li>
<li><a href="contactus">contact</a></li>
</ul>
</div>
</div>
<div id="content">
<div style="float: right;"><a href="javascript:ts('body',1)">[+]</a> | <a
href="javascript:ts('body',-1)">[-]</a></div>
<div id="left">
<h2>Partners</h2>
<p>With the Samurai Dojo Industries Partner Network your company benefits from market leading
fictional solutions. This is combined with award-winning programs designed to do absolutely
nothing to enable, distinguish, and reward you. As a partner, your company gains even
less access to resources.  All of this is available for a low daily fee!</p>
<hr>
<p>Please log in below if you have already fallen for this scam.  Samurai Dojo Industries
would like to pimp our largest partner Key Enterprises!</p>

<p><form method='POST' action='partners.php'>
      Username: <input type='text' name='username'> (3-8 letters)<br>
      Password: <input type='password' name='password'><br>
       <input type='submit' value='Log In'>
       </form>
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
