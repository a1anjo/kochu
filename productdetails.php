<?Php
  session_start();
?>
<?php 
  include 'connect/connection.php';
  $pid=$_GET["pid"];
  $n="SELECT *FROM products WHERE pid=$pid ";
  $result=mysqli_query($connect,$n);
  $v=mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);

  $m="SELECT *FROM seller WHERE sid=$row[sid]";
  $result1=mysqli_query($connect,$m);
  $v1=mysqli_num_rows($result1);
  $row1=mysqli_fetch_array($result1);

  $o="SELECT *FROM communication_requests WHERE bid=$_SESSION[bid] AND pid=$pid AND approval_status='approved'";
  $result2=mysqli_query($connect,$o);
  $v2=mysqli_num_rows($result2);
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product Details</title>
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

<body>

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
          <li><a class="nav-link scrollto active" href="productsforbuyer.php">Products</a></li>
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

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
     
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="uploads/<?php echo $row['image1']; ?>" alt="" style="aspect-ratio:16/10;object-fit:contain;">
                </div>

               

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
    <div class="portfolio-description portfolio-info">
    <h3><?php echo $row['title'] ?></h3>
      <p><?php echo $row['descp'] ?></p>
    </div><br>
    <?php if ($v2 > 0) { ?>
      <div class="portfolio-info">
        <h3>Details</h3>
        <ul>
          <li><strong>Category</strong>: <?php echo $row['category'] ?></li>
          <li><strong>Client</strong>: <?php echo $row['client'] ?></li>
          <li><strong>Contact</strong>:+91 <?php echo $row['phone'] ?></li>
          <li><strong>Address</strong>:<?php echo $row['address'] ?></li>
          <li><strong>Email</strong>: <a href="#"><?php echo $row['email']; ?></a></li>
        </ul>
      </div>
    <?php } ?><br><?php if ($v2 == 0) { ?>
    <button class="btn btn-success" onclick="window.open('buyer-request-form.php?pid=<?php echo $pid; ?>&sid=<?php echo urlencode($row1['sid']); ?>&bid=<?php echo urlencode($_SESSION['bid']); ?>&name=<?php echo urlencode($_SESSION['company']); ?>&email=<?php echo urlencode($_SESSION['email']); ?>')">Contact now</button>
  </div>
  <?php } ?>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

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
      <a href="https://bootstrapmade.com/"></a>
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