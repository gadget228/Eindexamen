<?php
session_start();
include '../Include/db.php';

$Facnum = $_POST['Facnum'];
$FDate =  $_POST['FDate'];
$Ref = $_POST['Ref'];
$FvvDate = $_POST['FvvDate'];

$sql = "INSERT INTO offerte(OffID,OffNaam,OffDate,OffVVDate) VALUES('$Facnum','$Ref','$FDate','$FvvDate')";

if (mysqli_query($conn, $sql)){
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