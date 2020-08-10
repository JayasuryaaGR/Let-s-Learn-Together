<?php
ob_start();
require('common.php');
if (isset($_POST['upload'])) {
	$text = $_POST['textarea'];
	$trim_text = trim($text);
	$len_trim_text = strlen($trim_text);
	$file = $_FILES['file'];
	$name = $_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	$size = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$type = $_FILES['file']['type'];
	$ext = explode('.',$name);
	$actual_ext = strtolower(end($ext));
	$allowed = array('mp3', 'rar', 'zip', 'bin', 'vcd', 'xml', 'sql', 'mdb', 
		'email', 'eml', 'msg', 'apk', 'bin', 'com', 'exe', 'jar', 'py', 'pl', 
		'gif', 'jpg', 'jpeg', 'png', 'css', 'html', 'htm', 'js', 'jsp', 'php', 
		'xhtml', 'ppt', 'c', 'class', 'cpp', 'cs', 'h', 'java', 'vb', 'xls', 
		'tmp', 'mp4', 'mpg', 'mpeg', '3gp', '3g2', 'wmv', 'doc', 'docx',
		'rtf', 'tex', 'txt', 'docs', 'xlsx', 'pptx', 'avi', 'epub', 'pdf');
	if ($size > 0) {
		if (in_array($actual_ext, $allowed)) {
			if ($error === 0) {
				if ($size < 999999999999){
					move_uploaded_file($tmp, "files/".$name) or die($con);
					$session_user_id = $_SESSION['user_id'];
					$query = "INSERT INTO files(user_id,type,content,timestamp)
								VALUES('$session_user_id','$name','$trim_text',now()+'05:30')";
					$result = mysqli_query($con, $query);
					header('location: post.php');
				} else{
				?>
				<script type="text/javascript"> 
					alert("Your file is too big to upload!"); 
				</script>
				<?php
				}
		} else {
			?>
			<script type="text/javascript"> 
				alert("There was an error uploading this file"); 
			</script>
			<?php
			}
		} else {
		?>
		<script type="text/javascript"> 
			alert("Ooopsss!! Sorry!! Files of this format cannot be uploaded. Upload a file of commonly used formats. Choose atmost one File."); 
		</script>
		<?php
		}
	} else if ($len_trim_text > 0) {
		$session_user_id = $_SESSION['user_id'];
		$query = "INSERT INTO files(user_id,content,timestamp) 
								VALUES('$session_user_id','$trim_text',now())";
		$result = mysqli_query($con, $query);
		header('location: post.php');
	} else {
		header('location: post.php');
	}
}