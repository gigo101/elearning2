<?php
  require_once("includes/connection.php");
?>

<?php require_once("includes/functions.php"); ?>

<?php
	
	$errors = array();
	// Form Validation
	$required_fields = array('room_name');
	foreach($required_fields as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != -1)) {
			$errors[] = $fieldname;
		}
	}

		if (!empty($errors)) {
		redirect_to("addroom_error.php");
	}
?>



<?php
	$room_name = mysql_prep($_POST['room_name']);
	$roomtype = mysql_prep($_POST['roomtype']);
	$available = mysql_prep($_POST['available']);
?>
<?php
		
		$query = "INSERT INTO rooms (
				roomname, roomtypeid, available
				) VALUES (
				'{$room_name}', {$roomtype}, '{$available}'
				)";
		$result = mysql_query($query, $connection);
		if ($result) {
			// Success!
			redirect_to("rooms.php");
		} else {
			// Display error message.
			echo "<p>Adding rooms failed.</p>";
			echo "<p>" . mysql_error() . "</p>";
		}

?>

<?php mysql_close($connection); ?>
