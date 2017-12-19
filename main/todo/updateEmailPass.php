<?php 
session_start();
include '../View/header.php'; 
?>

<h1>Update Email and Password</h1>

<form action="index.php" method="post">
	<input type="hidden" name="action" value="updateEmailPass">

	<label class="title">Enter your current email:</label>
	<input type="" name="">
	
</form>

<?php include '../View/footer.php'; ?>