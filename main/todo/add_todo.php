<?php 
session_start();
include '../View/header.php'; 
?>
<h1 class="title">Add A New Todo Assignment</h1>
<br>
<div class="container" style="height: 490px;">
	<div class="formRadio" style="height: 490px;">
<form action="index.php" method="post">
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
	<input type="Date" name="date" placeholder="Date format: MM/DD/YYYY">
	<br><br>

	<label>Enter Time of Due Date:</label>
	<br>
	<input type="Time" name="time" placeholder="Time format: HH:MM:SS">
	<br><br>
	<input type="submit" name="submit" value="Submit">
	<br><br>
</form>
</div>
</div>
<?php include '../View/footer.php'; ?>