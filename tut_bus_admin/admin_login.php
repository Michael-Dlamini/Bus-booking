<?php
 include_once '../database/dbConn.php';
 session_start();  //session carry data to the page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
    <link rel="shortcut icon" href="../images/logo3.jpeg" type="image/x-icon">
    <title>Bus Admin SignIn</title>
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
                    <h3 class="text-center text-muted">Bus Admin login.</h3>

                </div>
            </div>
        </div>
        <form action="admin_login.php" method="POST" enctype="multipart/form-data" class="accForm">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Staff Number</label>
                <input type="text" name="username" class="form-control" placeholder="Staff No"
                value="<?php
          if (!empty($_SESSION['em'])) {
                echo $_SESSION['em'];
                unset($_SESSION['em']);
          }
        ?>"required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="password" name="userpass" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <?php

                       if (isset($_SESSION['message'])): ?>
                       <div class="alert alert-<?=$_SESSION['msg_type']?>">

                         <?php
                             echo $_SESSION['message'];
                             unset($_SESSION['message']);
                         ?>
                     </div>
                   <?php endif ?>
                   <br>
            <input  name="submit_form" class="btn btn-danger" type="submit" value="Submit"/>

             <a class="btn btn-default" href="../index.php"><i class="fa fa-home "></i> Home</a>
            <!--<button type="submit" name="submit">Submit</button>   id="seekerCompanySameSubmitBtnId"-->
        </form>
        <?php

if (isset($_POST['submit_form']))
{

	$username=strtolower($_POST['username']);
	$password=$_POST['userpass'];
	 //echo "<script>alert('logged in $username');</script>";
	//Getting data from the database
  if (!preg_match("/^[0-9]{9}+$/",$username))
    {
      $_SESSION['message'] = "No characters allowed only numeric digits ";
       $_SESSION['msg_type'] = "danger";

       $_SESSION['em']=$username;


 echo "<script>location.replace('admin_login.php');</script>";
       exit();
    }
  else

{



	$statement=$conn->prepare("select * from bus_admin where ad_staffno=?");
	$statement->bind_param("s",$username);
	$statement->execute();

	$statement_result=$statement->get_result();
	if($statement_result->num_rows >0 )
	{
		$data=$statement_result->fetch_assoc();
		$hashpassword=$data['ad_password'];
		$login_username2=$data['ad_email'];
        $login_username=$data['ad_staffno'];
		if(password_verify($password,$hashpassword))
		{
		 $_SESSION['name'] = $data['ad_name'];
		 $name = $_SESSION['name'];

		  $_SESSION['id'] = $data['ad_id'];
		 $id = $_SESSION['id'];

		  $_SESSION['surname'] = $data['ad_surname'];
		 $surname = $_SESSION['surname'];

		   $_SESSION['email'] = $data['ad_email'];
		 $email = $_SESSION['email'];


		  $_SESSION['staff_number'] = $data['ad_staffno'];
		  $staff_num = $_SESSION['staff_number'];


         /*
         Sessions to take
           $id = $_SESSION['id'];
           $name = $_SESSION['name'];
           $surname = $_SESSION['surname'];
          $email = $_SESSION['email'];
          $staff_num = $_SESSION['student_number'];

         */



  		 $_SESSION['ad_campus'] = $data['ad_campus'];
		  $campus = $_SESSION['ad_campus'];

		      echo "<script>alert('logged in $name');</script>";
              echo "<script>location.replace('admin_interface.php');</script>";

		}
		else
		{
			 $_SESSION['message'] = "passwords did not match";
            $_SESSION['msg_type'] = "danger";
             $_SESSION['em'] = $login_username;
           echo "<script>location.replace('admin_login.php');</script>";
            exit();
		}
	}
	else {
		// code...

	     $_SESSION['message'] = "Account  does not exist";
            $_SESSION['msg_type'] = "danger";

            echo "<script>location.replace('admin_login.php');</script>";
            exit();
					}
}
}
?>

    </div>
</body>
</html>
