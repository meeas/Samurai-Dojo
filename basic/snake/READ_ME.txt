These files are provided "as is", I do not guarantee that they are free of bugs or even the best way to implement this type of game.
Please note that this source is very old and written for Flash Player 6 (the current version of the Flash Player as of this writing is 9).
I have included the highscore functionality, but that part is not documented, and uses old technology (LoadVars and simple txt files). If I would write a highscore feature today I would recommend using XML (and possibly a database to store the data).

Feel free to use these files anyway you like.

Note: In order for the highscore feature to work, enterHighscore.php and highscores.txt must reside in the same folder as the swf file on the server, and the script must have permission to write files to that folder, otherwise highscore.txt can not be updated and the recordings of the games can not be created. And of course the server must have php-support.
