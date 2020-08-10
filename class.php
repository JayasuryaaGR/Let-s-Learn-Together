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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="emojis/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="emojis/emojionearea.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<center>
<?php
    require 'header.php';
?>
<div class="jumbotron container" style="margin-top: 100px;">
    <h2> MENTORS </h2>
    <?php
        $query = "SELECT * FROM users WHERE status = 'mentor'";
        $result = mysqli_query($con,$query);

        while ($row = mysqli_fetch_array($result)) {
            $photo = $row['profile_photo'];
            ?>
            <div style="width: 90%; height: auto; margin-top: 20px; background-color: white; border: 1px solid black;">
                <img src="<?php echo("files/$photo"); ?>" class="img-responsive img-circle" alt = "" style="border-radius: 50%; border-style: solid; border-width: 1px; width: 120px; text-align: center; height: 120px; margin-top: 50px;"><br>
                <?php
                echo ($row['name']);
                ?>
            </div>
            <?php
        }
    ?>
</div>
<div class="jumbotron container" style="margin-top: 20px;">
    <h2> ECE G1 </h2>
    <?php
        $query = "SELECT * FROM users WHERE status = 'student' AND class = 'ECE G1'";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result)) {
            $photo = $row['profile_photo'];
            ?>
            <div style="width: 90%; height: auto; margin-top: 20px; background-color: white; border: 1px solid black;">
                <img src="<?php echo("files/$photo"); ?>" class="img-responsive img-circle" alt = "" style="border-radius: 50%; border-style: solid; border-width: 1px; width: 120px; text-align: center; height: 120px; margin-top: 50px;"><br>
                <?php
                echo ($row['name'] . "<br>");
                ?>
            </div>
            <?php
        }
    ?>
</div>
<div class="jumbotron container" style="margin-top: 20px;">
    <h2> ECE G2 </h2>
    <?php
        $query = "SELECT * FROM users WHERE class = 'ECE G2' AND status = 'student';";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result)) {
            $photo = $row['profile_photo'];
            ?>
            <div style="width: 90%; height: auto; margin-top: 20px; background-color: white; border: 1px solid black;">
                <img src="<?php echo("files/$photo"); ?>" class="img-responsive img-circle" alt = "" style="border-radius: 50%; border-style: solid; border-width: 1px; width: 120px; text-align: center; height: 120px; margin-top: 50px;"><br>
                <?php
                echo ($row['name'] . "<br>");
                ?>
            </div>
            <?php
        }
    ?>
</div>
</center>

</body>
</html>