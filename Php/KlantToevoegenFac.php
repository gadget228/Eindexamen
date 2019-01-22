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
    $_SESSION['FacKlantADD'] = "1";
    $_SESSION['FacKEmail'] = $Kemail;
    $_SESSION['FacKAanspraak'] = $KAanspraak;
    $_SESSION['FacKVnaam'] = $KVnaam;
    $_SESSION['FacKAnaam'] = $KAnaam;
    $_SESSION['FacKStraat'] = $KStraat;
    $_SESSION['FacKhnr'] = $KHnr;
    $_SESSION['FacKPcd'] = $KPostc;
    $_SESSION['FacKStad'] = $KWoonP;
    header("Location:../Pages/Factuur.php");
}
else{
    echo "Errors: " . $sql . "<br>" . mysqli_error($conn);
}

?>