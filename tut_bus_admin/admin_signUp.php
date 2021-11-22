<?php
 include_once '../database/dbConn.php';
 session_start();  //session carry data to the page             background: #fbfbfb;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
    <link rel="shortcut icon" href="../images/logo3.jpeg" type="image/x-icon">
    <title>Admin SignUp</title>
    <style>
        body{

             background: #fbfbfb;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="bodyTop">
                    <h3 class="text-center text-muted">Create Bus Admin Account.</h3>

                </div>
            </div>
        </div>
        <form action="admin_signUp.php" method="POST" enctype="multipart/form-data" class="accForm">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>First Name(s)</label>
                <input type="text" name="FirstName" class="form-control" placeholder="First Name(s)"
                  value="<?php
                  if (!empty($_SESSION['FirstName'])) {
                        echo $_SESSION['FirstName'];
                         unset($_SESSION['FirstName']);
                  }
              ?>"  required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="LastName" class="form-control" placeholder="Last name"
                 value="<?php
                  if (!empty($_SESSION['LastName'])) {
                        echo $_SESSION['LastName'];
                         unset($_SESSION['LastName']);
                  }
              ?>"  required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Staff email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email"
                value="<?php
                  if (!empty($_SESSION['Email'])) {
                        echo $_SESSION['Email'];
                         unset($_SESSION['Email']);
                  }
              ?>"  required>
             <small id="emailHelp" class="form-text text-muted">example@tut4life.ac.za.</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Staff Number</label>
                    <input id="phnNumb" type="text" name="stuNum" class="form-control" placeholder="Staff Number"
                      value="<?php
                  if (!empty($_SESSION['stuNum'])) {
                        echo $_SESSION['stuNum'];
                         unset($_SESSION['stuNum']);
                  }
              ?>"  required>

                   <!-- <div class="text-danger"><b id="phnNumbError"></b></div>-->
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Campus</label>

                  <select  name="campus" class="form-control"  required >
                      <option value="">Allocated Campus</option>
                      <option value="Sosha South">Sosha South</option>
                      <option value="Sosha North">Sosha North</option>
                  </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Password</label>
                    <input id="password" type="password" name="Password" class="form-control" placeholder="Password" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Confirm Password</label>
 <input id="confirmPassword" type="password" name="password" class="form-control" placeholder="Confirm Password" required>
                   <!-- <div class="text-danger"><b id="notMachedPasswordErrorId"></b></div>-->
                </div>
            </div>
                <br>
                 <?php

                       if (isset($_SESSION['message'])): ?>
                       <div class="alert alert-<?=$_SESSION['msg_type']?>">

                         <?php
                             echo $_SESSION['message'];
                             unset($_SESSION['message']);
                         ?>
                     </div>
                   <?php endif ?>

            <input  name="submit_signup_user" class="btn btn-danger" type="submit" value="Submit"/>
         <!--  <a class="btn btn-danger" href="userlogin.php"><i class="fa fa-home "></i> Login</a>-->
          <a class="btn btn-default" href="admin_interface.php"><i class="fa fa-home "></i> Home</a>
            <!--<button type="submit" name="submit">Submit</button>   id="seekerCompanySameSubmitBtnId"-->
        </form>
        <?php
        if(isset($_POST['submit_signup_user']))
       {

        $name=ucwords($_POST['FirstName']);
        $surname=ucwords($_POST['LastName']);
        $email=strtolower($_POST['Email']);

        $campus=ucwords($_POST['campus']);


        $stud_num=$_POST['stuNum'];
        $password=$_POST['Password'];
        $cpassword=$_POST['password'];


//Checking if the user already exists
$sql_email="select * from  bus_admin where ad_email='$email' or ad_staffno='$stud_num';";
$sql_res=mysqli_query($conn,$sql_email) or die(mysqli_error($conn));
if(mysqli_num_rows($sql_res)>0)
{

         $_SESSION['message'] = "Account exists";
          $_SESSION['msg_type'] = "danger";
           echo "<script>location.replace('admin_signUp.php');</script>";
          exit();

}//Inserting on the database
else
{
     if(!preg_match("/^[a-zA-Z\s]+$/",$name))
       {
         $_SESSION['message'] = "Incorrect name format";
          $_SESSION['msg_type'] = "danger";

           $_SESSION['FirstName']=$name;
           $_SESSION['LastName']= $surname;
           $_SESSION['Email']=$email;
           $_SESSION['stuNum']=$stud_num;


         echo "<script>location.replace('admin_signUp.php');</script>";
          exit();
       }

       if(!preg_match("/^[a-zA-Z\s]+$/",$surname))
       {
         $_SESSION['message'] = "Incorrect surname format";
          $_SESSION['msg_type'] = "danger";


            $_SESSION['FirstName']=$name;
           $_SESSION['LastName']= $surname;
           $_SESSION['Email']=$email;
           $_SESSION['stuNum']=$stud_num;


          echo "<script>location.replace('admin_signUp.php');</script>";
          exit();
       }



      // if (!preg_match('/^([a-zaA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/',$email))
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
       {
         $_SESSION['message'] = "Incorrect email format";

           $_SESSION['FirstName']=$name;
           $_SESSION['LastName']= $surname;
           $_SESSION['Email']=$email;
           $_SESSION['stuNum']=$stud_num;
           $_SESSION['Gender']=$gender;

          $_SESSION['msg_type'] = "danger";
           echo "<script>location.replace('admin_signUp.php');</script>";
          exit();
       }
        if (!preg_match("/^[0-9]{9}+$/",$stud_num))
       {
         $_SESSION['message'] = "Staff number has to be 9 numberic digits and no non-numeric characters allowed";
          $_SESSION['msg_type'] = "danger";

            $_SESSION['FirstName']=$name;
           $_SESSION['LastName']= $surname;
           $_SESSION['Email']=$email;
           $_SESSION['stuNum']=$stud_num;


         echo "<script>location.replace('admin_signUp.php');</script>";
          exit();
       }

      if( $password==$cpassword)
       {
       //$date =date("dd mmm yyyy");
       //$date = date("dd/mm/yyy");
       $password=password_hash($password,PASSWORD_DEFAULT);
     $sql="INSERT INTO bus_admin(ad_name,ad_surname,ad_staffno,ad_email,
            ad_campus,ad_password)
       VALUES ('$name','$surname','$stud_num','$email','$campus','$password');";
       $run_query= mysqli_query($conn,$sql);
        echo "<script>alert('Bus Admin $name successfully registered;) ');</script>";
       echo "<script>location.replace('admin_interface.php');</script>";
       exit();
       }
else
{
 $_SESSION['message'] = "passwords did not match";
  $_SESSION['msg_type'] = "danger";
  echo "<script>location.replace('admin_signUp.php');</script>";
  exit();
}

}
}



        ?>
    </div>
</body>
</html>
