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
<!-- 
	first name, last name, email, phone, birthday, gender (radio), password
-->

	<h1 class="title">Sign Up Page<br></h1>
		<div class="container" style="height: 670px;">
			<div class="formRadio">
				<form action="register_script.php" method="post">

					<label>Enter your first name:</label>
					<br>
					<input type="text" name="fname">
					<br>

					<label>Enter your last name:</label>
					<input type="text" name="lname">
					<br>
					
					<label>Email Address:</label>
					<input type="email" name="email">
					<br>
					
					<label>Phone Number:</label>
					<input type="phone" name="phone">
					<br>
					
					<label>Enter your birthday:</label>
					<input type="birthday" name="birthday">
					<br>
					
					<label>Gender: </label>
						<label>Male<input type="radio" name="male" value="male"></label>
						<label>Female<input type="radio" name="female" value="female"></label>
						<label>Other<input type="radio" name="other" value="other"></label>
						<br>
					<br>
					<label>Enter a password:</label>
					<input type="password" name="password">
					<br>
					
					<input type="submit" name="submit" value="Register">
				</form>
				<p>Already have an account? <a href="sign_in.php">Sign In</a></p>
			</div>
		</div>
	</div>
	<footer class="footer">
		<p>&copy; <?php echo date("Y"); ?> Developed by Kevin Solorzano | NJIT.</p>
	</footer> 
</body>
</html>