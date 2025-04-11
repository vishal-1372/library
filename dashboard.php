<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css' />
    <style>
        .content-wrapper {
            background-color: #f5f7fa;
            padding: 30px 0;
        }
        .welcome-section {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .welcome-section h3 {
            font-weight: 600;
            margin-top: 0;
        }
        .welcome-section p {
            opacity: 0.9;
            margin-bottom: 0;
        }
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            margin-bottom: 25px;
            padding: 25px;
            text-align: center;
            border: none;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .books-listed {
            background: linear-gradient(135deg, #3cb5de, #4cc9c9);
            color: white;
        }
        .books-not-returned {
            background: linear-gradient(135deg, #ff9966, #ff5e62);
            color: white;
        }
        .books-issued {
            background: linear-gradient(135deg, #56ab2f, #a8e063);
            color: white;
        }
        .dashboard-card i {
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }
        .dashboard-card h3 {
            font-size: 40px;
            font-weight: 700;
            margin: 10px 0;
            position: relative;
            z-index: 2;
        }
        .dashboard-card p {
            font-size: 16px;
            margin: 0;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }
        .dashboard-card::before {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            right: -50px;
            bottom: -50px;
        }
        .header-title {
            border-left: 5px solid #3cb5de;
            padding-left: 15px;
            margin-bottom: 30px;
            font-weight: 600;
            color: #444;
        }
        .dashboard-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }
        .dashboard-link:hover, .dashboard-link:focus {
            text-decoration: none;
            color: inherit;
        }
        .recent-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 25px;
            margin-top: 20px;
        }
        .recent-section h4 {
            margin-top: 0;
            font-weight: 600;
            color: #444;
            margin-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }
        .action-btn {
            background: #3cb5de;
            color: white;
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 500;
            border: none;
            margin-top: 15px;
            transition: all 0.3s;
        }
        .action-btn:hover {
            background: #2a9bc7;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            color: white;
        }
        .stat-label {
            font-size: 14px;
            opacity: 0.8;
            margin-top: 5px;
        }
        @media (max-width: 767px) {
            .dashboard-card {
                margin-bottom: 20px;
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
            <?php
            $sid=$_SESSION['stdid'];
            $sql1="SELECT FullName from tblstudents where StudentId=:sid";
            $query1 = $dbh->prepare($sql1);
            $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
            $query1->execute();
            $result=$query1->fetch(PDO::FETCH_OBJ);
            $fullname=$result->FullName;
            ?>
            
            <div class="welcome-section">
                <h3>Welcome Back, <?php echo htmlentities($fullname); ?>!</h3>
                <p>Manage your books and library activities from your personalized dashboard</p>
            </div>
            
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h3 class="header-title">Your Library Overview</h3>
                </div>
            </div>
             
            <div class="row">
                <a href="listed-books.php" class="dashboard-link col-md-4 col-sm-6">
                    <div class="dashboard-card books-listed">
                        <i class="fa fa-book fa-3x"></i>
                        <?php 
                        $sql ="SELECT id from tblbooks ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $listdbooks=$query->rowCount();
                        ?>
                        <h3><?php echo htmlentities($listdbooks);?></h3>
                        <p>Total Available Books</p>
                        <span class="stat-label">Click to browse the catalog</span>
                    </div>
                </a>
                 
                <a href="issued-books.php?returned=0" class="dashboard-link col-md-4 col-sm-6">
                    <div class="dashboard-card books-not-returned">
                        <i class="fa fa-refresh fa-3x"></i>
                        <?php 
                        $rsts=0;
                        $sid=$_SESSION['stdid'];
                        $sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and (RetrunStatus=:rsts || RetrunStatus is null || RetrunStatus='')";
                        $query2 = $dbh -> prepare($sql2);
                        $query2->bindParam(':sid',$sid,PDO::PARAM_STR);
                        $query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
                        $query2->execute();
                        $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                        $returnedbooks=$query2->rowCount();
                        ?>
                        <h3><?php echo htmlentities($returnedbooks);?></h3>
                        <p>Books To Return</p>
                        <span class="stat-label">Check your pending returns</span>
                    </div>
                </a>

                <?php 
                $ret =$dbh -> prepare("SELECT id from tblissuedbookdetails where StudentID=:sid");
                $ret->bindParam(':sid',$sid,PDO::PARAM_STR);
                $ret->execute();
                $results22=$ret->fetchAll(PDO::FETCH_OBJ);
                $totalissuedbook=$ret->rowCount();
                ?>

                <a href="issued-books.php" class="dashboard-link col-md-4 col-sm-6">
                    <div class="dashboard-card books-issued">
                        <i class="fa fa-bookmark fa-3x"></i>
                        <h3><?php echo htmlentities($totalissuedbook);?></h3>
                        <p>Your Book History</p>
                        <span class="stat-label">View your reading history</span>
                    </div>
                </a>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="recent-section">
                        <h4><i class="fa fa-history"></i> Recently Issued Books</h4>
                        <?php 
                        $sid=$_SESSION['stdid'];
                        $sql="SELECT tblbooks.BookName,tblbooks.BookImage,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine from tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId where tblstudents.StudentId=:sid order by tblissuedbookdetails.id desc limit 3";
                        $query = $dbh -> prepare($sql);
                        $query->bindParam(':sid',$sid,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0) { ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($results as $result) { ?>
                                    <tr>
                                        <td><?php echo htmlentities($result->BookName);?></td>
                                        <td><?php echo htmlentities($result->IssuesDate);?></td>
                                        <td><?php if($result->ReturnDate=="") {
                                                echo htmlentities("Not Returned Yet");
                                             } else {
                                                echo htmlentities($result->ReturnDate);
                                             } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                            <p>No books issued yet. Start exploring our collection!</p>
                        <?php } ?>
                        <a href="issued-books.php" class="btn action-btn">View All Books <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="recent-section">
                        <h4><i class="fa fa-star"></i> Quick Links</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="listed-books.php"><i class="fa fa-search"></i> Search Books</a></li>
                            <li class="list-group-item"><a href="issued-books.php"><i class="fa fa-list"></i> My Books</a></li>
                            <li class="list-group-item"><a href="change-password.php"><i class="fa fa-lock"></i> Change Password</a></li>
                            <li class="list-group-item"><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
