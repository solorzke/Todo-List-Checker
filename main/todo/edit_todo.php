<?php 
session_start();
include '../View/header.php'; 
?>
<h1 class="title">Edit Todo Assignment</h1>
<br>
<table id="editTable">
	<tr>
		<th>Due Date</th>
		<th>Message</th>
		<th>Status</th>
	</tr>
	<tr>
		<td><?php echo timeForm($dueDate); ?></td>
		<td><?php echo $message; ?></td>
		<td><?php echo $status = $isDone != 0 ? 'Incomplete': 'Complete'; ?></td>
	</tr>
</table>
<div class="container" style="height: 450px;">
<div class="formRadio" style="height: 450px;">


<form action="index.php" method="post">
	<input type="hidden" name="action" value="edit_todo">
	<input type="hidden" name="id" value="<?php echo $id ?>">

	<label>Update Assignment Message:</label>
	<br>
	<input type="text" name="message" placeholder="message">
	<br><br>

	<label>Update Due Date:</label>
	<br>
	<input type="Date" name="date" placeholder="Date format: MM/DD/YYYY">
	<br><br>

	<label>Update Due Date Time:</label>
	<br>
	<input type="Time" name="time" placeholder="Time format: HH:MM:SS">
	<br><br>

	<label>Update Completion Status:</label>
	
	<input class="box" type="radio" name="status" value="1">Complete
	<input type="radio" name="status" value="0">Incomplete
	<br><br>
		

	<input type="submit" name="submit" value="Save">
	<br><br>
</form>
</div>
</div>

<?php include '../View/footer.php'; ?>