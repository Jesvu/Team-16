<?php 
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $pNumber = $_POST['pNumber'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   if (empty($email) || empty($pNumber) || empty($subject)
      empty($message)){
         header("Location:../index.html");
         exit;
      }
   //Valitaan vastaanottajan sposti
   $to = "jesse21008@student.hamk.fi";
   //Tekstikentän tiedot, mitä lähetetään
   $headers = "From: " .$email;
   $txt = "Sender Phonenumber: " .$pNumber.
            "\nMessage: " .$message;
   //spostin lähetys
   mail($to, $subject, $txt, $headers);
   //Takaisin pääsivulle
   header("Location:../index.html"); 
}
?>