<?php
$con = mysqli_connect("localhost", "root", "", "test")or die($mysqli_error($con));
mysqli_set_charset($con ,'utf8');

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

header('Content-Type: text/html; charset=utf-8');
mysqli_query($con,"SET CHARSET SET utf8");
mysqli_query($con,"SET CHARSET utf8");
mysqli_query($con,"SET COLLATION_CONNECTION = 'utf8_general_ci'");
?>

<!DOCTYPE html>
<html>
<head>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta charset="UTF-8">
    <title> TEST </title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>


<form method="POST" action="test.php" accept-charset="UTF-8">
	<textarea class="form-control" placeholder="Enter Your Message Here" name="textarea" id="emoji" style="width: 75%; height: 150px;"></textarea>
<script>
	$(document).ready(function(){
		$("#emoji").emojioneArea({
			pickerPosition: "bottom"
		});
	});
</script>
<button class="btn btn-primary" type="submit" name="submit"> Submit </button>
</form>

</body>
</html>

<?php

if (isset($_POST['submit'])) {

$name = $_POST['textarea'];

$query = "INSERT INTO test(test) VALUES('$name')";
$result = mysqli_query($con,$query);
}

?>