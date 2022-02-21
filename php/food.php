<?php
$json = isset($_POST["menu"]) ? $_POST["menu"] : "";

//Tarkistetaan, onko kentät täytetty
if(!($menu=checkJson($json))){
    print "Fill everything!";
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
//Testataan tietokantayhteyttä
try{
    $yhteys=mysqli_connect("db", "root", "password", "pizzeria");
}
catch(Exception $e){
    print "Error!";
    exit;
}

//sql-lause
$sql="insert into menu(name, food) values(?, ?)";
//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'ss', $menu->name, $menu->food);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
print "Thank you for suggestion!";
//Funktio, joka tarkistaa onko kaikki tiedot täytetty

function checkJson($json){
    if (empty($json)){
        return false;
    }
    $menu=json_decode($json, false);
    if (empty($menu->name) || empty($menu->food)){
        return false;
    }
    return $menu;
}