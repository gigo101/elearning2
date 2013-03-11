<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
	$firstname = mysql_prep($_POST['firstname']);
	$lastname = mysql_prep($_POST['lastname']);
	$initial = mysql_prep($_POST['initial']);
	$username = mysql_prep($_POST['username']);
	$password = mysql_prep($_POST['password']);
?>
<?php
	$query = "INSERT INTO student(firstname, lastname, initial,username,password) VALUES (
				'{$firstname}', '{$lastname}', '{$initial}','{$username}','{$password}')";
	$result = mysql_query($query, $connection);
	if ($result) {
		// Success!
		redirect_to("sign-in.php");
	} else {
		// Display error message.
		echo "<p>Subject creation failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
	}
?>

<?php
	// 5. Close connection
	mysql_close($connection);
?>


