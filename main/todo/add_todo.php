<?php include '../View/header.php'; ?>

<h1>Add A New Todo Assignment</h1>
<br>
<h2>Enter the information below.</h2>

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
	<input type="Date" name="date">
	<br><br>

	<label>Enter Time of Due Date:</label>
	<br>
	<input type="Time" name="time">
	<br><br>
	<input type="submit" name="submit" value="Submit">
	<br><br>
</form>
<a href="index.php?action=list_todos">Return to Main Page</a>
<br><br>

<?php $se = $_POST['date']; 
	  $arr = explode('-', $se);
	  $arr2 = explode(':', $_POST['time']);
	  $d = mktime($arr2[0], $arr2[1], $arr2[2], $arr[1], $arr[2], $arr[0]);
	  //echo $_POST['date'];
	  //echo $arr[0];
	  //echo '\n'.$arr[1];
	  //echo '\n'.$arr[2];
	  //echo 	$date = date('Y-m-d H:i:s', strtotime('2017'));
	  $date = date('Y-m-d H:i:s', $d);
	  echo $date;
;





?>
<?php include '../View/footer.php'; ?>