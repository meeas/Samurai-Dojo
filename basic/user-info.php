<div class="page-title"><h2>Account Details</h2></div>

<?php
$password = $_REQUEST["password"];
$signature = $_REQUEST["signature"];
$cid = base64_decode($_COOKIE["uid"]);
if ($password <> "") {
	$query = "UPDATE accounts SET password='" . $password . "', mysignature='" . $signature . "' WHERE cid='" . $cid . "'";
	$result = mysql_query($query) or die(mysql_error($conn) . '<p><b>SQL Statement:</b>' . $query);
	header("Location: ".$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']);
}
?>

<?php
$query = "SELECT * FROM accounts WHERE cid='". $cid ."'";
$result = mysql_query($query) or die(mysql_error($conn) . '<p><b>SQL Statement:</b>' . $query);
if (mysql_num_rows($result) > 0) {
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>

<form class="form-horizontal" method="POST" action="<?php echo "{$_SERVER['SCRIPT_NAME']}?{$_SERVER['QUERY_STRING']}" ?>">
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputUsername" placeholder="username" value="<?php echo "{$row['username']}" ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="********">
        </div>
    </div>
    <div class="form-group">
        <label for="signature" class="col-sm-2 control-label">Signature:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSignature" value="<?php echo "{$row['mysignature']}" ?>">
        </div>
    </div>

     <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="Submit_button" class="btn btn-default">Update</button>
    </div>
  </div>

      <?php
	}
} else {
	echo '<p class="bg-danger">Error retrieving profile.</p>';
}
?>


<?php
// Begin hints section
if ($_COOKIE["showhints"]==1) {
	echo '<p><p><span style="background-color: #FFFF00">
	<b>For SQL Injection:</b>The old "\' or 1=1 -- " is a classic, but there are others. This just shows
	you too much info. Also try an injection like this on the <a href="?page=login.php">Login</a> page.
	<br><br>
	<b>For Session and Authentication:</b>As for playing with sessions, try a 
	<a href="https://addons.mozilla.org/en-US/firefox/addon/4510">cookie editor</a> 
	to change your UID.
	<br><br>
	<b>For XSS:</b> You may also see an XSS attack you left when you used the
	registration page.
	</span>'; 
}
// End hints section
?>

