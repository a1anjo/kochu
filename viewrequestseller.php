<?Php
  session_start();
?>
<?php 
    include 'connect/connection.php';
    //for dynamically updating table
    $query1="SELECT * FROM communication_requests WHERE approval_status='pending' AND sid='$_SESSION[sid]'";
    $result1=mysqli_query($connect,$query1);
    $v1=mysqli_num_rows($result1);
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
            <li><a class="nav-link scrollto" href="homeforseller.php">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li><a class="nav-link scrollto active" href="productsforseller.php">Products</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="uploads/<?php echo $_SESSION["sprofilepic"]; ?>" alt="Profile" class="rounded-circle" style="aspect-ratio:1/1;max-width:40px;max-height:40px;object-fit:cover;">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="left: auto; right: 0;"> <!-- Adjust the style here -->
                <li><a class="dropdown-item" href="#"><?php echo $_SESSION["scompany"]; ?></a></li>
                <li><a class="dropdown-item" href="sellerupload.php">Upload Product</a></li>
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
<!-- ======= Product Requests Section ======= -->
<section id="product-requests" class="product-requests">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Product Requests</h2>
    </div>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Company Name</th>
            <th>Email</th>
            <th>Product Requested</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example row, you can dynamically generate rows with PHP -->
          <?php if($v1>0)
            while($row1=mysqli_fetch_array($result1)){
                $query2="SELECT * FROM buyer WHERE bid=$row1[bid]";
                $result2=mysqli_query($connect,$query2);
                $v2=mysqli_num_rows($result2);
                $row2=mysqli_fetch_array($result2);
                $query3="SELECT * FROM products WHERE pid=$row1[pid]";
                $result3=mysqli_query($connect,$query3);
                $v3=mysqli_num_rows($result3);
                $row3=mysqli_fetch_array($result3);
        ?>
          <tr>
            <td><?php echo $row2['company'] ?></td>
            <td>john@example.com</td>
            <td><?php echo $row3['title'] ?></td>
            <td>
            <!-- <button class="btn btn-success" name="approve" onclick="window.open('approve-details.php?status=approved&rid=<?php echo urlencode($row1['rid']); ?>')">Approve</button>
            <button class="btn btn-danger" name="reject" onclick="window.open('approve-details.php?status=rejected&rid=<?php echo urlencode($row1['rid']); ?>')">Reject</button> -->
            <form method="post">
            <input type="hidden" name="rid" value="<?php echo $row1['rid']; ?>">
            <button class="btn btn-success" name="approve">Approve</button>
            <button class="btn btn-danger" name="reject">Reject</button>
            </form>
            </td>
          </tr>
          <?php } ?>
          <!-- Add more rows here as needed -->
        </tbody>
      </table>
    </div>

  </div>
</section><!-- End Product Requests Section -->

   <!-- Contact Section -->

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

<?php

if(isset($_POST["approve"])){
    $rid = $_POST['rid'];
    $query= "UPDATE communication_requests SET approval_status= 'approved' WHERE rid=$rid";
    if(mysqli_query($connect, $query)) {
        echo "Successfully updated ";
        echo '<script>window.location.href = "viewrequestseller.php";</script>';
    } else {
        echo "Error";
    }
}
elseif(isset($_POST["reject"])){
    $rid = $_POST['rid'];
    $query= "UPDATE communication_requests SET approval_status= 'rejected' WHERE rid=$rid";
    if(mysqli_query($connect, $query)) {
        echo "Successfully updated ";
        echo '<script>window.location.href = "viewrequestseller.php";</script>';
    } else {
        echo "Error";
    }
}
?>