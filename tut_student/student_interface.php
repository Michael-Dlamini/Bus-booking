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

?>
<!DOCTYPE html>
<!-- Created By Michael Dlamini -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo3.jpeg" type="image/x-icon">
    <title>Student Portal</title>
    <link rel="stylesheet" href="css/style.css">
    <!--<link rel="stylesheet" href="userstyle.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <style>
.dropbtn {
 background-color:blue;
 color: white;
 padding: 10px;
 font-size: 16px;
 border: none;
 cursor: pointer;
}

.dropdown {
 position: relative;
 display: inline-block;
}

.dropdown-content {
 display: none;
 position: absolute;
 background-color: #f9f9f9;
 min-width: 160px;
 box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
 z-index: 1;
}

.dropdown-content a {
 color: black;
 padding: 12px 16px;
 text-decoration: none;
 display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
 display: block;
}

.dropdown:hover .dropbtn {
 background-color:black;
}
</style>

</head>
<body>
  <nav class="navbar">
    <div class="content">
      <div class="logo">
        <a href="#"><?php
        echo "Good day  ";
         echo  $name  ; ?></a>
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>

          <div class="dropdown">
       <li><a><button class="dropbtn">Profile</button></a></li>
       <div class="dropdown-content">
         <a href="view_profile.php">View Profile</a>
  <a href="update_profile.php">Update Profile</a>
   <!--<a href="bri.php">Update Job</a>
    <a href="delJob.php">Delete Job</a>-->
       </div>
       </div>


       <div class="dropdown">
       <li><a><button class="dropbtn">Bus</button></a></li>
       <div class="dropdown-content">
        <a href="book.php">Book</a>
          <!--<a href="jv.php">View Jobs</a>-->
          <a href="book_view.php">View Booking</a>

       </div>
       </div>
        <li><a href="logout.php">logout</a></li>

    </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
  <!--Fix the title Grad work , become part of a growing community-->
  <div class="banner"></div>
   <div class="center">
    <div class="title"></div>
    <div class="sub_title"></div>
  </div>

  <script>
    const body = document.querySelector("body");
    const navbar = document.querySelector(".navbar");
    const menuBtn = document.querySelector(".menu-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    menuBtn.onclick = ()=>{
      navbar.classList.add("show");
      menuBtn.classList.add("hide");
      body.classList.add("disabled");
    }
    cancelBtn.onclick = ()=>{
      body.classList.remove("disabled");
      navbar.classList.remove("show");
      menuBtn.classList.remove("hide");
    }
    window.onscroll = ()=>{
      this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
    }
  </script>
</body>
</html>
