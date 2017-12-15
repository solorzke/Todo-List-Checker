<?php include '../View/header.php'; ?>
<!-- 
	first name, last name, email, phone, birthday, gender (radio), password
-->
<main>
	<h1>Sign Up Page<br></h1>
	<p>Enter the following information</p>
	<form action="register_script.php" method="post">

		<label>Enter your first name:</label>
		<input type="text" name="fname">
		<br>

		<label>Enter your last name:</label>
		<input type="text" name="lname">
		<br>
		
		<label>Enter your email:</label>
		<input type="email" name="email">
		<br>
		
		<label>Enter your phone number:</label>
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
		
		<label>Enter a password:</label>
		<input type="password" name="password">
		<br>
		
		<input type="submit" name="submit" value="Register">

	</form>
	<p>Already have an account? <a href="sign_in.php">Sign In</a></p>
</main>
<?php include '../View/footer.php'; ?>