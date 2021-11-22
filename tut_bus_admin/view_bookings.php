
<?php
 include_once '../database/dbConn.php';
 session_start();  //session carry data to the page
 $id = $_SESSION['id'];
 $name = $_SESSION['name'];
 $surname = $_SESSION['surname'];
$email = $_SESSION['email'];
$staff_num = $_SESSION['staff_number'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Account</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin_dashboard/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../Assets/bootstrap.min.css">
  <link rel="stylesheet" href="../Assets/styles.css">
     <link href="../Assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <script src="../Scripts/jquery-3.3.1.min.js"></script>
  <script src="../Scripts/scripts.js"></script>
     <link rel="shortcut icon" href="../images/logo3.jpeg" type="image/x-icon">
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

      	<th scope="col">Trip</th>
        <th scope="col">Time</th>
        <th scope="col">Date of booking the trip</th>
        <th scope="col">Total Number of students</th>


      </tr>
    </thead>
    <tbody>
    <?php


    $sql="SELECT st_id, st_start_and_destination,st_time,st_date, COUNT(*) AS 'tot_trips'
  FROM seat_reservation
  GROUP BY st_start_and_destination,st_time
  ORDER BY st_time DESC;";
    $result=mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);


    if($numRows>0)
    {
    		while($row = mysqli_fetch_assoc($result))
    		{
          $countTrips=$row['tot_trips'];
        //   echo "<script>alert('logged in $countTrips');</script>";
          ?>
    		<tr>
    		<td><?php echo $row['st_start_and_destination']?></td>
        <th scope="row"><?php echo $row['st_time']?></th>
         <td><?php echo $row['st_date']?></td>
          <td><?php echo $countTrips ?> </td>
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
</div>
<br>
<div class="col-lg-3">
<a class="btn btn-primary" href="admin_interface.php"><i class="fa fa-home "></i> Home</a>
</div>
<br>
<br>
</body>
</html>
