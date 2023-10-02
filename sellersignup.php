<!DOCTYPE html>
<html>
<head>
  <title>Login Page - Fritter Away</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    
    .container-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  
    .container {
      width: 300px;
      height: 600px;
      margin: 0 0px; /* Adjusted margin between containers */
      padding: 20px;
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
      color: white;
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
        document.getElementById("passp").innerHTML="Password must have 8-12 characters!";
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

  <div class="container-wrapper">
    <div class="container">
    <h2>Fritter Away<span class="close-icon" onclick="location.href='fritterlogin.php'">&#10006;</span></h2> 
    <h1>Get started !</h1>
      <form name="form" method="post"  enctype="multipart/form-data">
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
      <label for="profile">Choose your Profile Picture:</label>
    <input type="file" class="form-control-file" id="profile" name="profile" accept="image/*">
      <br>
        <button type="submit" value="Seller" name="seller" class="login-button" >Register as Seller</button>
     <br>
	<br>
      </form>


    
</body>
</html>




<?php 
  include 'connect/connection.php';

  if(isset($_POST["seller"]))  //button name
  {
      $cname=$_POST["cname"];  // input name in "" 
      $email=$_POST["email"]; 
      $pass=$_POST["password"];  // input name in "" 

      // Handle image upload 1
      $targetDir = "uploads/";
      $profpic = $_FILES["profile"]["name"];
      $targetFile1 = $targetDir . basename($profpic);
      move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile1);

      $q="insert into seller(scompany,email,password,sprofilepic) values('$cname','$email','$pass','$profpic')";
      //into ()il table fields , values ()il above olla names
      
      if(mysqli_query($connect,$q)){
          echo "Successfully inserted";
          echo "<script>window.location.replace('fritterlogin.php');</script>";
          }
      else
          echo "Error";
  }
?>