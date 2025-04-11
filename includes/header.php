<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" alt="Library Management System" />
            </a>
        </div>
        
        <?php if($_SESSION['login']) { ?>
        <div class="user-welcome pull-right hidden-xs">
            <span>Welcome to Library Management System</span>
        </div>
        <?php } ?>
    </div>
</div>
<!-- LOGO HEADER END-->

<?php if($_SESSION['login']) { ?>    
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse">
                    <ul id="menu-top" class="nav navbar-nav">
                        <li><a href="dashboard.php" class="menu-top-active"><i class="fa fa-dashboard"></i> DASHBOARD</a></li>
                        <li><a href="issued-books.php"><i class="fa fa-book"></i> Issued Books</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">
                                <i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php"><i class="fa fa-lock"></i> Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="right-div">
                        <a href="logout.php" class="btn btn-danger"><i class="fa fa-power-off"></i> LOG OUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } else { ?>
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse">
                    <ul id="menu-top" class="nav navbar-nav">
                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="index.php#ulogin"><i class="fa fa-sign-in"></i> User Login</a></li>
                        <li><a href="signup.php"><i class="fa fa-user-plus"></i> User Signup</a></li>
                        <li><a href="adminlogin.php"><i class="fa fa-user-secret"></i> Admin Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>