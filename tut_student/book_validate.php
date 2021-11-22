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

if(isset($_POST['submit_reservation']))
{
  $st_student_surname=$_POST['surname'];
  $stu_number=$_POST['stuNum'];
  $stu_id=$_POST['id'];
  $startPoint=$_POST['startpoint'];
  $destination=$_POST['destination'];
  $time=$_POST['time'];

   if($time >= "07:00" && $time<"21:30")
   {
       if($startPoint != $destination)
       {
         $student_trip=  $startPoint." To ".$destination;

         $sql=" select * from seat_reservation where st_student_id ='$stu_id' AND st_time='$time';";
         $results=mysqli_query($conn,$sql);
         $number_of_rows=mysqli_num_rows($results);

           if($number_of_rows>0)
           {
             $_SESSION['message'] = "Sorry you already booked a trip for that time";
             $_SESSION['msg_type'] = "danger";
            echo "<script>location.replace('book.php');</script>";
            exit();
           }
           else
           {
             // Arcadia
                if (substr($time,-2) =="30"&& $startPoint == "Arcadia Campus"&&  $destination=="Sosha North")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
             echo "<script>location.replace('book.php');</script>";
                 exit();
                }
                elseif(substr($time,-2) =="30"&& $startPoint == "Sosha North"&&  $destination=="Arcadia Campus")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
                   echo "<script>location.replace('book.php');</script>";
                 exit();
                }

                //Arcadia
                if (substr($time,-2) =="30"&& $startPoint == "Arcadia Campus"&&  $destination=="Sosha South")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
             echo "<script>location.replace('book.php');</script>";
                 exit();
                }
                elseif(substr($time,-2) =="30"&& $startPoint == "Sosha South"&&  $destination=="Arcadia Campus")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
                  echo "<script>location.replace('book.php');</script>";
                 exit();
                }

                //Pretoria To North
                if (substr($time,-2) =="30"&& $startPoint == "Pretoria Campus"&&  $destination=="Sosha North")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
               echo "<script>location.replace('book.php');</script>";
                 exit();
                }
                elseif(substr($time,-2) =="30"&& $startPoint == "Sosha North"&&  $destination=="Pretoria Campus")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
              echo "<script>location.replace('book.php');</script>";
                 exit();
                }

                //Pretoria To South
                if (substr($time,-2) =="30"&& $startPoint == "Pretoria Campus"&&  $destination=="Sosha South")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
           echo "<script>location.replace('book.php');</script>";
                 exit();
                }
                elseif(substr($time,-2) =="30"&& $startPoint == "Pretoria Campus"&&  $destination=="Arcadia Campus")
                {
                  $_SESSION['message'] = "Sorry Long distance are booked hourly i.e 12:00,13:00,14:00";
                  $_SESSION['msg_type'] = "danger";
              echo "<script>location.replace('book.php');</script>";
                 exit();
                }

                //Moving to the database
                 $current_date=date('D jS \ M Y ');
                $sql=" INSERT INTO seat_reservation(st_student_surname,st_student_id,st_student_number,st_start_and_destination,st_time,st_date)
                VALUES('$st_student_surname','$stu_id','$stu_number','$student_trip','$time','$current_date');";
                $excute=mysqli_query($conn,$sql);
                $_SESSION['message'] = "Trip $student_trip Booked on '$current_date'at $time Be at the bus terminal";
                $_SESSION['msg_type'] = "success";
               echo "<script>location.replace('book.php');</script>";
               exit();
           }
       }
       else
       {
         $_SESSION['message'] = "You cannot book a trip from the same location to the same location i.e $startPoint To $destination ";
         $_SESSION['msg_type'] = "danger";
       echo "<script>location.replace('book.php');</script>";
        exit();
       }

   }
}
?>
