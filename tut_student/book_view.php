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




     if(isset($_GET['id']) && isset($_SESSION['id']))
     {
       $type = $_GET['type'];

       if ($type == "cancel")
             {
                 $id_get = $_GET['id'];
                 $sql = "DELETE FROM seat_reservation WHERE st_id = '$id_get' AND st_student_id = '$id';";
                 mysqli_query($conn,$sql);

                 $_SESSION['message'] = "Trip Successfully Cancelled";
               $_SESSION['msg_type'] = "success";

               echo "<script>location.replace('book_view.php');</script>";
               exit();

       }

     }




?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Account</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin_dashboard/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../Assets/bootstrap.min.css">
  <link rel="stylesheet" href="../Assets/styles.css">
     <link href="../Assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <script src="../Scripts/jquery-3.3.1.min.js"></script>
     <link rel="shortcut icon" href="../images/logo3.jpeg" type="image/x-icon">
  <script src="../Scripts/scripts.js"></script>
	<style>
	body{
          background: #grey;
}
</style>
</head>
<body>
  <div class="container-fluid padding">
  		 <p style="text-align:center; font-size:40px;"><i  class="icofont-bus"></i></a>Bookings</p>
        <br>
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

     <table class="table table-bordered">
    <thead>
      <tr>
        	<th scope="col">Trip#</th>
      	<th scope="col">Trip</th>
        <th scope="col">Time</th>
        <th scope="col">Date of booking the trip</th>
        <th scope="col"></th>


      </tr>
    </thead>
    <tbody>
    <?php


    $sql="SELECT * FROM seat_reservation WHERE st_student_id  ='$id'";
    $result=mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    $countTrips=0;

    if($numRows>0)
    {

    		while($row = mysqli_fetch_assoc($result))
    		{
          $countTrips=$countTrips+1;
          ?>
    		<tr>

          <td><?php echo $row['st_id']?></td>
    		<td><?php echo $row['st_start_and_destination']?></td>
        <th scope="row"><?php echo $row['st_time']?></th>
         <td><?php echo $row['st_date']?></td>
          <td> <a class='btn btn-danger' href='book_view.php?type=cancel&id=<?php echo $row['st_id']?>'>Cancel trip</a></td>

          </tr>
            <?php
        }
    }
    	else
    	{
    		echo "<td colspan='9'>No bookings found</td>";
    	}
   ?>


    </tbody>
  </table>
	</div>

  <div class="col-lg-3">
  <div class="border bg-light rounded p-4">
            <h6 class="text-center"><?php echo "Number of Trips : ".  $countTrips; ?></h6>
  </div>
</div>
<br>
<div class="col-lg-3">

  <a class="btn btn-success" href="book.php"><i class="fa fa-plus "></i> Book More Trips</a>
<a class="btn btn-primary" href="student_interface.php"><i class="fa fa-home "></i> Home</a>
</div>
<br>
<form action="book_view.php" method="post" enctype="multipart/form-data" class="accForm">

  <div class="form-row">

    <label <a class="btn btn-success" href="#"><i class="fa fa-bus  "></i></a> Soshanguve South To Soshanguve North And Vice Versa</label>
<div class="col-md-12 mb-12">
<img src="../images/saafrica2.jpeg"  style="width: 270px;height: 270px;border-radius: 8px;" id="output"/>
</div>

</div>



  <div class="form-row">

    <label <a class="btn btn-success" href="#"><i class="fa fa-bus  "></i></a> Soshanguve To Pretoria Campus And Arcadia Campus</label>
<div class="col-md-12 mb-12">
<img src="../images/amo.jpeg"  style="width: 270px;height: 270px;border-radius: 8px;" id="output"/>
</div>

</div>
<br>
<div class="form-row">
  <label <a class="btn btn-success" href="#"><i class="fa fa-bus  "></i></a> Pretoria Campus And Arcadia Campus</label>
<div class="col-md-12 mb-12">
<img src="../images/starbus.jpg"  style="width: 270px;height: 270px;border-radius: 8px;" id="output"/>
</div>
</div>
</form>
<br>

</body>
</html>
