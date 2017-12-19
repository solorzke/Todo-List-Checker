<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Todo Sign In Page</title>
	<link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body>
	<div class="wrapper">
		<div class="title"><h1>Todo Sign In</h1></div>
		<div class="container">
			<div class="left"></div>
			<div class="right">
				<div class="formBox">
					<form action="login_script.php" method="post">
						<label>Email:</label>
						<br>
						<input type="email" name="email">
						<br>

						<br>
						<label>Password:</label>
						<br>
						<input type="password" name="password">

						<input type="submit" value="Login" name="login">
						<br>
						<p>Don't have an account? <a href="register.php">Register Now</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<p>&copy; <?php echo date("Y"); ?> Developed by Kevin Solorzano | NJIT.</p>
	</footer> 
</body>
</html>