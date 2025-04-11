<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
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
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css' />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content-wrapper {
            padding: 30px 0;
        }
        .dashboard-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            border-left: 4px solid #2196F3;
            padding-left: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .stat-card {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            margin-bottom: 25px;
            overflow: hidden;
            position: relative;
            border: none;
            height: 100%;
        }
        .stat-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.15);
        }
        .stat-card-inner {
            padding: 25px 15px;
            text-align: center;
            color: white;
        }
        .books-card {
            background: linear-gradient(135deg, #42b3d5 0%, #2196F3 100%);
        }
        .pending-card {
            background: linear-gradient(135deg, #ff9800 0%, #ff7043 100%);
        }
        .users-card {
            background: linear-gradient(135deg, #f44336 0%, #e91e63 100%);
        }
        .authors-card {
            background: linear-gradient(135deg, #4caf50 0%, #8bc34a 100%);
        }
        .categories-card {
            background: linear-gradient(135deg, #9c27b0 0%, #673ab7 100%);
        }
        .stat-icon {
            margin-bottom: 15px;
            position: relative;
        }
        .stat-icon i {
            font-size: 48px;
            opacity: 0.8;
        }
        .stat-number {
            font-size: 36px;
            font-weight: 700;
            margin: 10px 0;
        }
        .stat-label {
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .card-link {
            display: block;
            color: white;
            text-decoration: none;
        }
        .card-link:hover, .card-link:focus {
            color: white;
            text-decoration: none;
        }
        .dashboard-row {
            display: flex;
            flex-wrap: wrap;
        }
        .dashboard-col {
            padding: 10px;
            height: 100%;
        }
        .stat-card::after {
            content: "";
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            transition: all 0.5s ease;
        }
        .stat-card:hover::after {
            transform: scale(4);
        }
    </style>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h2 class="dashboard-title">Admin Dashboard</h2>
                </div>
            </div>
             
            <div class="row dashboard-row">
                <div class="col-md-4 col-sm-6 col-xs-12 dashboard-col">
                    <a href="manage-books.php" class="card-link">
                        <div class="stat-card">
                            <div class="stat-card-inner books-card">
                                <div class="stat-icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <?php 
                                $sql ="SELECT id from tblbooks ";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $listdbooks=$query->rowCount();
                                ?>
                                <div class="stat-number"><?php echo htmlentities($listdbooks);?></div>
                                <div class="stat-label">Books Listed</div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-12 dashboard-col">
                    <a href="manage-issued-books.php" class="card-link">
                        <div class="stat-card">
                            <div class="stat-card-inner pending-card">
                                <div class="stat-icon">
                                    <i class="fa fa-refresh"></i>
                                </div>
                                <?php 
                                $sql2 ="SELECT id from tblissuedbookdetails where (RetrunStatus='' || RetrunStatus is null)";
                                $query2 = $dbh -> prepare($sql2);
                                $query2->execute();
                                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                $returnedbooks=$query2->rowCount();
                                ?>
                                <div class="stat-number"><?php echo htmlentities($returnedbooks);?></div>
                                <div class="stat-label">Books Not Returned</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 dashboard-col">
                    <a href="reg-students.php" class="card-link">
                        <div class="stat-card">
                            <div class="stat-card-inner users-card">
                                <div class="stat-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <?php 
                                $sql3 ="SELECT id from tblstudents ";
                                $query3 = $dbh -> prepare($sql3);
                                $query3->execute();
                                $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                $regstds=$query3->rowCount();
                                ?>
                                <div class="stat-number"><?php echo htmlentities($regstds);?></div>
                                <div class="stat-label">Registered Users</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 dashboard-col">
                    <a href="manage-authors.php" class="card-link">
                        <div class="stat-card">
                            <div class="stat-card-inner authors-card">
                                <div class="stat-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <?php 
                                $sq4 ="SELECT id from tblauthors ";
                                $query4 = $dbh -> prepare($sq4);
                                $query4->execute();
                                $results4=$query4->fetchAll(PDO::FETCH_OBJ);
                                $listdathrs=$query4->rowCount();
                                ?>
                                <div class="stat-number"><?php echo htmlentities($listdathrs);?></div>
                                <div class="stat-label">Authors Listed</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 dashboard-col">
                    <a href="manage-categories.php" class="card-link">
                        <div class="stat-card">
                            <div class="stat-card-inner categories-card">
                                <div class="stat-icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <?php 
                                $sql5 ="SELECT id from tblcategory ";
                                $query5 = $dbh -> prepare($sql5);
                                $query5->execute();
                                $results5=$query5->fetchAll(PDO::FETCH_OBJ);
                                $listdcats=$query5->rowCount();
                                ?>
                                <div class="stat-number"><?php echo htmlentities($listdcats);?></div>
                                <div class="stat-label">Listed Categories</div>
                            </div>
                        </div>
                    </a>
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
