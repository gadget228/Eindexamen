<?php
session_start();
include '../Include/db.php';

$GebID = $_POST['GebID'];

$sql="UPDATE gebruikersinfo
SET GebPermision = '1'
WHERE GebruikerID = '$GebID'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header("Location:../Pages/AdminPagina.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>