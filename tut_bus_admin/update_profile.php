<?php
 include_once '../database/dbConn.php';
 session_start();  //session carry data to the page
 $id = $_SESSION['id'];
 $name = $_SESSION['name'];
 $surname = $_SESSION['surname'];
$email = $_SESSION['email'];
$staff_num = $_SESSION['staff_number'];

$sql="select * from bus_admin where ad_id='$id' ;";
   $results = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($results);

    $admin_name=$row['ad_name'];
    $admin_surname=$row['ad_surname'];
    $admin_number=$row['ad_staffno'];
    $admin_email=$row['ad_email'];
    $admin_campus=$row['ad_campus'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
    <link rel="shortcut icon" href="../images/logo3.jpeg" type="image/x-icon">
    <title>Admin Account</title>
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
                    <h3 class="text-center text-muted">Update Account.</h3>

                </div>
            </div>
        </div>
        <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="accForm">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>First Name(s)</label>
                <input type="text" name="FirstName" class="form-control" placeholder="First Name(s)"
                  value="<?php echo  $admin_name ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="LastName" class="form-control" placeholder="Last name"
                 value="<?php echo  $admin_surname ?>"  required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Admin email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email"
                value="<?php echo  $admin_email ?>"  required>

                </div>

                <div class="col-md-6 mb-3">
                    <label>Staff Number</label>
                    <input id="phnNumb" type="text" name="stuNum" class="form-control" placeholder="Staff No"
                      value="<?php echo  $admin_number ?>"  required>

                   <!-- <div class="text-danger"><b id="phnNumbError"></b></div>-->
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label> Allocated Campus</label>
                <input type="text" name="campus" class="form-control" placeholder="Campus"
                value="<?php echo  $admin_campus?>"  required>

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


        <button name="n" type="submit" class="btn btn-success">Update <i class="fa fa-check"></i></button>

  <!--  <a class="btn btn-danger" href="userlogin.php"><i class="fa fa-home "></i> Login</a>-->
          <a class="btn btn-default" href="admin_interface.php"><i class="fa fa-home "></i> Home</a>
        </form>
<?php
if (isset($_POST['n']))
{

    $name=ucwords($_POST['FirstName']);
    $surname=ucwords($_POST['LastName']);
    $admin_num=$_POST['stuNum'];
    $email=$_POST['Email'];

    $campus=$_POST['campus'];

    $password=$_POST['Password'];
    $confirmPassword=$_POST['password'];


    if(!preg_match("/^[a-zA-Z\s]+$/",$name))
      {
        $_SESSION['message'] = "Incorrect name format";
         $_SESSION['msg_type'] = "danger";

          $_SESSION['FirstName']=$name;
          $_SESSION['LastName']= $surname;
          $_SESSION['Email']=$email;
          $_SESSION['stuNum']=$admin_num;


        echo "<script>location.replace('update_profile.php');</script>";
         exit();
      }

      if(!preg_match("/^[a-zA-Z\s]+$/",$surname))
      {
        $_SESSION['message'] = "Incorrect surname format";
         $_SESSION['msg_type'] = "danger";


           $_SESSION['FirstName']=$name;
          $_SESSION['LastName']= $surname;
          $_SESSION['Email']=$email;
          $_SESSION['stuNum']=$admin_num;


         echo "<script>location.replace('update_profile.php');</script>";
         exit();
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
       {
         $_SESSION['message'] = "Incorrect email format";

           $_SESSION['FirstName']=$name;
           $_SESSION['LastName']= $surname;
           $_SESSION['Email']=$email;
           $_SESSION['stuNum']=$admin_num;


          $_SESSION['msg_type'] = "danger";
           echo "<script>location.replace('update_profile.php');</script>";
          exit();
       }
        if (!preg_match("/^[0-9]{9}+$/",$admin_num))
       {
         $_SESSION['message'] = "Student number has to be 9 numberic digits and no non-numeric characters allowed";
          $_SESSION['msg_type'] = "danger";

            $_SESSION['FirstName']=$name;
           $_SESSION['LastName']= $surname;
           $_SESSION['Email']=$email;
           $_SESSION['stuNum']=$admin_num;

         echo "<script>location.replace('update_profile.php');</script>";
          exit();
       }
       if($password == $confirmPassword)
       {
           $password=password_hash($password,PASSWORD_DEFAULT);
           $sql="UPDATE bus_admin
      SET ad_name='$name',ad_surname='$surname',ad_staffno='$admin_num',ad_email='$email',
  ad_campus='$campus',ad_password='$password'
      WHERE ad_id='$id';";
              mysqli_query($conn,$sql);
              $_SESSION['message'] = "Profile Updated ";
              $_SESSION['msg_type'] = "primary";
              echo"<script>location.replace('view_profile.php')</script>";
       }
       else
       {
         $_SESSION['message'] = "passwords did not match";
          $_SESSION['msg_type'] = "danger";
          echo "<script>location.replace('update_profile.php');</script>";
          exit();
       }
}
?>
    </div>
</body>
</html>
