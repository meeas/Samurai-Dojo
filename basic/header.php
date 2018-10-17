<?php
include 'config.inc';
include 'opendb.inc';

// Grab inputs
$username = $_REQUEST["user_name"];
$password = $_REQUEST["password"];
$dosomething = $_REQUEST["do"];

if ($username <> "" and $password <> "") {
	$query  = "SELECT * FROM accounts WHERE username='". $username ."' AND password='".stripslashes($password)."'";
	$result = $conn->query($query) or die(mysqli_error($conn) . '<p><b>SQL Statement:</b>' . $query);
	if ($result->num_rows > 0) {
		// flag the cookie as secure only if it is accessed via SSL
		$ssl = FALSE;
		if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
			// SSL connection
			$ssl = TRUE;
		}
		// set a random md5 as the session value
                $rndm = rand();
                $value = md5($rndm);
                setcookie("sessionid", $value, 0, "/", "", $ssl, TRUE);
		// set uid to appropriate user
		$row = $result->fetch_assoc();
		setcookie("uid", base64_encode($row['cid']), 0, "/", "", $ssl, FALSE); 
		$failedloginflag=0;
		if ($_REQUEST["returnURL"] <> "") {
			echo '<meta http-equiv="refresh" content="0;url=' + $_REQUEST["returnURL"] + '>';
		} else {
			echo '<meta http-equiv="refresh" content="0;url=index.php">';
		}

		
	} else {
		$failedloginflag=1;
	}
}

switch ($dosomething) {
	case "logout":
		setcookie('sessionid','',1);
		setcookie('uid','',1);
		break;
	case "togglehints":
		if ($_COOKIE["showhints"] == 0) {
		setcookie('showhints','1');
		} else {
		setcookie('showhints','0');
		}		
		break;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dojo-basic.css" rel="stylesheet">
<?php
if ($dosomething  == "logout") {
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
?>
  <meta content="text/html; charset=us-ascii" http-equiv="content-type">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> 
</head>
<body>
    <div class="container" style="bgcolor: lightblue">
    <div class="row" id="titlebar"><h1>Welcome to Samurai Dojo-Basic!</h1>


	<?php
		?>
		<!-- Old username query for welcome message before move to base64 uids
		$query  = "SELECT * FROM accounts WHERE cid='".$_COOKIE["uid"]."'";
		-->
		<?php
		$query  = "SELECT * FROM accounts WHERE cid='".base64_decode($_COOKIE["uid"])."'";
		$result = $conn->query($query) or die(mysqli_error($conn) . '<p><b>SQL Statement:</b>' . $query);
		echo mysqli_error($conn);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc())
			{
				$logged_in_user = $row['username'];
				$logged_in_usersignature = $row['mysignature'];				
				echo '<div id="title-loggedin"><h3>You are logged in as ' . $logged_in_user . '</h3><div class="lead">' . $logged_in_usersignature . '</div></div>';
			}
		} else {
			$logged_in_user = "anonymous";
			echo '<div id="title-error"><h3>Not logged in</h3></div>';
		}
		?>
		</div>
        <div class="row">
        <div class="col-sm-3 sidenav">
            <h4><div class="menu-heading">Main Menu</div></h4>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="index.php">Home</a></li>
    <?php if (!$_COOKIE["sessionid"]) { ?>
		<li><a href="?page=register.php">Register</a></li>
		<li><a href="?page=login.php&returnURL=<?php echo $_SERVER['SCRIPT_NAME']; ?>">Login</a></li>
     <?php }; if ($_COOKIE["sessionid"]) { ?>
            <li><a href="?page=user-info.php">User Info</a></li>
		<li><a href="?page=add-to-your-blog.php">Blog Entry</a></li>
		<li><a href="?page=view-someones-blog.php">View Blogs</a></li>
		<li><a href="?page=text-file-viewer.php">Reading Room</a></li>
		<li><a href="snake/">Play Snake</a></li>
        <li><a href="?do=logout">Logout</a></li>
           <hr/><h4><div class="menu-heading">User Utilities</div></h4>
        <li><a href="?page=browser-info.php">Browser Info</a></li>
		<li><a href="?page=dns-lookup.php">DNS Lookup</a></li>
<?php }; if (base64_decode($_COOKIE["uid"])==1) { ?>
            <hr/><h4><div class="menu-heading">Admin Controls</div> </h4>
        <li><a href="?page=show-log.php">Show Logs</a></li>
		<li><a href="?page=source-viewer.php">Source Viewer</a></li>
<?php } ?>

<!-- Different behavior for diferent UAs -->
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'],"Googlebot") !== FALSE)) { ?>
		 <hr/><h4><div class="menu-heading">Search Engines</div> </h4>
            <li>Keywords: pen-test, dojo, samurai, wtf</li>
<?php } ?>

  <?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'],"iPhone") !== FALSE)) { ?>
             <hr/><h4><div class="menu-heading">Mobile: iPhone</div> </h4>
            <li>Running iOS?</li>
            <li>Print maps here :)</li>
<?php } ?>
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'],"Android") !== FALSE)) { ?>
    <hr/> <h4><div class="menu-heading">Mobile: Android</div> </h4>
		<li>Running Android?</li>
        <li>Flynn rocks!!!</li>
<?php } ?>
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 3.02") !== FALSE)) { ?>
		  <hr/><h4><div class="menu-heading">Old browser</div> </h4>
        <li><a href="/passwords/">Contact the admin</a></li>
<?php } ?>

         <hr/>
            <h4><div class="menu-heading">Pentester Help</div> </h4>
        <script>
            function do_open(href) {
			if (window.confirm('You are invoking functionality that is outside the scope of the penetration test and may contaminate the results of your spidering and scanning tools. Please disable your interception proxy before continuing.')) { window.location.replace('index.php'+href); }
		}
		</script>
            <li><a href="#" onclick="do_open(String.fromCharCode(63)+'page'+String.fromCharCode(61)+'about'+String.fromCharCode(46)+'php');">About</a></li>
            <li><a href="#" onclick="do_open(String.fromCharCode(63)+'do'+String.fromCharCode(61)+'togglehints');">Toggle Hints</a><br></li>
            <li><a href="#" onclick="do_open(String.fromCharCode(63)+'page'+String.fromCharCode(61)+'vuln-list'+String.fromCharCode(46)+'php');">Vuln List</a></li>
            <li><a href="#" onclick="do_open(String.fromCharCode(63)+'page'+String.fromCharCode(61)+'credits'+String.fromCharCode(46)+'php');">Credits</a></li>
            <li><a href="#" onclick="do_open(String.fromCharCode(63)+'page'+String.fromCharCode(61)+'reset-db'+String.fromCharCode(46)+'php');">Reset DB</a></li>

        </ul>
        </div>
        <div class="main-content col-sm-9">
            <!-- begin content -->
