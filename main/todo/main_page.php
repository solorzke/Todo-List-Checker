<?php
session_start();
//require('Model/user_db.php');
//require('Model/todo_db.php');

/*
if(!isset($_SESSION['email']) || !isset($_SESSION['id'])){
	header("Location: Location: https://web.njit.edu/~kas58/is218_Project/main/sign_in.php");
}
*/
//$userf = UserDB::getUser($_SESSION['id']);
//$_SESSION['userInfo'] = $userf;
include '../View/header.php';
?>
	<h1>Welcome <?php echo "{$_SESSION['userInfo']->getFname()} {$_SESSION['userInfo']->getLname()}"; ?> </h1>
	<p>Your birthday is on: <?php echo "{$_SESSION['userInfo']->getBirthday()}"?></p>
	<h2>To-Do List: Incomplete</h2>
	<table>
		<tr>
			<th>Email</th>
			<th>User ID</th>
			<th>Date Created</th>
			<th>Due Date</th>
			<th>Message</th>
			<th>Is Done</th>
		</tr>
		<?php foreach ($categories as $category) : ?>
		<tr>
			<?php if($category[6] >= 1) continue;?>
			<td> <?php echo $category[1]; ?> </td>
			<td> <?php echo $category[2]; ?> </td>
			<td> <?php echo $category[3]; ?> </td>
			<td> <?php echo $category[4]; ?> </td>
			<td> <?php echo $category[5]; ?> </td>
			<td> <?php echo $category[6]; ?> </td>
		</tr>
		<?php endforeach; ?>
	</table>
	<br>
	<h2>To-Do List: Complete</h2>
	<table>
		<tr>
			<th>Email</th>
			<th>User ID</th>
			<th>Date Created</th>
			<th>Due Date</th>
			<th>Message</th>
			<th>Is Done</th>
		</tr>
		<?php foreach ($categories as $category) : ?>
		<tr>
			<?php if($category[6] == 0) continue;?>
			<td> <?php echo $category[1]; ?> </td>
			<td> <?php echo $category[2]; ?> </td>
			<td> <?php echo $category[3]; ?> </td>
			<td> <?php echo $category[4]; ?> </td>
			<td> <?php echo $category[5]; ?> </td>
			<td> <?php echo $category[6]; ?> </td>
		</tr>
		<?php endforeach; ?>
	</table>
	<form action="index.php?action=add_todo_form" method="post">
		<input type="submit" name="add" value="Add New Entry">
	</form>
<?php include '../View/footer.php'; ?>