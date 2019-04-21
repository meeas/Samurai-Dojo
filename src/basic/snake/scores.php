<?php

$filename = "highscores.txt";
$handle = fopen($filename, 'r');

if ($handle) {
	if (flock($handle, LOCK_SH)) {
					$hs = fread($handle, filesize($filename));
					flock($handle, LOCK_UN);
					fclose($handle);

					$hs = split("&", $hs);

					$tmp_nameArray = array();
					$tmp_scoreArray = array();
					$tmp_recFileArray = array();
					$tmp_hash = array(); //Added voor hash weg te schrijven

					for ($i=0; $i<=9; $i++) {
						$n = split("=", $hs[$i*4]);
						$s = split("=", $hs[$i*4+1]);
						$r = split("=", $hs[$i*4+2]);
						$t = split("=", $hs[$i*4+3]); //Added voor hash

						settype($s[1], "integer");
						settype($r[1], "integer");

						array_push($tmp_nameArray, $n[1]);
						array_push($tmp_scoreArray, $s[1]);
						array_push($tmp_recFileArray, $r[1]);
						array_push($tmp_hash, $t[1]); // Added voor hash
					}
	    print "<body bgcolor=black><table style=\"color:red; background-color:black\"><tr><td><b>Rank</td><td><b>Team</td><td><b>Token</td></tr>";
					for ($i=0; $i<=9; $i++) {
						$rank = $i + 1;
                        print "<tr><td>" . $rank . "</td>";
                        print "<td>" . $tmp_nameArray[$i] . "</td>";
                        print "<td><input type=text size=66 value=\"" . $tmp_hash[$i] . "\"></td>";
                        print "</tr>";
                        //print $i + 1 . " " . $tmp_nameArray[$i] . "&score" . $i . "=" . $tmp_scoreArray[$i] . "answer = " . $tmp_hash[$i];
                        //print "<br>";
					}
                    print "</table>";
}
}

?>
