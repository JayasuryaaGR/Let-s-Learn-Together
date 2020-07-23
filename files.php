<?php

ob_start();

$query = "SELECT * FROM files ORDER BY id DESC";
$result = mysqli_query($con,$query);

$user_id2 = $_SESSION['user_id'];
$status = $_SESSION['status'];
$class = $_SESSION['class'];
$name2 = $_SESSION['name'];

while ($row = mysqli_fetch_array($result)){

	$user_id = $row['user_id'];
	$name = $row['type'];
	$strlen_name = strlen($name);
	$file_id = $row['id'];
	$text = $row['content'];

	$ext = explode('.',$name);
	$actual_ext = strtolower(end($ext));

if ($user_id2 == $user_id) {
	?>
	<div class="panel panel-primary" style="width: 75%; float: left;">
		<div class="panel-heading">
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
	<div class="panel panel-info" style="width: 75%; float: right;">
		<div class="panel-heading">
			Panel Heading
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
	Hello
</div>

</div>
<?php
}
?>

