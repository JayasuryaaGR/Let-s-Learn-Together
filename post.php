<?php
require('common.php');
if (!isset($_SESSION['user_id'])) {
	header("location:index.php");
}
?>

<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title> LET'S LEARN TOGETHER </title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<?php require('header.php'); ?>

<div style="text-align: center;">
<div class="row" style="margin-top: 75px; text-align: center;">
	
	<div class="col-xs-3"></div>
    <div class="col-xs-6" style="text-align: left; margin: 100px 0px 50px 0px;">
		<?php require 'files.php'; ?>
	</div>
	<!--<div class="col-xs-3">
		<h1><a href="common_files.php"> Common Files </a> </h1>
	</div>-->
</div>
<div class="container-fluid navbar-fixed-bottom" style="text-align: center;">
	<center>
		<a data-toggle = "modal" data-target = "#myModal">
			<button type="submit" class="btn btn-primary fixed_bottom"
				style="width: 50%; margin: 5px 0px 0px 0px;" name="post"> POST 
			</button>
		</a>
	</center>
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<h3 class="modal-title" style="text-align: center;"> POST </h3>
        	</div>
        	<form action="post_main.php" method="POST" enctype="multipart/form-data">
        	<div class="modal-body">
            	
                	<div class="form-group textarea">
						<textarea type="text" class="form-control" placeholder="Enter Your Message Here" name="textarea" id="emoji"></textarea>
                	</div>
<script>
	$(document).ready(function(){
		$("#emoji").emojioneArea({
			pickerPosition: "bottom"
		});
	});
</script>
                	<center>
                		<div class="form-group">
                			<input type="file" name="file" id="browse">
                		</div>
                	</center>
                
        	</div>
        	<div class="form-group">
                <input type="submit" class="form-control btn btn-primary btn-block" name="upload">
            </div>
        </form>
        </div>
    </div>
</div>

</body>
</html>