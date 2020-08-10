<?php
require('common.php');
if (isset($_SESSION['user_id'])) {
	header('location:post.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<title>Let's Learn Together</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
	require 'header.php';
?><br><br>
<center>
<div class="container">
	<div class="jumbotron">
		<h1> Login </h1><br> <h2> or </h2> <br> <h1> Register </h1><br> <h2> to get access!!! </h2><br> <h4> <b>The links are in the header</b> </h4>
	</div>
</div>
</center>
<footer class="footer fixed-bottom" style="text-align: center; background-color: black; width: 100%; height: 45px; color: white;">
	<div style="padding-top: 5px;">
		<h4> LLT | ECE | PSG College of Technology </h4>
	</div>
</footer>
</body>
</html>