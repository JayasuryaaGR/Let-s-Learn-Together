<?php
require('common.php');
$session_user_id = $_SESSION['user_id'];
$query = "SELECT * FROM files WHERE user_id = $session_user_id";
$result = mysqli_query($con,$query);
echo"<h1> MY Files </h1>";
while ($row = mysqli_fetch_array($result)){
	$user_id = $row['user_id'];
	$name = $row['type'];
	$file_id = $row['id'];
?>
	<a href="files/<?php echo $name; ?>"><?php echo "$name"; ?></a> 
	<br><br>
<?php
}
?>