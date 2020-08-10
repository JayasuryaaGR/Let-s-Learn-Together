<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title> LET'S LEARN TOGETHER </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<?php
require 'header.php';
?>
<center>
<div class="container">
<div class="panel panel-primary" style="margin-top: 100px;">
    <div class="panel-heading">
        <h1> REGISTER </h1>
    </div>
    <div class="panel-body">
<form action="register_script.php" method="POST">
    <div class="form-group">
        <b>Name:</b><br> <input placeholder="Name" name="name" required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$" style="width: 90%;">
    </div><br><br>
    <div class="form-group">
        <b>Status:</b><br> <input type="radio" name="status" value="Student" required = "true" id="student"> Student<br>
        <input type="radio" name="status" value="Mentor" required = "true" id="mentor"> Mentor
    </div><br><br>
    <div class="form-group" style="width: 75%;">
       <b>Roll No (If Student) :</b><br> 19L<input type="number" maxlength="3" minlength="3" size="3" name="roll_no" required = "true" style="width: 75%;" id="roll_no">
    </div><br><br>
<script type="text/javascript">
    var inp1 = document.getElementById("mentor");
    inp1.oninput = function () {
        document.getElementById("roll_no").disabled = this.value!="";
    };
    var inp2 = document.getElementById("student");
    inp2.oninput = function () {
        document.getElementById("roll_no").disabled = false;
    }
</script>
    <div class="form-group">
        <b>Class:</b><br> <input type="radio" name="class" value="ECE G1" required = "true"> ECE G1 <br>  
        <input type="radio" name="class" value="ECE G2" required = "true"> ECE G2
    </div><br><br>
    <div class="form-group">
        <b>Password:</b><br> <input type="password" placeholder="Password" name="password" required = "true" style="width: 90%;">
    </div><br><br>
    <div class="form-group">
        <b>Confirm Password:</b><br> <input type="password" placeholder="Password" name="retype_password" required = "true" style="width: 90%;">
    </div><br><br>
    <div class="form-group">
<?php 
if (isset($_GET['m2'])) {
    echo $_GET['m2'];
}
?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 95%;">Submit</button>
</form>
</div>
</div>
</div>
</center>
</body>
<footer class="footer fixed-bottom" style="text-align: center; background-color: black; width: 100%; height: 45px; color: white;">
    <div style="padding-top: 5px;">
        <h4> LLT | ECE | PSG College of Technology </h4>
    </div>
</footer>
</html>