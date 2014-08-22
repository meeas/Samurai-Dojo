<?php
include ("header.php");
// Grab inputs
$page = $_GET[page];
if ($page=="") {
	include("home.htm"); 
	include("homenotes.php");
} else { include ("$page"); } 
include ("footer.php");
?>