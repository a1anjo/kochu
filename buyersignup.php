<!DOCTYPE html>
<html>
<head>
  <title>Buyer Page - Fritter Away</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    
    .main{
      display: flex;
      
    }
    .container1 {
      width: 300px;
      height: 520px; 
      margin: 100px;
      padding: 20px;
      background-color: white;
      margin-left: 400px;
      border-radius: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    } 
    .container {
      max-width: 300px;
      height: 520px; 
      margin: 100px auto;
      padding: 20px;
      margin-left: -50px;
      background-color: white;
      border-radius: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      color: green;
      text-align: left; 
      margin-bottom: 20px;
    }
    
    h2 {
      color: green;
      text-align: left; 
      margin-bottom: 20px; 
    }
    a{
	font-size: 16px
	}
    
    label {
      color: green;
      display: block;
      margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="password"]{
      width: 80%;
      border: none;
      border-bottom: 1px solid green;
      padding: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }
    input[type="file"],
    input[type="radio"]{
      width: 8-0%;
      border: none;
      padding: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }
    
    .login-button {
      background-color: green;
      color: rgb(219, 213, 213);
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 10px;
    }
    
    .new-user-button {
      background-color: white;
      color: green;
      border: 1px solid green;
      border-radius: 20px;
      padding: 10px 20px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }
    
    .forgot-password {
      color: green;
      text-align: center;
      margin-top: 10px;
    }
	.radio-group {
      display: flex;
      margin-bottom: 20px;
    }
    
    .radio-group label {
      margin-right: 10px;
    }	
    .form-input {
  margin-bottom: 23px;
   }
   .close-icon{
      margin-left: 90px;
      padding-left: 50px;
      color: grey;
      cursor: pointer;
    }
  </style>
<script>
    function passCheck(){
        var value=document.getElementById("password").value;
        var x=/^(?=.[A-Z])(?=.[a-z])(?=.[0-9])(?=.[!@#$%^&])[A-Za-z0-9!@#$%^&]{8,12}$/;
        if(value.match(x)){
        document.getElementById("passp").innerHTML="";
        }
        else{
        document.getElementById("passp").style.color="red";
        document.getElementById("passp").innerHTML="Password must have one uppercase,lowercase,<br>digit,special character & 8-12 characters!";
        }
    }
    //for phoneCheck() end
    function confirmCheck(){
        value1=document.getElementById("password").value;
        value2=document.getElementById("cpassword").value;
        if(value1==value2 && value2.length!=0){
        document.getElementById("cpassp").innerHTML="";
        }
        else{
        document.getElementById("cpassp").style.color="red";
        document.getElementById("cpassp").innerHTML="Password does not match";
        }
    }


    function clearError(){
        // document.getElementById("namep").innerHTML="";
        //  document.getElementById("emailp").innerHTML="";
        document.getElementById("passp").innerHTML="";
        //document.getElementById("phonep").innerHTML="";
        document.getElementById("cpassp").innerHTML="";
    }
</script>
</head>
<body>
<form name="form" method="post"  enctype="multipart/form-data"> 
  <div class="main">
  <div class="container1">
    <h1>Get started !</h1><br>
    <label for="cname">Name of The Company:</label>
    <input type="text" id="cname" name="cname" required>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>
    <div class="form-input">
      <label for="password" class="required">Password</label>
      <input type="password" name="password" id="password" oninput="passCheck()" onblur='clearError()' placeholder="Enter a  password between 8-12 characters" required/>
      <p id="passp"></p>
    </div>
    <div class="form-input">
      <label for="cpassword" class="required">Confirm Password</label>
      <input type="password" name="cpassword" id="cpassword" oninput="confirmCheck()" required/>
      <p id="cpassp"></p>
    </div>
  </div>
  <div class="container">
  <h2>Fritter Away<span class="close-icon" onclick="location.href='fritterlogin.php'">&#10006;</span></h2>
  <br>
    <div class="form-input">
      <label for="phone" class="required">Phone number</label>
      <input type="text" name="phone_number" id="phone" oninput="phoneCheck()" onkeypress='validateNumbersOnly(event)' onblur='clearError()' placeholder="Enter phone number" required>
      <p id="phonep"></p>
    </div>
    <label for="profile">Choose your Profile Picture:</label>
    <input type="file" class="form-control-file" id="profile" name="profile" accept="image/*">
    <label for="file">Upload Neccesary Document:</label>
    <div class="radio-group">
      <label for="iso"><a>ISO Certification:</a></label>
      <input type="file" class="form-control-file" id="iso" name="iso" accept="image/*">
    </div>
    <div class="radio-group">
      <label for="r2"><a>R2 Certification:</a></label>
      <input type="file" class="form-control-file" id="r2" name="r2" accept="image/*">
    </div>
    <button type="submit" name="register" class="login-button">Register as Buyer</button>
  </div>
  </div>
</form>

</body>
</html>



<?php 
  include 'connect/connection.php';  
  if(isset($_POST["register"]))  //button name
  {
    $cname=$_POST["cname"]; 
    $email=$_POST["email"]; 
    $pass=$_POST["password"];
    $phone=$_POST["phone_number"];  // input name in "" 

      // Handle image upload 1
      $targetDir = "uploads/";
      $profpic = $_FILES["profile"]["name"];
      $targetFile1 = $targetDir . basename($profpic);
      move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile1);

      // Handle image upload 2
      $targetDir = "uploads/";
      $isopic = $_FILES["iso"]["name"];
      $targetFile2 = $targetDir . basename($isopic);
      move_uploaded_file($_FILES["iso"]["tmp_name"], $targetFile2);

      // Handle image upload 3
      $targetDir = "uploads/";
      $r2pic = $_FILES["r2"]["name"];
      $targetFile3 = $targetDir . basename($r2pic);
      move_uploaded_file($_FILES["r2"]["tmp_name"], $targetFile3);

      $q="insert into buyer(company,email,password,phone,profilepic,isodoc,r2doc) values('$cname','$email','$pass','$phone','$profpic','$isopic','$r2pic')";
      //into ()il table fields , values ()il above olla names
      
      if(mysqli_query($connect,$q)){
          echo "Successfully inserted";
          echo "<script>window.location.replace('fritterlogin.php');</script>";
        }
      else
          echo "Error";
  }
?>