<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php'; 
require '../PHPMailer-master/src/Exception.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webProg";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['sub'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO feedback (name, email, content) VALUES ('$name','$email','$message')";
      

    if (mysqli_query($conn, $sql)) {
     $mail = new PHPMailer(true);                             
   

      try {
        
          $mail->setFrom('contact@rentgames.com', 'RentGames');
          $mail->addAddress($_POST['email']);
          $mail->addReplyTo('contact@rentgames.com', 'RentGames');

         
          $mail->isHTML(true);                                
          $mail->Subject = 'New contact request';
          $mail->Body    = "<table border=\"1px solid black\"> <tr> <th style=\"text-align:left;padding:10px\">Name</th> <td style=\"text-align:left;padding:10px\">{$_POST['name']}</td> </tr> <tr> <th style=\"text-align:left;padding:10px\">Email ID</th> <td style=\"text-align:left;padding:10px\">{$_POST['email']}</td> </tr> <tr> <th style=\"text-align:left;padding:10px\">Message</th> <td style=\"text-align:left;padding:10px\">{$_POST['message']}</td> </tr> </table>";
          $mail->AltBody = "Name: {$_POST['name']}\nEmail ID: {$_POST['email']}\nMessage: {$_POST['message']}\n";

          $mail->send();
          
/*      
*/          echo 'Message has been sent';
            
          echo "<script>window.open('../index.html', '_self')</script>";

      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
     http_response_code(200);
     echo "New record created successfully";
    } else {
     http_response_code(400);
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);


}

?>
