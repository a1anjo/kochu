<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Seller Upload</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>
   
    .data{
        padding: 5px 60px;
    }
    #button{
        background-color: #084baf;
        color:white;font-size: 18px;
        width: 130px;
    }
    #button:hover{
      background-color: #084bafc9;
    }
    .class{
      text-align: justify;
      display: inline-block;
      position:  relative;
     
    }
    .input
    {
        height: 30px;
        width: 200px;
    }
    .desc
    {
        height:80px;
        width: 200px;
    }
    td
    {
        height: 50px;
        padding-left: 10px;
        background-color: #57A255;
    }
    table
    {
        border: 1px solid black;
    }
    button
    {
       background-color:#ffffff ;
       color: white;
    }
</style>
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
                <li><a class="dropdown-item" href="viewrequestseller.php">View Requests</a></li>
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
    <section class="breadcrumbs">

    </section><!-- End Breadcrumbs -->
    <!--formmmm-->
    <center>
   
  
    <br><br>
    <form method="post"  enctype="multipart/form-data">
        <table>
            <tr>
            <td><label style="color: #ffffff;">Title:</label></td>
          <td><input type="text" class="input" id="fname" placeholder="Enter a title" name="title" required></td>  
            </tr>

          <tr>
            <td><label for="title" style="color: #ffffff;">Description:</label></td>
            <td><textarea class="desc" name="description" rows="2" required placeholder="Enter description"></textarea></td> 
        </tr>
         
          <tr>
          <td>  <label for="title" style="color: #ffffff;">Pickup Address:</label></td>
          <td>  <textarea class="desc" name="pickupaddress" rows="2" cols required placeholder="Enter the address"></textarea></td>
        </tr>

        <tr>
            <td><label for="title" style="color: #ffffff;">Mobile Number:</label></td>
            <td> <input  type="number"  name="mobileNumber" id="MobileNumber" class="input" required placeholder="xxx-xxxx-xxx"></td>
         </tr>
          <tr>
            <td><label style="color: #ffffff">Upload Picture:</label></td>
        <td><input type="file" name="image1" id="Upload Picture" style="color: #ffffff;" required></td>
            </tr>

            <tr>
            <td><label style="color: #ffffff">Choose category:</label></td>
        <td><input type="radio" name="category" id="computer" value="Computer Waste"><label for="computer" style="color: #ffffff" required>Computer Waste</label>
        <input type="radio" name="category" id="mobile" value="Mobile Waste"><label for="mobile" style="color: #ffffff" required>Mobile Waste</label></td>
            </tr>

            <tr>
         <td colspan="2">  <center><input type ="submit"  value="Submit" name="submit" id="button" ></center>
    
          </tr>
      </table>
     </form>
  </center> 
<!--form endd-->

      </div>

    </div>
                </form></center>
        <section class="inner-page">
          <div class="container">
       
      </div>
    </section>

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



<?php 
include 'connect/connection.php';
if(isset($_POST["submit"])) {
    $sid=$_SESSION["sid"];
    $title = $_POST["title"];
    $descp=$_POST["description"]; 
    $client=$_SESSION["scompany"];
    $addr=$_POST["pickupaddress"];
    $phone=$_POST["mobileNumber"];
    $email=$_SESSION["semail"];
    $catg=$_POST["category"];
    
        // Handle image upload 1
        $targetDir = "uploads/";
        $image1 = $_FILES["image1"]["name"];
        $targetFile1 = $targetDir . basename($image1);
        move_uploaded_file($_FILES["image1"]["tmp_name"], $targetFile1);


        

    $q = "INSERT INTO products (sid, title, descp, client , address, phone, email, category, image1) 
          VALUES ('$sid','$title', '$descp', '$client','$addr', '$phone','$email', '$catg', '$image1')";

    if(mysqli_query($connect, $q)) {
        echo "Successfully inserted";
        echo "<script>window.location.replace('product sub.html');</script>";
    } else {
        echo "Error";
    }
}

?>
