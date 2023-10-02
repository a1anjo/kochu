<?php
  session_start();
  include '../connect/connection.php';
  $query="SELECT  * from buyer WHERE status='PENDING' ";
  $result=mysqli_query($connect,$query);
  $v=mysqli_num_rows($result);
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Approve Products</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <!-- Include the Font Awesome library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="assets/img/favicon.png" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
  <style>
/* Style for the image viewer modal */
    .image-viewer {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    text-align: center;
}

/* Style for the close button */
.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: white;
    cursor: pointer;
}

/* Style for the displayed image */
.displayed-image {
    max-width: 80%;
    max-height: 80%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
/*card*/
@import url('https://fonts.googleapis.com/css?family=Montserrat');

* {
	box-sizing: border-box;
}



h3 {
	margin: 10px 0;
}

h6 {
	margin: 5px 0;
	text-transform: uppercase;
}

p {
	font-size: 14px;
	line-height: 21px;
}
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(11, 99, 6, 0.74); /* Adjust opacity (0.5 for 50%) and color here */
}

.card-container {
	background-color: #f9f7f7;
    background-image: url(../assets/img/slide/1.jpg);
	border-radius: 5px;
	box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
	color:  #ffffff;
	padding-top: 30px;
	position: relative;
	width: 300px;
	max-width: 100%;
	text-align: center;
  margin-bottom: 3%;
  font-family: system-ui;
  margin-right: 5%;
}

.card-container .round {
	border: 1px solid #03BFCB;
	border-radius: 50%;
	padding: 7px;
  height: 180px;
  object-fit: contain;
}
.buttons{
    z-index: -1;
}
button.primary {
	background-color: rgba(255, 255, 255, 0.858);
	border: none;
	border-radius: 3px;
	color: rgb(0, 0, 0);
	font-family: Montserrat, sans-serif;
	font-weight: 500;
	padding: 10px 25px;
    font-size: 15px;
}

button.primary.ghost {
	background-color: rgba(255, 0, 0, 0.875);
	color: white;
}

.skills {

	padding: 15px;
	margin-top: 30px;
}

span{
    font-size: 15px;
}
span a{
    color: white;
    text-decoration: none;
}
  </style>
  <script>
        // Function to open the image viewer
        function openImageViewer1(imageUrl) {
            var imageViewer = document.getElementById('imageViewer');
            var displayedImage = document.getElementById('displayedImage');

            // Set the source of the displayed image
            displayedImage.src = "../uploads/"+imageUrl;

            // Show the image viewer
            imageViewer.style.display = 'block';
        }

        function openImageViewer2(imageUrl) {
            var imageViewer = document.getElementById('imageViewer');
            var displayedImage = document.getElementById('displayedImage');

            // Set the source of the displayed image
            displayedImage.src = "../uploads/"+imageUrl;

            // Show the image viewer
            imageViewer.style.display = 'block';
        }

        // Function to close the image viewer
        function closeImageViewer() {
            var imageViewer = document.getElementById('imageViewer');

            // Hide the image viewer
            imageViewer.style.display = 'none';
        }
    </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Fritter Away</span>
      </a>
    
    </div><!-- End Logo -->

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number"></span>
          </a><!-- End Notification Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 3 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Pending Requests</h4>
                <p>There is a new Request</p>
                <p>30 min. ago</p>
              </div>
            </li>

    

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Product Added</h4>
                <p>X has added an item to Products</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>New User Alert</h4>
                <p>AB enterprises has created a new Account </p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>
          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../uploads/<?php echo $_SESSION["adpic"]; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block -toggle ps-2"><?php echo $_SESSION["adname"]; ?></span>
          </a><!-- End Profile Image Icon -->
        <!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>


  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      
     

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="approvebuyers.php">
          <i class="bi bi-envelope "></i>
          <span>Approve Buyers</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="approveproducts.php">
          <i class="bi bi-card-list"></i>
          <span>Approve Products</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Approve Buyers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
        <?php if($v>0)
                while($row=mysqli_fetch_array($result))
                {  ?>
        <div class="card-container">       
            <img class="round" src="../uploads/<?php echo $row['profilepic']; ?>" alt="user" style="width:130px;height:130px;">
            <h3><?php echo $row['company'] ?></h3>
            <p><strong>Email:</strong><?php echo $row['email'] ?></p>
            <p><strong>Phone:</strong><?php echo $row['phone'] ?></p>
            <h5>ISO Certificate:&nbsp;<span><a href="#" onclick="openImageViewer1('<?php echo $row['isodoc']; ?>')"><i class="fas fa-eye"></i>View</a></span></h5>
            <h5>R2 Certificate:&nbsp;<span><a href="#" onclick="openImageViewer2('<?php echo $row['r2doc']; ?>')"><i class="fas fa-eye"></i>View</a></span></h5>
            <form method="post">
                <div class="buttons skills">
                    <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                    <button class="primary" name="approve">APPROVE</button>
                    <button class="primary ghost" name="reject">REJECT</button>
                </div>
            </form>
        </div>
        <?php } ?>
        <!-- Image Viewer Modal -->
        <div id="imageViewer" class="image-viewer">
            <span class="close-button" onclick="closeImageViewer()">&times;</span>
            <img src="" alt="Image" class="displayed-image" id="displayedImage">
        </div>
          <!-- End Sales Card -->
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Fritter Away</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Adminside/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Adminside/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="Adminside/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="Adminside/assets/vendor/echarts/echarts.min.js"></script>
  <script src="Adminside/assets/vendor/quill/quill.min.js"></script>
  <script src="Adminside/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="Adminside/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="Adminside/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Adminside/assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    
</body>
</html>

<?php

if (isset($_POST["approve"])) {
    $bid = $_POST["bid"];
    $q = "UPDATE buyer SET status = 'APPROVED' WHERE bid = $bid"; // Corrected query
    if(mysqli_query($connect, $q)) {
        echo "Successfully approved $bid";
        echo '<script>window.location.href = "approvebuyers.php";</script>';
    } else {
        echo "Error";
    }
}
elseif (isset($_POST["reject"])) {
    $bid = $_POST["bid"];
    $q = "DELETE FROM buyer  WHERE bid = $bid"; // Corrected query
    if(mysqli_query($connect, $q)) {
        echo "Successfully removed $bid";
        echo '<script>window.location.href = "approvebuyers.php";</script>';
    } else {
        echo "Error";
    }
}
?>
