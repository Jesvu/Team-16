<?php
$json=isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user=tarkistaJson($json))){
    print "Tayta kaikki kentat";
    exit;
}
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "pizzeria");
}
catch(Exception $e){
    print "Yhteysvirhe";
    exit;
}

$sql="insert into users (username, password) values(?, SHA2(?, 256))";//sama kuin SHA2(?, 0)
try{
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user->username, $user->password);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    print $json;
}
catch(Exception $e){
    print "Tunnus jo olemassa tai muu virhe!";
}
?>


<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $user=json_decode($json, false);
    if (empty($user->username) || empty($user->password)){
        return false;
    }
    return $user;
}
?>