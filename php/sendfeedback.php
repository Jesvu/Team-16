<?php
session_start();
if (!isset($_SESSION["users"])){
    header("Location:../login.html");
    exit;
}
print "<h2>Kiitos palautteesta, ".$_SESSION["users"]."!</h2>";
?>

<?php 
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $pNumber = $_POST['pNumber'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   if (empty($email) || empty($pNumber) || empty($subject) || empty($message)){
         
         exit;
      }
   //Valitaan vastaanottajan sposti
   $to = "taneli21000@student.hamk.fi";
   //Tekstikentän tiedot, mitä lähetetään
   $headers = "From: " .$email;
   $txt = "Sender Phonenumber: " .$pNumber.
            "\nMessage: " .$message;
   //spostin lähetys
   mail($to, $subject, $txt, $headers);
}
?>

<?php
echo'<a href="logout.php">Log out</a>';
?>