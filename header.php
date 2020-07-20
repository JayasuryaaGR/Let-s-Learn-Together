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
                    <li><a href = "test.php"><span class="glyphicon glyphicon-file"></span> Test </a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register </a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>