<?php

ob_start();
require 'common.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

$name = $row['name'];
$roll_no = $row['roll_no'];
$status = $row['status'];
$class = $row['class'];
$contact = $row['contact'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title> MY PROFILE </title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<div style="margin-bottom: 125px;">
	<?php require 'header.php'; ?>
</div>

<div style="text-align: center;">
	<img src="<?php echo("profile_pictures/"."'$name'"); ?>" class="img-responsive img-circle"><br>
	<form method="post" action="my_profile.php" enctype="multipart/form-data">
		<a>
			<button type="submit" class="btn btn-primary active"
				style="width: 25%; margin: 5px 2px 5px 2px;" name="post"> UPDATE PROFILE 
			</button>
		</a>
	</form><br>
	<center>
		<div class="table-responsive">
<?php 

	if ($status == 'mentor') {
		?>

		<table class="table table-bordered table-hover" style="width: 50%; text-align: center;">
			<tbody>
				<tr>
					<td><b> Name </b></td>
					<td> <?php echo "$name"; ?> </td>
				</tr>
				<tr>
					<td><b> Roll Number </b></td>
					<td> <?php echo "$roll_no"; ?> </td>
				</tr>
				<tr>
					<td><b> Status </b></td>
					<td> <?php echo "$status"; ?> </td>
				</tr>
				<tr>
					<td><b> Class </b></td>
					<td> <?php echo "$class"; ?> </td>
				</tr>
				<tr>
					<td><b> Contact </b></td>
					<td> <?php echo "$contact"; ?> </td>
				</tr>
			</tbody>
		</table>
		
		<?php
	} else {
		?>
		
		<table class="table table-bordered table-hover table-striped" style="width: 50%; text-align: center;">
			<tbody>
				<tr>
					<td><b> Name </b></td>
					<td> <?php echo "$name"; ?> </td>
				</tr>
				<tr>
					<td><b> Roll Number </b></td>
					<td> <?php echo "$roll_no"; ?> </td>
				</tr>
				<tr>
					<td><b> Status </b></td>
					<td> <?php echo "$status"; ?> </td>
				</tr>
				<tr>
					<td><b> Class </b></td>
					<td> <?php echo "$class"; ?> </td>
				</tr>
				<tr>
					<td><b> Contact </b></td>
					<td> <?php echo "$contact"; ?> </td>
				</tr>
			</tbody>
		</table>
	<?php
	}
	
?>
		</div>
	</center>
</div>

<center>
	<div style="text-align: center; width: 50%; margin-top: 50px;" class="jumbotron">
		<h3> Your Password is Safe and Encrypted </h3>
		<a data-toggle = "modal" data-target = "#change_password">
			<button type="submit" class="btn btn-primary" style="width: 50%; margin-top: 20px;"> CHANGE PASSWORD </button>
		</a>
	</div>
</center>

<div id="change_password" class="modal fade" role="dialog">
    <div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h3 class="modal-title" style="text-align: center;"> CHANGE PASSWORD </h3>
        	</div>
        	<form action="my_profile.php" method="POST" enctype="multipart/form-data">
        	<div class="modal-body">
            	
                	<div class="form-group">
						<input class="form-control" type="text" placeholder="Enter Your Old Password" name="old_password" required="true">
                	</div>
<?php
if (isset($_GET['error1'])) {
	echo $_GET['error1'];
?>
<script type="text/javascript"> $('#change_password').modal('show'); </script>
<?php
}
?>
                	<div class="form-group">
                			<input type="text" name="new_password" placeholder="Type New Password" class="form-control" required="true">
                	</div>
                	<div class="form-group">
                			<input type="text" name="retype_new_password" placeholder="Re-type New Password" class="form-control" required="true">
                	</div>
<?php
if (isset($_GET['error2'])) {
	echo $_GET['error2'];
?>
<script type="text/javascript"> $('#change_password').modal('show'); </script>
<?php
}
?>
            </div>
        	<div class="modal-footer" style="text-align: left;">
                <input type="submit" class="form-control btn btn-primary" name="submit" value="CHANGE" style="width: 75%;">
                <a href="#"> Forgot Password? </a>
            </div>
        	</form>
        </div>
    </div>
</div>

</body>
</html>


<?php

if (isset($_POST['submit'])) {
$old_password = $_POST['old_password'];
$old_password = MD5($old_password);
$old_password = mysqli_real_escape_string($con, $old_password);

$new_password = $_POST['new_password'];
$retype_new_password = $_POST['retype_new_password'];

$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($con, $query) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
	$obtained_password = $row['password'];
}

if ($obtained_password != $old_password) {
	
	$error = "<span class='red'>Your Password is Incorrect!</span>";
	header("location: my_profile.php?error1=$error");

} else {

	if ($new_password != $retype_new_password) {
	$error = "<span class='red'>Your Passwords doesn't match!</span>";
	header("location: my_profile.php?error2=$error");
	
	} else {

	$new_password = MD5($new_password);
	$query = "UPDATE users SET password = '$new_password' WHERE id = $user_id";
    mysqli_query($con, $query) or die(mysqli_error($con));
	header('location: my_profile.php');
	
	}

}

}

?>