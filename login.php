<?php
if (isset($_SESSION['user_id'])) {
	header('location:LLT.php');
} else{
	require('common.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Page </title>
</head>
<body>

<form method="post" action="login_script.php">
	<input type="text" name="name" placeholder="Name"><br>
	<input type="text" name="roll_no" placeholder="Roll Number"><br>
	<input type="password" name="password" placeholder="Password"> <br>

<?php
if (isset($_GET['error'])) {
	echo $_GET['error'];
}
?>
	<br><input type="submit" name="submit" value="SUBMIT">
</form>



</body>
</html>