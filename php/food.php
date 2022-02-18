<?php
$name = isset($_POST["name"]) ? $_POST["name"] = "";
$food = isset($_POST["food"]) ? $_POST["name"] = "";
//Tarkistetaan, onko kentät täytetty
if(empty("name") || empty("food")){
    header("Location:../index.html")
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
//Testataan tietokantayhteyttä
try{
    $yhteys=mysqli_connect("db", "root", "password", "menu");
}
catch(Exception $e){
    header("Location:../index.html");
    exit;
}

//sql-lause
$sql="Insert into menu(name, food) values(?, ?)";
//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'ss', $name, $food);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
print "Thank you for suggestion!";