<?php

require_once("db.php");

     if (isset($_POST['sub']))
        {
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $pass = mysqli_real_escape_string($conn,$_POST['pass']);
            $cpass = mysqli_real_escape_string($conn,$_POST['cpass']);
            $key = md5($pass);
            if(strlen($pass)<6)
            {
                echo "<script>alert ('Password must be greater then 6 latters')</script>";
           exit();
            }
            if ($pass==$cpass)
            {
               $query = "select * from registration where Email = '$email' ";
            $res = mysqli_query($conn, $query);
            $check = mysqli_num_rows($res);
            if ($check==1)
            {
                echo "<script>alert ('Already Registered!!')</script>";
           exit();
            }
      else{
            $query = "insert into registration (`name`, `email`, `password`) values ('$name', '$email', '$key')";
      echo $query;
            $result = mysqli_query($conn, $query);
            if ($result)
            {

                echo "<script>window.open('../index.html', '_self')</script>";
               /*$from = "divij.tripathi4@gmail.com";
               $subject = "Welcome";
               $message = "Welcome to our portal";
               mail($email, $subject, $message, $from);*/
            }
                
        }
      }
        else {
            echo "<script>alert ('Password does not match!!')</script>";
           exit();
        }
      
    
        mysqli_close();
    }
?>