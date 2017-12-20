<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todo Sign In Page</title>
	<link rel="icon" href="https://static.yocket.in/images/universities/logos/njit_logo.jpg">
	<link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body>
	<div class="wrapper">
<h1 class="title">Change Password</h1>
	<div class="container" id="contain" style="height: 470px;">
		<div class="formRadio" style="height: 470px;">
			<form action="changePass_script.php" method="post">

				<label>Enter your Email address:</label>
				<input type="email" name="currentEmail">
				<br>

				<label>Enter your current password:</label>
				<input type="password" name="currentPassword">
				<br>

				<label>Enter new password:</label>
				<input type="password" name="newPassword">
				<br>

				<label>Enter new password again:</label>
				<input type="password" name="newPasswordAgain">
				<br>

				<input type="submit" name="submit" value="Update">
			</form>
		</div>
	</div>
</div>
<footer class="footer">
		<p>&copy; <?php echo date("Y"); ?> Developed by Kevin Solorzano | NJIT.</p>
	</footer> 
</body>
</html>