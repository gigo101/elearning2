<?php
session_start();

  require_once("includes/connection.php");
?>
<?php

// Inialize session

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM student WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string($_POST['password']) . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: index.php');
}
else {
// Jump to login page

header('Location: sign-in.php');
}

?>