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
	<h1 class="title">Welcome <?php echo "{$_SESSION['userInfo']->getFname()} {$_SESSION['userInfo']->getLname()}"; ?> </h1>
	<h2 class="title">To-Do List: Incomplete</h2>
	<table class="tb1">
		<tr>
			<th>Date Created</th>
			<th>Due Date</th>
			<th>Message</th>
			<th>Complete?</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>			
		</tr>
		<?php foreach ($categories as $category) : ?>
		<tr>
			<?php if($category[6] >= 1) continue;?> <!-- checks for complete or incomplete todos -->
			<td> <?php echo $category[3]; ?> </td>
			<td> <?php echo $category[4]; ?> </td>
			<td> <?php echo $category[5]; ?> </td>
			<td class="check"> 
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="checkOff">
					<input type="hidden" name="id" value="<?php echo $category[0]; ?>">
					<input type="checkbox" name="checkbox" value="1" onchange="this.form.submit()"> 
				</form>
			</td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="delete_todo">
					<input type="hidden" name="todo_id" value="<?php echo $category[0]; ?>"> <!-- returns todo token -->
					<input type="submit" name="submit" value="Delete">
				</form>
			</td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="edit_todo_form">
					<input type="hidden" name="id" value="<?php echo $category[0]; ?>"> <!-- returns todo token -->
					<input type="hidden" name="email" value="<?php echo $category[1]; ?>">
					<input type="hidden" name="userID" value="<?php echo $category[2]; ?>">
					<input type="hidden" name="dateCreated" value="<?php echo $category[3]; ?>">
					<input type="hidden" name="dueDate" value="<?php echo $category[4]; ?>">
					<input type="hidden" name="message" value="<?php echo $category[5]; ?>">
					<input type="hidden" name="isDone" value="<?php echo $category[6]; ?>">
					<input type="submit" name="submit" value="Edit">
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<br>
	<h2 class="title">To-Do List: Complete</h2>
	<table>
		<tr>
			<th>Date Created</th>
			<th>Due Date</th>
			<th>Message</th>
			<th>Incomplete?</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php foreach ($categories as $category) : ?>
		<tr>
			<?php if($category[6] == 0) continue;?>
			<td> <?php echo $category[3]; ?> </td>
			<td> <?php echo $category[4]; ?> </td>
			<td> <?php echo $category[5]; ?> </td>
			<td class="check"> 
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="checkOff"> 
					<input type="hidden" name="id" value="<?php echo $category[0]; ?>">
					<input type="checkbox" name="checkbox" value="0" onchange="this.form.submit()"> 
				</form>
			</td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="delete_todo">
					<input type="hidden" name="todo_id" value="<?php echo $category[0]; ?>"> <!-- returns todo token -->
					<input type="submit" name="submit" value="Delete">
				</form>
			</td>
			<td>
				<form action="index.php" method="post">
					<input type="hidden" name="action" value="edit_todo_form">
					<input type="hidden" name="id" value="<?php echo $category[0]; ?>"> <!-- returns todo token -->
					<input type="hidden" name="email" value="<?php echo $category[1]; ?>">
					<input type="hidden" name="userID" value="<?php echo $category[2]; ?>">
					<input type="hidden" name="dateCreated" value="<?php echo $category[3]; ?>">
					<input type="hidden" name="dueDate" value="<?php echo $category[4]; ?>">
					<input type="hidden" name="message" value="<?php echo $category[5]; ?>">
					<input type="hidden" name="isDone" value="<?php echo $category[6]; ?>">
					<input type="submit" name="submit" value="Edit">
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>

	<!--
	<form action="index.php?action=add_todo_form" method="post">
		<input type="submit" name="add" value="Add New Entry">
	</form>
-->
<?php include '../View/footer.php'; ?>