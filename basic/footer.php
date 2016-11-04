		<!-- End Content -->
	        </div>
    </div>
<?php
include 'closedb.inc';
?>

<br>
<hr>
<div class="row" id="footerbar">
    Copyright 2012 Justin Searle<br/>
Samurai Dojo-Basic is a <a href="http://www.samurai-wtf.org" target="_blank">SamuraiWTF</a> Project.
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    var hrefval="<?php echo "?".$_SERVER['QUERY_STRING']; ?>";
    if (hrefval=="?") {
        hrefval="index.php"
    }
    $(".nav>li>a[href=\""+hrefval+"\"]").parent().addClass("active");

</script>
</body>
</html>
