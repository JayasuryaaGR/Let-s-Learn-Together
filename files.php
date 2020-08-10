<?php
ob_start();
$query = "SELECT * FROM files ORDER BY id DESC";
$result = mysqli_query($con,$query);
$querys = "SELECT * FROM files ORDER BY id DESC";
$results = mysqli_query($con,$query);
while ($rows = mysqli_fetch_array($results)) {
	$maxid = $rows['id'];
	$maxuid = $rows['user_id'];
	break;
}
$user_id2 = $_SESSION['user_id'];
$status = $_SESSION['status'];
$count = 0;
while ($row = mysqli_fetch_array($result)){
	$user_id = $row['user_id'];
	$name = $row['type'];
	$strlen_name = strlen($name);
	$file_id = $row['id'];
	$text = $row['content'];
	$text = trim($text);
	$query2 = "SELECT * FROM users WHERE id = $user_id";
	$result2 = mysqli_query($con,$query2);
	$row2 = mysqli_fetch_array($result2);
	$class = $row2['class'];
	$name2 = $row2['name'];
	$status = $row2['status'];
	$datetime = $row['timestamp'];
	$date = date("d M Y, D", strtotime($datetime));
	$time = date("h:i a", strtotime($datetime));
	$ext = explode('.',$name);
	$actual_ext = strtolower(end($ext));
if ($user_id2 == $user_id) {
	?>
	<div class="panel panel-info" style="width: 75%; float: right;">
		<div class="panel-heading" style="height: 40px;">
			<div style="float: left;">
				<?php
				if ($status == 'student') {
					echo "$class";
				} elseif ($status == 'mentor') {
					echo "Mentor";
				}
				?>
			</div>
			<div style="float: right;">
				<?php echo "$name2"; ?>
			</div>
		</div>
		<div class="panel-body">
<?php
} else {
	?>
	<div class="panel panel-primary" style="width: 75%; float: left;">
		<div class="panel-heading" style="height: 40px;">
			<div style="float: left;">
				<?php
				if ($status == 'student') {
					echo "$class";
				} elseif ($status == 'mentor') {
					echo "Mentor";
				}
				?>
			</div>
			<div style="float: right;">
				<?php
				if ($status == 'student') {
					echo "$name2";
				} elseif ($status == 'mentor') {
					echo "$name2";
				}
				?>
			</div>
		</div>
		<div class="panel-body">
		<?php
}

if ($strlen_name > 0){
	if ($actual_ext == 'pdf') {
		?> <img src="icons/pdf.png" style="zoom: 5%;"> <?php
	} else if($actual_ext == 'mp3'){
		?> <img src="icons/mp3.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext=='doc' || $actual_ext=='docx' || $actual_ext=='docs') {
		?> <img src="icons/document.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext == 'png') {
		?> <img src="icons/png.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext=='jpg' || $actual_ext=='jpeg' || $actual_ext=='gif') {
		?> <img src="icons/jpg.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext == 'mp4'||$actual_ext == 'wmv'||$actual_ext == 'avi') {
		?> <img src="icons/mp4.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext == 'ppt' || $actual_ext == 'pptx') {
		?> <img src="icons/powerpoint.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext == 'xls' || $actual_ext == 'xlsx') {
		?> <img src="icons/xls.png" style="zoom: 5%;"> <?php
	} else if ($actual_ext == 'zip' || $actual_ext == 'rar') {
		?> <img src="icons/zip.png" style="zoom: 5%;"> <?php
	} else {
		?> <img src="icons/txt.png" style="zoom: 5%;"> <?php
	}

?>
	<a style="color: blue; text-decoration: none;" href="files/<?php echo($name); ?>"><?php echo"$name"; ?></a><br><br>
	<p><?php echo"$text"; ?></p>
	</div>
<?php
} else {
?>
	<p><?php echo "$text"; ?></p>
</div>
<?php
}
?>
<div class="panel-footer">
	<?php echo ("$date"); ?>
	<?php
	if (($user_id2 == $user_id) && ($file_id == $maxid)) {
		?>
		<form style="float: right; margin-top: -7px;" method="post" action="post.php">
			<?php echo "$time"; ?>
			<button class="btn btn-default" name="delete"> Delete </button>
		</form>
	<?php
	} else {
		?>
		<div style="float: right; margin-top: -7px;">
		<?php echo "$time"; ?>
		</div>
		<?php
	}
	?>
</div>
</div>
<?php
}
if (isset($_POST['delete'])) {
	$query3 = "DELETE FROM files WHERE id = $maxid";
	$result3 = mysqli_query($con, $query3);
	header('location: post.php');
}
?>