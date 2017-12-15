<?php include '../View/header.php'; ?>

<h1>Add A New Todo Assignment</h1>
<br>
<h2>Enter the information below.</h2>

<form action="" method="post">
	<input type="hidden" name="action" value="add_todo">

	<label>Enter Assignment Message:</label>
	<input type="text" name="message" placeholder="message">
	<br>

	<br>
	<label>Enter Completion Status:</label>
	<br><br>
	<input type="radio" name="status" value="1">Complete
	<input type="radio" name="status" value="0">Incomplete
	<br><br>

	<label>Enter Due Date:</label>
	<br>
	<input type="Date" name="date">
	<br><br>

	<label>Enter Time of Due Date:</label>
	<br>
	<input type="Time" name="time">
	<br><br>
	<input type="submit" name="submit" value="Submit">
	<br><br>
</form>
<?php date_default_timezone_get("America/New York"); ?>
<?php echo date('m-d-Y \a\t H:i:s'); ?>
<a href="index.php?action=list_todos">Return to Main Page</a>
<br><br>
<?php include '../View/footer.php'; ?>