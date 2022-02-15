<?php
session_start();
if (!isset($_SESSION["users"])){
    header("Location:../login.html");
    exit;
}
print "<h2>Tervetuloa, ".$_SESSION["users"]."!</h2>";
?>
<form>
feedback: <input type="text" name="feedback" style="height:30px; width" placeholder="feedback..."><br>
</form>
<a href='kirjauduulos.php'>Kirjaudu ulos</a>
