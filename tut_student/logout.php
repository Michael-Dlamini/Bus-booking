<?php
session_start();
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['name']);


echo "<script>alert('Successfully logged out');</script>";
echo "<script>location.replace('../index.php');</script>";
exit();
?>