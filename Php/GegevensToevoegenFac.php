<?php
session_start();
include '../Include/db.php';

$KlantEmail = $_SESSION['KEmail'];
echo $KlantEmail;

$sql = "SELECT * FROM klant WHERE KEmail = '$KlantEmail'";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );
echo $row['KID'];

$random = date("Ymd");
$random2 = rand(0, 100000);


$GebID = $_SESSION['GebruikerID'];
$FacNaam = $_POST['FacNaam'];
$Facnum = $random."-".$random2;
$FDate =  $_POST['FDate'];
$Ref = $_POST['Ref'];
$FvvDate = $_POST['FvvDate'];
$KID = $row['KID'];

$sql = "INSERT INTO factuur(FactuurID,FacRef,FDate,FVVDate,FNaam,KID,GebID) VALUES('$Facnum','$Ref','$FDate','$FvvDate','$FacNaam','$KID','$GebID')";

if (mysqli_query($conn, $sql)){
    $_SESSION['FacNaam'] = $FacNaam;
    $_SESSION['Facnum'] = $Facnum;
    $_SESSION['FDate'] = $FDate;
    $_SESSION['FRef'] = $Ref;
    $_SESSION['FvvDate'] = $FvvDate;
    $_SESSION['FacADD'] = "1";
    header("Location:../Pages/Factuur.php");
}
else{
    echo "Errors: " . $sql . "<br>" . mysqli_error($conn);
}
?>