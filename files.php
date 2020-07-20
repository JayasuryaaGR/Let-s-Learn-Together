<?php

ob_start();

$query = "SELECT * FROM files ORDER BY id DESC";
$result = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($result)){

	$user_id = $row['user_id'];
	$name = $row['type'];
	$strlen_name = strlen($name);
	$file_id = $row['id'];
	$text = $row['content'];

	$ext = explode('.',$name);
	$actual_ext = strtolower(end($ext));

?>

<div style="border: hidden black 1px; width: 75%; background-color: rgb(236,255,230);">

<?php

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
<br><br><br><br>

<?php
} else {
?>

	<p><?php echo "$text"; ?></p>
</div>
<br><br><br><br>

<?php
}

}