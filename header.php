<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="post.php"> ECE </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['user_id'])) {
                    ?>
                    <li><a href = "my_profile.php"> <span class="glyphicon glyphicon-user"></span> My Profile </a></li>
                    <li><a href = "my_profile.php"><span class="glyphicon glyphicon-th"></span> Class </a></li>
                    <li><a href = "files.php"><span class="glyphicon glyphicon-file"></span> Files </a></li>
                    <?php
                } else {
                    ?>
                    <li class="dropdown show">
                        <a class="dropdown-toggle" id="dropdownMenu" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false" style="text-decoration: none; color: rgb(155, 150, 150); height: 20px;"><span class="glyphicon glyphicon-user"></span> Login <span class="glyphicon glyphicon-menu-down"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby = "dropdownMenu" style="background-color: black; text-align: center; width: 30px;">
                            <a href="register_student.php" class="dropdown-item" style="color: white; text-decoration: none;"> As Student 
                            </a><br>
                            <a href="register_mentor.php" class="dropdown-item" style="color: white; text-decoration: none;"> As Mentor
                            </a>
                        </div>
                    </li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>