<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page - Fritter Away</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    
    .container {
      max-width: 300px;
      height: 550px; 
      margin: 100px auto;
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
    }
    select{
      width: 100%;
      color: green;
      border: none;
      border-bottom: 1px solid green;
      padding: 10px;
      margin-bottom: 20px;
      width:100%;
      font-size: 15px;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      border: none;
      border-bottom: 1px solid green;
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
    .close-icon{
      margin-left: 90px;
      padding-left: 50px;
      color: grey;
      cursor: pointer;
    }
  </style>
</head>
 <script>
        function validf(){
            var name=document.form.name.value;
            var password=document.form.password.value;
            var password2=document.form.password2.value;
            var y=document.form.phone.value;
            var x=document.form.email.value;
            var atposition=x.indexOf("@");
            var dotposition=x.lastIndexOf(".");

            if(name=null || name=="")
            {
                alert("Name is Invalid");
                return false;
            }
            if(password.length<6)
            {
                alert("Password must carry alteast 6 characters");
                return false;
            }
            if(password!=password2)
            {
                alert("Wrong Password entered");
                return false;
            }
            if(isNaN(y)||y.length==10){
                alert("the given phone number is not valid");
                return false;  
            }
            if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
                alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
                return false;  
            }
        }

            </script>
<body>
  <div class="container">
    <h2>Fritter Away<span class="close-icon" onclick="location.href='index.html'">&#10006;</span></h2>
    <br>
    <h1>Welcome Back!</h1>
    <form method="POST">
    <div class="inputBox">
        <select name="usertype" id="utype"   required>
            <option value="" selected>Login As</option>
            <option value="admin">Admin</option>
            <option value="buyer">Buyer</option>
            <option value="seller">Seller</option>
        </select>
    </div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit" class="login-button" name="login">LOGIN</button>
      <form name="form" method="post" action="forget.html" onsubmit="return validf()" >  

      <button type="button" class="new-user-button" onclick="location.href='forget.html'">FORGET PASSWORD</button></a>
<br><br><center>
  <form name="form" method="post"  onsubmit="return validf()" >  

    <button type="submit" class="login-button" onclick="location.href='frittersignup.html'">NEW USER</button>
    </form>
  </div>
</body>
</html>




<?php  
include 'connect/connection.php';

if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $role=$_POST["usertype"]; 
    if($role==="buyer"){
        $query="select * from buyer where email='$email' AND status='APPROVED'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)>0){
            $query2="select * from buyer where password='$pass'";
            $result2=mysqli_query($connect,$query2);
            if(mysqli_num_rows($result2)>0){
                $row=mysqli_fetch_array($result);
                $_SESSION["bid"]=$row["bid"];
                $_SESSION["company"]=$row["company"];
                $_SESSION["email"]=$row["email"];
                $_SESSION["profilepic"]=$row["profilepic"];
                $_SESSION["isodoc"]=$row["isodoc"];
                $_SESSION["r2doc"]=$row["r2doc"];                    
                echo "<script>window.location.replace('productsforbuyer.php');</script>";
                exit();     
                //redirect
            }
            else{
                echo '<script>document.getElementById("loginerror").style.opacity="1";
                document.getElementById("loginerror").style.color="red";
                document.getElementById("loginerror").innerHTML="Your password is incorrect!";</script>';
                //error message
            }
        }
        else{
        echo '<script>document.getElementById("loginerror").style.opacity="1";
        document.getElementById("loginerror").style.color="red";
        document.getElementById("loginerror").innerHTML="Your username is incorrect!";</script>';
        //error message
        }
    }
    elseif($role==="seller"){
      $query="select * from seller where email='$email'";
      $result=mysqli_query($connect,$query);
      if(mysqli_num_rows($result)>0){
          $query2="select * from seller where password='$pass'";
          $result2=mysqli_query($connect,$query2);
          if(mysqli_num_rows($result2)>0){
              $row=mysqli_fetch_array($result);
              $_SESSION["sid"]=$row["sid"];
              $_SESSION["scompany"]=$row["scompany"];
              $_SESSION["semail"]=$row["email"];  
              $_SESSION["sprofilepic"]=$row["sprofilepic"];             
              echo "<script>window.location.replace('sellerupload.php');</script>";
              exit();        
              //redirect
          }
          else{
              echo '<script>document.getElementById("loginerror").style.opacity="1";
              document.getElementById("loginerror").style.color="red";
              document.getElementById("loginerror").innerHTML="Your password is incorrect!";</script>';
              //error message
          }
      }
      else{
      echo '<script>document.getElementById("loginerror").style.opacity="1";
      document.getElementById("loginerror").style.color="red";
      document.getElementById("loginerror").innerHTML="Your username is incorrect!";</script>';
      //error message
      }
  }
  elseif($role==="admin"){
    $query="select * from admin where ademail='$email'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result)>0){
        $query2="select * from admin where adpass='$pass'";
        $result2=mysqli_query($connect,$query2);
        if(mysqli_num_rows($result2)>0){
            $row=mysqli_fetch_array($result);
            $_SESSION["aid"]=$row["aid"];
            $_SESSION["adname"]=$row["adname"];
            $_SESSION["adrole"]=$row["adrole"];
            $_SESSION["ademail"]=$row["ademail"];  
            $_SESSION["adpic"]=$row["adpic"];              
            echo "<script>window.location.replace('Adminside/index.php');</script>";
            exit();        
            //redirect
        }
        else{
            echo '<script>document.getElementById("loginerror").style.opacity="1";
            document.getElementById("loginerror").style.color="red";
            document.getElementById("loginerror").innerHTML="Your password is incorrect!";</script>';
            //error message
        }
    }
    else{
    echo '<script>document.getElementById("loginerror").style.opacity="1";
    document.getElementById("loginerror").style.color="red";
    document.getElementById("loginerror").innerHTML="Your username is incorrect!";</script>';
    //error message
    }
}
}
?>