<?php
    function displayform() {
        echo "<html><head><title>Admin page -- Don't log in unless you should!</title><head><body>";
        echo "<h1>Admin Log In</h1><hr><form method='POST' action='index.php?key06=03c6b06952c750899bb03d998e631860'>";
        echo "Username: <input type='text' name='username'><br>";
        echo "Password: <input type='password' name='password'><br>";
        echo "<input type='submit'>";
        echo "</form></body></html>";
        
    }


    if (!isset($_POST["username"])) {
        // display form
        displayform();
        
    } else {
        // check log in
        if ($_POST["username"] == "admin" & $_POST["password"] == "abc123") {
	    echo base64_decode("S2V5IDE5ID0gOWUzY2ZjNDhlY2NmODFhMGQ1NzY2M2UxMjlhZWYzY2I=");
        } else {
            displayform();
        }
    }

?>
