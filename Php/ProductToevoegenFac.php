<?php
session_start();
include '../Include/db.php';

$OfferteNum= $_SESSION['Facnum'];
$GebID = $_SESSION['GebruikerID'];
$ExcDate = $_POST['ExcDate'];
$ProdDesc =  $_POST['ProdDesc'];
$Aantal = $_POST['Aantal'];
$Prijs = $_POST['Prijs'];
$BTW = $_POST['BTW'];

$sql = "INSERT INTO product(PNaam, PPrijs, PBTW, ExcDate, GEBID, FactuurID, PAantal) VALUES('$ProdDesc','$Prijs','$BTW','$ExcDate','$GebID','$OfferteNum','$Aantal')";

if (mysqli_query($conn, $sql)){
    $_SESSION['ProdADDED'] = "1";
    header("Location:../Pages/Factuur.php");
}
else{
    echo "Sql error: " . $sqlProd . "<br>" . mysqli_error($conn);
}
?>