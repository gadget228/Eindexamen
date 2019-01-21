<?php
include '../Include/db.php';
session_start();

$Kemail = $_POST['KEmail'];
$KAanspraak = $_POST['Aanspraak'];
$KVnaam =  $_POST['KVnaam'];
$KAnaam = $_POST['KAnaam'];
$KStraat = $_POST['KStraat'];
$KHnr = $_POST['Khnr'];
$KPostc = $_POST['KPcd'];
$KWoonP = $_POST['KStad'];

$sql = "INSERT INTO klant(KEmail,KVnaam,KAnaam,KStraat,Khnr,KPostc,Kwp,KAanspraak) VALUES('$Kemail','$KVnaam','$KAnaam','$KStraat','$KHnr','$KPostc','$KWoonP','$KAanspraak')";

if (mysqli_query($conn, $sql)){
    $_SESSION['KlantADD'] = "1";
    $_SESSION['KEmail'] = $Kemail;
    $_SESSION['KAanspraak'] = $KAanspraak;
    $_SESSION['KVnaam'] = $KVnaam;
    $_SESSION['KAnaam'] = $KAnaam;
    $_SESSION['KStraat'] = $KStraat;
    $_SESSION['Khnr'] = $KHnr;
    $_SESSION['KPcd'] = $KPostc;
    $_SESSION['KStad'] = $KWoonP;
    header("Location:../Pages/Offerte.php");
}
else{
    echo "Errors: " . $sql . "<br>" . mysqli_error($conn);
}

?>