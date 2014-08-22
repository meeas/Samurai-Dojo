<?php


$playerName = $_POST['playerName'];
$score = $_POST['score'];

$scorehash = $_POST['scorehash']; // Added voor hash calculatie

// THF Hash Calculatie
$Timestamp = date("YmdHis");
$Token = $playerName; //Geen idee welke dit is?
$Hash = md5($level_secret.$score.$level.$Timestamp.$Token);
$answer = base64_encode($Hash.";". "100" . ";".$level.";".$Timestamp.";".$Token);
//
$hash = $answer;

//$playerName = $playerName[0] . date("YmdHis") . $playerName[strlen($playerName)-1];

$snakeBlockCounter = $_POST['snakeBlockCounter'];
$snakeEraseCounter = $_POST['snakeEraseCounter'];
$SNAKE_BLOCK = $_POST['SNAKE_BLOCK'];

$recTurn  = $_POST['recTurn'];
$recFrame = $_POST['recFrame'];
$recFood  = $_POST['recFood'];

settype($score, "integer");
settype($snakeBlockCounter, "integer");
settype($snakeEraseCounter, "integer");

$playerName = str_replace("&", "", $playerName);
$playerName = str_replace("=", "", $playerName);
$playerName = str_replace("#", "", $playerName);
$playerName = str_replace("<", "", $playerName);
$playerName = str_replace(">", "", $playerName);


//if ($snakeBlockCounter-$snakeEraseCounter-1 == $score/2) { // make sure score is correct according to the snake counter and erase counter
if ($score == $score) { // make sure score is correct according to the snake counter and erase counter
//

    if (sqrt($scorehash - 1337) == $score ) {
//
	$mapArray = split(",", $_POST['map']);
	$snakeBlocks = 0;
	$count = count($mapArray);
	for ($i=0; $i<=$count; $i++) {
		if ($mapArray[$i] == "1") {
			$snakeBlocks++;
		}
	}

	//if ($snakeBlocks >= ($snakeBlockCounter-$snakeEraseCounter-10)) { // make sure the number of snake blocks in the map is not less than the number of blocks according to the counters (we allow it to be a bit less because it may not have had time to grow)
	if ($snakeBlocks >= $snakeBlocks) {
		if ($SNAKE_BLOCK == "1") {
			//print "score: " . $score . "<br>";
			//print "snakeBlocks: " . $snakeBlocks . "<br>";
			//print "snakeBlockCounter: " . $snakeBlockCounter . "<br>";
			//print "snakeEraseCounter: " . $snakeEraseCounter . "<br>";
			//print "snake length = " . ($snakeBlockCounter-$snakeEraseCounter) . "<br>";

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


					$nameArray = array();
					$scoreArray = array();
					$recFileArray = array();
					$hashArray = array(); //Added voor hash

					for ($i=0; $i<=9; $i++) {
						if ($score >= $tmp_scoreArray[$i]) {
							if($i==0) {
								$score = $tmp_scoreArray[$i] + 1; // High score is oude high score + 1
							};
							
							array_push($nameArray, $playerName);
							array_push($scoreArray, $score);
							array_push($recFileArray, $tmp_recFileArray[9]);
							array_push($hashArray, $hash); //Added voor hash

							$score = -1;

							$saveRecString = "recTurn=" . $recTurn . "&recFrame=" . $recFrame . "&recFood=" . $recFood . "&";
							$recFilename = "rec" . $tmp_recFileArray[9] . ".txt";
							$recHandle = fopen($recFilename, 'w');

							if ($recHandle) {
								if (flock($recHandle, LOCK_EX)) {
									fwrite($recHandle, $saveRecString);
									flock($recHandle, LOCK_UN);
								} else {
									print "could not lock for writing" . $recFilename;
								}

								fclose($recHandle);
							} else {
								//print "could not write " . $recFilename;
							}
						}

						array_push($nameArray, $tmp_nameArray[$i]);
						array_push($scoreArray, $tmp_scoreArray[$i]);
						array_push($recFileArray, $tmp_recFileArray[$i]);
						array_push($hashArray, $tmp_hash[$i]);
					}



					$saveString = "";
					for ($i=0; $i<=9; $i++) {
						$saveString = $saveString . "name" . $i . "=" . $nameArray[$i] . "&score" . $i . "=" . $scoreArray[$i] . "&recFile" . $i . "=" . $recFileArray[$i] . "&hash" . $i . "=" . $hashArray[$i] . "&";
					}


					$handle = fopen($filename, 'w');

					if ($handle) {

						if (flock($handle, LOCK_EX)) {
							fwrite($handle, $saveString);
							flock($handle, LOCK_UN);

							//print $saveString;

							print "&status=ok&";
						} else {
							print "could not lock for writing" . $filename;
						}

						fclose($handle);
					} else {
						print "could not open to write " . $filename;
					}
				} else {
					print "could not lock for reading" . $filename;
				}
			} else {
				print "could not open to read " . $filename;
			}
		} else {
			//print "incorrect variables! (3)";
		}
	 } else {
		//print "incorrect variables! (2)";
	}
  } else {
      //print "scorehash <> score";
}	
} else {
	//print "incorrect variables! (1)";
}
//Block IP for few seconds
//$fileblock = fopen(".htaccess","r");
//$tmpfile = array();
//while(!feof($fileblock))
//{
//	$tmp = fgets($fileblock);
//	$addstring = "";
//	$found = strpos($tmp, '</Files>');
//	if($found !== false){
//		$addstring = "deny from " . $_SERVER['REMOTE_ADDR'];
//		array_push($tmpfile, $addstring);
//	}
//	array_push($tmpfile, $tmp);
//}
//fclose($fileblock);
//$fileblock=fopen(".htaccess","w+");
//foreach($tmpfile as $key => $value){
//	fwrite($fileblock,$value );
//}

?>

