<html>
<?php
  echo('<h1>Form Test</h1>');
  setcookie("foo", "bar");
  setcookie("secret", "NjU4OWIwZDQ2YjZmMmYwZGJhOWViYWIxNmYyZGQwZmY0OTk4NjhmNA==");
  setcookie("hello", "world");
?>

<form action="/index.php">
  First name:<br>
  <input type="text" name="firstname" value="Jason">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="Gillam">
  <br>
  Card:<br>
  <input type="password" name="card" value="5555555555554444">
  <br>
  <input type="submit" value="Submit">
</form> 
</html>