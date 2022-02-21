<?php
session_start();
if (!isset($_SESSION["users"])){
    
    exit;
}
print "<h2>Olet kirjautuneena nimellä: ".$_SESSION["users"]."!</h2>";
?>

<a href='../feedback.html'>Leave feedback</a>
<a href='logout.php'>Log out</a>
