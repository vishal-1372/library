<section class="footer-section">
    <div class="container">
        <div class="row">
            <!-- About Library Column -->
            <div class="col-md-4">
                <h4><i class="fa fa-book"></i> About Our Library</h4>
                <p>Our online library management system provides easy access to thousands of books and resources for students and faculty members.</p>
                <p><i class="fa fa-clock-o"></i> Library Hours: 8:00 AM - 8:00 PM</p>
            </div>
            
            <!-- Quick Links Column -->
            <div class="col-md-4">
                <h4><i class="fa fa-link"></i> Quick Links</h4>
                <ul class="list-unstyled quick-links">
                    <li><a href="index.php"><i class="fa fa-angle-right"></i> Home</a></li>
                    <li><a href="books.php"><i class="fa fa-angle-right"></i> Books Listing</a></li>
                    <li><a href="signup.php"><i class="fa fa-angle-right"></i> User Registration</a></li>
                    <li><a href="adminlogin.php"><i class="fa fa-angle-right"></i> Admin Login</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Library Rules</a></li>
                </ul>
            </div>
            
            <!-- Contact Info Column -->
            <div class="col-md-4">
                <h4><i class="fa fa-phone"></i> Contact Us</h4>
                <ul class="list-unstyled">
                    <li><i class="fa fa-map-marker"></i> 123 Library Street, Education City</li>
                    <li><i class="fa fa-envelope"></i> contact@librarymanagement.com</li>
                    <li><i class="fa fa-phone"></i> (123) 456-7890</li>
                </ul>
                
                <!-- Social Media Links -->
                <div class="social-links">
                    <a href="#" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        
        <hr>
        
        <!-- Copyright Row -->
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; <?php echo date('Y'); ?> Online Library Management System | All rights reserved.</p>
            </div>
        </div>
    </div>
</section>

<style>
.footer-section {
    background-color: #333;
    color: #fff;
    padding: 40px 0 20px;
}

.footer-section h4 {
    color: #fff;
    font-weight: bold;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #555;
}

.footer-section a {
    color: #ddd;
    transition: all 0.3s ease;
}

.footer-section a:hover {
    color: #fff;
    text-decoration: none;
    padding-left: 5px;
}

.quick-links li {
    padding: 5px 0;
}

.social-links {
    margin-top: 20px;
}

.social-links a {
    background-color: #444;
    margin-right: 5px;
    border-radius: 50%;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    display: inline-block;
    color: #fff;
}

.social-links a:hover {
    background-color: #007bff;
    transform: scale(1.1);
}

.footer-section hr {
    border-color: #555;
    margin: 20px 0;
}
</style>