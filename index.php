<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{

$email=$_POST['emailid'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['stdid']=$result->StudentId;
if($result->Status==1)
{
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css' />
    <style>
        .content-wrapper {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            padding: 40px 0;
        }
        .carousel-container {
            margin-bottom: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .carousel-inner img {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }
        .login-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            padding: 0;
            overflow: hidden;
            margin-bottom: 40px;
        }
        .login-section-left {
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            color: white;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }
        .login-section-left h2 {
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .login-section-left p {
            opacity: 0.9;
        }
        .login-section-right {
            padding: 40px;
            background: white;
        }
        .login-header {
            margin-bottom: 30px;
            text-align: center;
        }
        .login-header h3 {
            font-weight: 600;
            color: #333;
        }
        .login-header p {
            color: #777;
        }
        .login-form .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        .login-form .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
            display: inline-block;
        }
        .login-form .form-control {
            height: 45px;
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ddd;
            padding-left: 15px;
            transition: all 0.3s;
        }
        .login-form .form-control:focus {
            border-color: #3a7bd5;
            box-shadow: 0 0 5px rgba(58, 123, 213, 0.3);
        }
        .login-form .input-icon {
            position: absolute;
            top: 43px;
            right: 15px;
            color: #aaa;
        }
        .login-form .btn-login {
            background: linear-gradient(135deg, #3a7bd5, #00d2ff);
            border: none;
            color: white;
            border-radius: 5px;
            padding: 12px 20px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        .login-form .btn-login:hover {
            box-shadow: 0 5px 15px rgba(58, 123, 213, 0.4);
            transform: translateY(-2px);
        }
        .login-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .login-footer a {
            color: #3a7bd5;
            font-weight: 500;
            transition: all 0.3s;
        }
        .login-footer a:hover {
            color: #2061b3;
            text-decoration: none;
        }
        .features-section {
            margin-top: 30px;
        }
        .feature-box {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 36px;
            color: #3a7bd5;
            margin-bottom: 15px;
        }
        .feature-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }
        @media (max-width: 767px) {
            .login-section-left {
                display: none;
            }
            .carousel-inner img {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <!--Slider---->
            <div class="row">
                <div class="col-md-10 col-md-offset-1 carousel-container">
                    <div id="carousel-example" class="carousel slide" data-ride="carousel" >
                        <!-- ...existing code for carousel... -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="assets/img/1.jpg" alt="" />
                            </div>
                            <div class="item">
                                <img src="assets/img/2.jpg" alt="" />
                            </div>
                            <div class="item">
                                <img src="assets/img/3.jpg" alt="" /> 
                            </div>
                        </div>
                        <!--INDICATORS-->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example" data-slide-to="1"></li>
                            <li data-target="#carousel-example" data-slide-to="2"></li>
                        </ol>
                        <!--PREVIUS-NEXT BUTTONS-->
                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="login-section row" id="ulogin">
                        <div class="col-md-5 login-section-left">
                            <h2>Welcome to Your Library</h2>
                            <p>Access thousands of books and resources in our digital collection. Login to manage borrowed books, discover new titles, and more.</p>
                            <div style="margin-top: 20px;">
                                <ul style="padding-left: 20px;">
                                    <li>Browse our extensive collection</li>
                                    <li>Reserve books online</li>
                                    <li>Track your reading history</li>
                                    <li>Get personalized recommendations</li>
                                </ul>
                            </div>
                            <p style="margin-top: 30px;">Not registered yet? <br><a href="signup.php" style="color: white; text-decoration: underline; font-weight: 600;">Create an account</a></p>
                        </div>
                        <div class="col-md-7 login-section-right">
                            <div class="login-header">
                                <h3>Sign in to your account</h3>
                                <p>Please enter your credentials to proceed</p>
                            </div>

                            <form role="form" method="post" class="login-form">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="form-control" type="email" name="emailid" required autocomplete="off" placeholder="Enter your email address" />
                                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" required autocomplete="off" placeholder="Enter your password" />
                                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                                </div>
                                
                                <button type="submit" name="login" class="btn btn-login">Sign In <i class="fa fa-sign-in"></i></button>
                                
                                <div class="login-footer">
                                    <a href="user-forgot-password.php">Forgot Password?</a>
                                    <a href="signup.php">New User? Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row features-section">
                <div class="col-md-12">
                    <h3 class="text-center" style="margin-bottom: 30px; color: #333; font-weight: 600;">Library Features</h3>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <h4 class="feature-title">Extensive Collection</h4>
                        <p>Access thousands of books, journals, and digital resources for all your academic needs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <h4 class="feature-title">24/7 Access</h4>
                        <p>Browse and manage your account anytime, anywhere with our online portal.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <h4 class="feature-title">Mobile Friendly</h4>
                        <p>Our system works seamlessly across all devices for a better user experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
