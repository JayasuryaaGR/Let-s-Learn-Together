<?php
require('common.php');

if (!isset($_SESSION['user_id'])) {
	header('location:index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title> POSTS </title>
</head>
<body>

<?php require 'files.php'; ?>

</body>
</html>