<?php
include '../Include/db.php';
session_start();

$email = $_POST['email'];
$ww =  hash('sha512', $_POST['password']);
$Vnaam = $_POST['Vnaam'];
$Anaam = $_POST['Anaam'];
$Straat = $_POST['Straat'];
$Hnr = $_POST['Hnr'];
$Postc = $_POST['Postc'];
$WoonP = $_POST['WoonP'];
$Kvk = $_POST['KvK'];
$Iban = $_POST['Iban'];

$sql = "INSERT INTO gebruiker(Gebemail,Gebpass) VALUES('$email','$ww')";
$sql2 = "INSERT INTO gebruikersinfo(GebVNaam,GebANaam,GebStraat,GebHnr,GebPostc,GebWoonP,GebKvk,GebIban) VALUES('$Vnaam','$Anaam','$Straat','$Hnr','$Postc','$WoonP','$Kvk','$Iban')";

if (mysqli_query($conn, $sql)) {
    echo "sql1 is goed";
} 
else {
    echo "Errors: " . $sql . "<br>" . mysqli_error($conn);
}
if (mysqli_query($conn, $sql2))
    {
    echo "New record created successfully";
    $_SESSION['Register'] = "1";
    header("Location:../Pages/inlog.php");
    }
    else{
        echo "Errors: " . $sql . "<br>" . mysqli_error($conn);
    }
 if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) /*OR ($a >= 1)*/)
     {
         echo "Your email is not valid or already exists!";
     //    echo $a;
     }
     else
     {
         return true;      
     }
?>