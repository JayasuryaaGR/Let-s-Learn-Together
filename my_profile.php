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
$photo = $row['profile_photo'];
$password = $row['password'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title> MY PROFILE </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div style="margin-bottom: 100px;">
	<?php require 'header.php'; ?>
</div>
<center>
<div>
	<img src="<?php echo("files/$photo"); ?>" class="img-responsive img-circle" alt = "" style="border-radius: 50%; border-style: solid; border-width: 1px; width: 120px; text-align: center; height: 120px; margin-top: 50px;"><br>
	<form method="post" action="my_profile.php" enctype="multipart/form-data">
		<a data-toggle = "modal" data-target = #update>
			<button type="submit" class="btn btn-primary active"
				style="width: 50%; margin: 5px 2px 5px 2px;" name="update"> UPDATE<br>PROFILE 
			</button>
		</a>
	</form><br>
		<div class="table-responsive container">
<?php 
	if ($status == 'mentor') {
		?>
		<table class="table table-bordered table-hover" style="width: 75%; text-align: center;">
			<tbody>
				<tr>
					<td><b> Name </b></td>
					<td> <?php echo "$name"; ?> </td>
				</tr>
				<tr>
					<td><b> Status </b></td>
					<td> <?php echo "$status"; ?> </td>
				</tr>
				<tr>
                    <td><b> Handling for the Class </b></td>
                    <td> <?php echo "$class"; ?> </td>
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
			</tbody>
		</table>
	<?php
	}
?>
</div>
</div>
	<div style="text-align: center; margin-top: 50px;" class="jumbotron container"><h3> Your Password is Safe and Encrypted </h3>
		<a data-toggle = "modal" data-target = "#changepassword">
			<button type="submit" class="btn btn-primary" style="width: 50%; margin-top: 20px;"> CHANGE<br>PASSWORD </button>
		</a>
	</div>
</center>
<div id="changepassword" class="modal fade" role="dialog">
    <div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h3 class="modal-title" style="text-align: center;"> CHANGE PASSWORD </h3>
        	</div>
        	<form action="my_profile.php" method="POST" enctype="multipart/form-data">
        	<div class="modal-body">
            <div class="form-group">
				<input class="form-control" type="password" placeholder="Enter Your Old Password" name="old_password" required="true">
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
                			<input type="password" name="new_password" placeholder="Type New Password" class="form-control" required="true">
                	</div>
                	<div class="form-group">
                			<input type="password" name="retype_new_password" placeholder="Re-type New Password" class="form-control" required="true">
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
                <a href="forgot.php"> Forgot Password? </a>
            </div>
        	</form>
        </div>
    </div>
</div>
<div id="update" class="modal fade" role="dialog">
    <div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h3 class="modal-title" style="text-align: center;"> UPDATE PROFILE </h3>
        	</div>
        	<form action="my_profile.php" method="POST" enctype="multipart/form-data">
        	<div class="modal-body">
                <div class="form-group">
					<b>Profile Picture:</b> <input type="file" name="file">
            	</div>
            	<div class="form-group">
            		<b>Name:</b> <input type="text" name="names" placeholder="Enter Your Name">
               	</div>
               	<div class="form-group">
                    <b>Status:</b> <input type="radio" name="statuss" value="Student" id="student"> Student
                    <input type="radio" name="statuss" value="Mentor" id="mentor"> Mentor
                </div>
                <div class="form-group" style="width: 75%;">
                    <b>Roll No:</b> 19L<input type="number" maxlength="3" minlength="3" size="3" name="roll_nos" style="width: 50px;" id="roll_no">
<?php 
if (isset($_GET['errors'])) {
    echo $_GET['errors'];
}
?>
                </div>
<script type="text/javascript">
    var inp1 = document.getElementById("mentor");
    inp1.oninput = function () {
        document.getElementById("roll_no").disabled = this.value!="";
    };
    var inp2 = document.getElementById("student");
    inp2.oninput = function () {
        document.getElementById("roll_no").disabled = false;
    }
</script>
            </div>
            <div class="form-group">
                <b>Class:</b> <input type="radio" name="classs" value="ECE G1"> ECE G1   
                <input type="radio" name="classs" value="ECE G2"> ECE G2
            </div>
        	<div class="modal-footer" style="text-align: left;">
                <input type="submit" class="form-control btn btn-primary" name="change" value="CHANGE" style="width: 75%;">
            </div>
        	</form>
        </div>
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
if (strlen($new_password) >= 6) {
if ($obtained_password != $old_password) {
	?>
        <script type="text/javascript">
            alert("Old Password that You Entered is incorrect!!")
        </script>
    <?php
} else {
	if ($new_password != $retype_new_password) {
	?>
        <script type="text/javascript">
            alert("Confirmation Password and the New Password did not match!!")
        </script>
    <?php
	} else {
	$new_password = MD5($new_password);
	$query = "UPDATE users SET password = '$new_password' WHERE id = $user_id";
    mysqli_query($con, $query) or die(mysqli_error($con));
	?>
        <script type="text/javascript">
            alert("Your Password changed successfully!!!")
        </script>
    <?php
	}

} 
} else {
    ?>
        <script type="text/javascript">
            alert("Password must be atleast SIX characters long for safety!!")
        </script>
    <?php
}
}
if (isset($_POST['change'])) {
    $count = 1000;
    $file = $_FILES['file'];
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $type = $_FILES['file']['type'];
    $ext = explode('.',$name);
    $actual_ext = strtolower(end($ext));
    $allowed = array('jpg', 'jpeg', 'png');
    if ($size > 0) {
        if (in_array($actual_ext, $allowed)) {
            if ($error === 0) {
                if ($size < 999999999999){
                    move_uploaded_file($tmp, "files/".$name) or die($con);
                    $session_user_id = $_SESSION['user_id'];
                    $query = "UPDATE users SET profile_photo = '$name' WHERE id = $user_id";
                    $result = mysqli_query($con, $query);
                    
                    header('location: my_profile.php');
                } else{
                    $count = -1000;
                ?>
                <script type="text/javascript"> 
                    alert("Your File is too Big to Upload!!!"); 
                </script>
                <?php
                }
            } else {
                $count = -1000;
            ?>
            <script type="text/javascript"> 
                alert("There was an Error Uploading this File!!!"); 
            </script>
            <?php
            }
        } else {
            $count = -1000;
        ?>
        <script type="text/javascript"> 
            alert("Ooopsss!! Sorryyy!! Files of this format cannot be uploaded. Upload a file of formats 'jpg' or 'jpeg' or 'png'. Choose atmost one File."); 
        </script>
        <?php
        }
    }
if (isset($_POST['names'])) {
    if (strlen($_POST['names']) > 0){
        $names = $_POST['names'];
        $names = mysqli_real_escape_string($con, $names);
        $query = "UPDATE users SET name = '$names' WHERE id = $user_id";
        mysqli_query($con, $query) or die(mysqli_error($con));
        $_SESSION['name'] = $names;
    }
  }
if (isset($_POST['statuss'])) {
    $statuss = $_POST['statuss'];
    $statuss = mysqli_real_escape_string($con, $statuss);
    $query = "UPDATE users SET status = '$statuss' WHERE id = $user_id";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $_SESSION['status'] = $statuss;
}
if (isset($_POST['roll_nos'])) {
    if (strlen($_POST['roll_nos']) > 0) {
        if (strlen($_POST['roll_nos']) == 3) {
            $roll_nos = $_POST['roll_nos'];
            $roll_nos = mysqli_real_escape_string($con, $roll_nos);
            $query = "UPDATE users SET roll_no = '$roll_nos' WHERE id = $user_id";
            mysqli_query($con, $query) or die(mysqli_error($con));
            $_SESSION['roll_no'] = $roll_nos;
        } else {
            $errors = "<span class='red'>Your Roll Number is Invalid!</span>";
            header("location: my_profile.php?errors=$errors");
        }
    }
}
if (isset($_POST['classs'])) {
    $classs = $_POST['classs'];
    $classs = mysqli_real_escape_string($con, $classs);
    $query = "UPDATE users SET class = '$classs' WHERE id = $user_id";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $_SESSION['class'] = $classs;
}
    if ($count > 0) {
        header('location: my_profile.php');
    }
}
?>