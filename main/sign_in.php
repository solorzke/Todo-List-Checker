<!DOCTYPE html>
<html>
<head>
	<title>Project | Sign In</title>
</head>
<body>

	<main>
		<h1>Sign In</h1>
		<form action="login_script.php" method="post">

			<label>Email:</label>
			<input type="email" name="email">
			<br>

			<label>Password:</label>
			<input type="password" name="password">

			<input type="submit" value="Login" name="login">
			<br>
		</form>
		<p>Don't have an account? <a href="register.php">Register Now</a></p>
	</main>

</body>
</html>