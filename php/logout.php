<?php include ('db.php') ?>
<?php session_start();

unset($_SESSION['Email']);
unset($_SESSION['Name']);
unset($_SESSION['logged_in']);
header('location: ../login.html');

?>