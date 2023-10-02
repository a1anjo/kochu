<?php
 session_start();
?>
<?php
  include 'connect/connection.php';
  $query1="SELECT  * from products WHERE status='APPROVED' AND category='Computer Waste' ";
  $result1=mysqli_query($connect,$query1);
  $v1=mysqli_num_rows($result1);

  $query2="SELECT  * from products WHERE status='APPROVED' AND category='Mobile Waste' ";
  $result2=mysqli_query($connect,$query2);
  $v2=mysqli_num_rows($result2);
?> 

<!DOCTYPE html>
<html lang="en"> 
 
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Products</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/images-removebg-preview.png" rel="icon">
 

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.10.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="overflow-x: hidden;">

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@fritteraway.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +91 9207654929
      </div>

    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Fritter Away</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="homeforbuyer.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto active" href="#">Products</a></li>
          <li><a class="nav-link scrollto" href="buyernotifications.php">Notifications</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="uploads/<?php echo $_SESSION["profilepic"]; ?>" alt="Profile" class="rounded-circle" style="aspect-ratio:1/1;max-width:40px;max-height:40px;object-fit:cover;">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="left: auto; right: 0;"> <!-- Adjust the style here -->
              <li><a class="dropdown-item" href="#"><?php echo $_SESSION["company"]; ?></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

 

  <main id="main">

  
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Products</h2>
          
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Computer Waste</li>
              <li data-filter=".filter-card">Mobile Waste</li>
             
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <!-- comp waste -->
          <?php if($v1>0)
                while($row1=mysqli_fetch_array($result1))
                {  ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">   
            <div class="portfolio-wrap">
              <img src="uploads/<?php echo $row1['image1']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $row1['title'] ?></h4> 
                <div class="portfolio-links">
                  <a href="uploads/<?php echo $row1['image1']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row1['title'] ?>"><i class="bx bx-plus"></i></a>
                  <a href="productdetails.php?pid=<?php echo $row1['pid']; ?>" title="More Details" target="_blank"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- mob waste -->
          <?php if($v2>0)
                while($row2=mysqli_fetch_array($result2))
                {  ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="uploads/<?php echo $row2['image1']; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $row2['title'] ?></h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="uploads/<?php echo $row2['image1']; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row2['title'] ?>"><i class="bx bx-plus"></i></a>
                  <a href="productdetails.php?pid=<?php echo $row2['pid']; ?>" title="More Details" target="_blank"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <h3>Fritter Away</h3>
        <div class="copyright">
          &copy; Copyright <strong><span>Fritter Away</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
         
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    
  
  </body>
  
  </html>