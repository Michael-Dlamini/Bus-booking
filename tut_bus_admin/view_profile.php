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
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <h3 class="text-center text-muted">View Account.</h3>

                </div>
            </div>
        </div>
        <form action="view_profile.php" method="POST" enctype="multipart/form-data" class="accForm">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>First Name(s)</label>
                <input type="text" name="FirstName" class="form-control" placeholder="First Name(s)"
                readonly  value="<?php echo  $admin_name ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="LastName" class="form-control" placeholder="Last name"
              readonly   value="<?php echo  $admin_surname ?>"  required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Admin email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email"
            readonly    value="<?php echo  $admin_email ?>"  required>

                </div>

                <div class="col-md-6 mb-3">
                    <label>Staff Number</label>
                    <input id="phnNumb" type="text" name="stuNum" class="form-control" placeholder="Staff No"
                    readonly  value="<?php echo  $admin_number ?>"  required>

                   <!-- <div class="text-danger"><b id="phnNumbError"></b></div>-->
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label> Allocated Campus</label>
                <input type="text" name="campus" class="form-control" placeholder="Campus"
              readonly  value="<?php echo  $admin_campus?>"  required>

                </div>
            </div>
                <br>
          <!--  <input  name="submit_signup_user" class="btn btn-success" type="submit" value="Done"/>-->
         <!--  <a class="btn btn-danger" href="userlogin.php"><i class="fa fa-home "></i> Login</a>-->
          <a class="btn btn-success" href="admin_interface.php"><i class="fa fa-home "></i> Home</a>
            <a class="btn btn-primary" href="update_profile.php">Update Profile <i class="fa fa-check "></i> </a>
            <!--<button type="submit" name="submit">Submit</button>   id="seekerCompanySameSubmitBtnId"-->
        </form>
    </div>
</body>
</html>
