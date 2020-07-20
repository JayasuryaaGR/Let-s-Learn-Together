<!DOCTYPE html>
<html>
<head>
	<title> Register Page </title>
</head>
<body>

<form  action="register_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Roll Number" name="roll_no" required = "true">
                                <?php 
                                    if (isset($_GET['m1']))
                                {
                                    echo $_GET['m1'];
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required = "true">
                                <?php 
                                    if (isset($_GET['m2']))
                                {
                                    echo $_GET['m2'];
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Class Eg: ECE G1" name="class" required = "true">
                            </div>
                         
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
</form>







</body>
</html>