<?php 
if(isset($_POST['submit']) && $_POST['submit'] = ""){
   
   $email = $_POST['email'];
   $pNumber = $_POST['pNumber'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   
    $to = "jessevuorela@hotmail.com"; // this is your Email address
    $headers = "From: " .$email;

   mail($to, $subject, $message, $headers);
   header("Location: ../index.html");
}
?>