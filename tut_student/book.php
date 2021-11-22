<?php
 include_once '../database/dbConn.php';
 session_start();  //session carry data to the page

 $id = $_SESSION['id'];
 $name = $_SESSION['name'];
 $surname = $_SESSION['surname'];
 $email = $_SESSION['email'];
 $stud_num = $_SESSION['student_number'];
 $gender = $_SESSION['gender'];
 $faculty = $_SESSION['faculty'];

 $sql="select * from tut_student where stu_id='$id' ;";
    $results = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($results);

     $stu_name=$row['stu_name'];
     $stu_surname=$row['stu_surname'];
     $stu_number=$row['stu_number'];
     $stu_email=$row['stu_email'];
     $stu_gender=$row['stu_gender'];
     $stu_campus=$row['stu_faculty'];



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
    <title>Student Account</title>
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
                  <h3 class="text-center text-muted">Book a Trip  <i class="fa fa-bus" aria-hidden="true"></i></h3>

                </div>
            </div>
        </div>
        <form action="book_validate.php" method="POST" enctype="multipart/form-data" class="accForm">


          <div class="form-row">
              <div class="col-md-6 mb-3">
                  <i class="fa fa-user" aria-hidden="true"></i>
              <label>Student Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name"
            readonly value="<?php echo   $stu_name ?>"   required>

            <input type="hidden" name="id" class="form-control" placeholder="Name"
          readonly value="<?php echo   $id ?>"   required>
              </div>
          </div>


                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        <label>Student Surname</label>
                        <input type="text" name="surname" class="form-control" placeholder="number"
                      readonly value="<?php echo  $stu_surname ?>"   required>
                        </div>
                    </div>

          <div class="form-row">
              <div class="col-md-6 mb-3">
                  <i class="fa fa-user" aria-hidden="true"></i>
              <label>Student Number</label>
              <input type="text" name="stuNum" class="form-control" placeholder="number"
            readonly value="<?php echo  $stu_number ?>"   required>
              </div>
          </div>

          <div class="form-row">
              <div class="col-md-6 mb-3">
                <i class="fa fa-user" aria-hidden="true"></i>
              <label>Student Email</label>
              <input type="email" name="Email" class="form-control" placeholder="Email"
            readonly value="<?php echo  $stu_email ?>"   required>
              </div>
          </div>



            <div class="form-row">
                <div class="col-md-6 mb-3">
                  <i class="fa fa-bus" aria-hidden="true"></i>
                <label>PickUp Point</label>

                  <select  name="startpoint" class="form-control"  required >
                      <option value="">Choose start point</option>
                      <option value="Sosha South">Sosha South</option>
                      <option value="Sosha North">Sosha North</option>
                      <option value="Arcadia Campus">Arcadia Campus</option>
                      <option value="Pretoria Campus">Pretoria Campus</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3">
                    <i class="fa fa-bus" aria-hidden="true"></i>
                <label>Drop off</label>
                <select  name="destination" class="form-control"  required >
                      <option value="">Choose destination</option>
                      <option value="Sosha South">Sosha South</option>
                      <option value="Sosha North">Sosha North</option>
                      <option value="Arcadia Campus">Arcadia Campus</option>
                      <option value="Pretoria Campus">Pretoria Campus</option>

                  </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <label>Time</label>
              <select  name="time" class="form-control"  required >
                        <option value="">choose Time</option>
                        <option value="07:00">07:00</option>
                                   <option value="07:30">07:30</option>
                                   <option value="08:00">08:00</option>
                                   <option value="08:30">08:30</option>
                                   <option value="09:00">09:00</option>
                                   <option value="09:30">09:30</option>
                                   <option value="10:00">10:00</option>
                                   <option value="10:30">10:30</option>
                                   <option value="11:00">11:00</option>
                                   <option value="11:30">11:30</option>
                                   <option value="12:00">12:00</option>
                                   <option value="12:30">12:30</option>
                                   <option value="13:00">13:00</option>
                                   <option value="13:30">13:30</option>
                                   <option value="14:00">14:00</option>
                                   <option value="14:30">14:30</option>
                                   <option value="15:00">15:00</option>
                                   <option value="15:30">15:30</option>
                                   <option value="16:00">16:00</option>
                                   <option value="16:30">16:30</option>
                                   <option value="17:00">17:00</option>
                                   <option value="17:30">17:30</option>
                                   <option value="18:00">18:00</option>
                                   <option value="18:30">18:30</option>
                                   <option value="19:00">19:00</option>
                                   <option value="19:30">19:30</option>
                                   <option value="20:00">20:00</option>
                                   <option value="20:30">20:30</option>
                    </select>
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

     <input  name="submit_reservation" class="btn btn-success" type="submit" value="Place reservation"/>
         <!--  <a class="btn btn-danger" href="userlogin.php"><i class="fa fa-home "></i> Login</a>-->
             <a class="btn btn-primary" href="book_view.php"><i class="fa fa-eye "></i> Bookings</a>
          <a class="btn btn-primary" href="student_interface.php"><i class="fa fa-home "></i> Home</a>
            <!--<button type="submit" name="submit">Submit</button>   id="seekerCompanySameSubmitBtnId"-->
        </form>
    </div>
  </body>
  </html>
