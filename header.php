<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="post.php"><span class="glyphicon glyphicon-home"></span> ECE </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if (!isset($_SESSION['user_id'])) {
                        ?>
                        <li style="text-align: center;"><a href = "login.php"><span class="glyphicon glyphicon-share"></span> Login </a></li>
                        <li style="text-align: center;"><a href = "register.php"><span class="glyphicon glyphicon-edit"></span> Register </a></li>
                <?php
                    } else {
                ?>
                <li style="text-align: center;"><a href = "my_profile.php"><span class="glyphicon glyphicon-user"></span> My Profile </a></li>
                <li style="text-align: center;"><a href = "class.php"><span class="glyphicon glyphicon-th"></span> Class </a></li>
                <li class="dropdown" style="text-align: center;">
                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-new-window"></span> Websites <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li style="text-align: center;"><a href="http://www.psgtech.edu" class="dropdown-item" target="_blank"> Official </a></li>
                        <li style="text-align: center;"><a href="https://ecampus.psgtech.ac.in/studzone2/AttWfLoginPage.aspx" class="dropdown-item" target="_blank" style="text-align: center;"> Stud Zone </a></li>
                    </ul>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>