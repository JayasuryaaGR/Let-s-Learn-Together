<?php
require('common.php');
if (isset($_SESSION['user_id'])) {
	//header('location:post.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Let's Learn Together</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> LET'S LEARN TOGETHER </title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
</head>
<body>

<?php
require('header.php');
?>



<footer class="footer fixed-bottom" style="text-align: center; background-color: black; width: 100%; height: 45px; color: white;">
	<h4> ECE | PSG College of Technology </h4>
</footer>

</body>
</html>