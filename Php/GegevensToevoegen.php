<?php
session_start();
include '../Include/db.php';

$KlantEmail = $_SESSION['KEmail'];
echo $KlantEmail;

$sql = "SELECT * FROM klant WHERE KEmail = '$KlantEmail'";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );
echo $row['KID'];

$GebID = $_SESSION['GebruikerID'];
$FacNaam = $_POST['FacNaam'];
$Facnum = $_POST['Facnum'];
$FDate =  $_POST['FDate'];
$Ref = $_POST['Ref'];
$FvvDate = $_POST['FvvDate'];
$KID = $row['KID'];

$sql = "INSERT INTO offerte(OffID,OffRef,OffDate,OffVVDate,OffNaam,KID,GebID) VALUES('$Facnum','$Ref','$FDate','$FvvDate','$FacNaam','$KID','$GebID')";

if (mysqli_query($conn, $sql)){
    $_SESSION['FacNaam'] = $FacNaam;
    $_SESSION['Facnum'] = $Facnum;
    $_SESSION['FDate'] = $FDate;
    $_SESSION['Ref'] = $Ref;
    $_SESSION['FvvDate'] = $FvvDate;
    $_SESSION['FacADD'] = "1";
    header("Location:../Pages/Offerte.php");
}
else{
    echo "Errors: " . $sql . "<br>" . mysqli_error($conn);
}
?>