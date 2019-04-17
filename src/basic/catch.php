<?php
   $filename = "caughtdata.txt";
   $handle = fopen($filename, "a");
   fwrite($handle, $_SERVER["REMOTE_ADDR"]."\n");
   foreach ( $_REQUEST as $k => $v ) {
   $msg = "$k = $v\n";
   fwrite($handle, $msg);
   print $msg . "<BR>";
   }
   fwrite($handle, "\n");
   fclose($handle);
?>