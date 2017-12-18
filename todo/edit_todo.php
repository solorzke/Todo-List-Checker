<?php 
session_start();
include '../View/header.php'; 
?>
<h1>Edit Todo Assignment</h1>
<br>
<p>You have selected:</p>
<table>
	<tr>
		<th>Due Date</th>
		<th>Message</th>
		<th>Is Done</th>
	</tr>
	<tr>
		<td><?php echo $dueDate; ?></td>
		<td><?php echo $message; ?></td>
		<td><?php echo $isDone; ?></td>
	</tr>
</table>

<h2>Edit the information below.</h2>
<form action="index.php" method="post">
	<input type="hidden" name="action" value="edit_todo">
	<input type="hidden" name="id" value="<?php echo $id ?>">

	<label>Update Assignment Message:</label>
	<br>
	<input type="text" name="message" placeholder="message">
	<br><br>

	<label>Update Due Date:</label>
	<br>
	<input type="Date" name="date">
	<br><br>

	<label>Update Due Date Time:</label>
	<br>
	<input type="Time" name="time">
	<br><br>

	<label>Update Completion Status:</label>
	<input type="radio" name="status" value="1">Complete
	<input type="radio" name="status" value="0">Incomplete
	<br><br>

	<input type="submit" name="submit" value="Save">
	<br><br>
</form>
<a href="index.php?action=list_todos">Return to Main Page</a>
<br><br>

<?php include '../View/footer.php'; ?>