<?php 
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $pNumber = $_POST['pNumber'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   
    $to = "jesse21008@student.hamk.fi";
    $headers = "From: " .$email;
    $txt = "Sender Phonenumber: " .$pNumber.
            "\nMessage: " .$message;

   mail($to, $subject, $txt, $headers);
   header("Location:../index.html");
}
?>