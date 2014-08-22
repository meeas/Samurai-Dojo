<?php
$query = "INSERT INTO hitlog(hostname, ip, browser, referer, date) VALUES ('".
	gethostbyaddr($_SERVER['REMOTE_ADDR']) . "', '".
	$_SERVER['REMOTE_ADDR'] . "', '".
	$_SERVER['HTTP_USER_AGENT'] . "', '".
	$_SERVER['HTTP_REFERER'] . "', ".
	" now() )";
//echo $query;
$result = mysql_query($query);
echo mysql_error($conn );

mysql_close($conn);
?>