<?php
session_start();
include '../Include/db.php';

$ExcDate = $_POST['ExcDate'];
$ProdDesc =  $_POST['ProdDesc'];
$Aantal = $_POST['Aantal'];
$KStraat = $_POST['KStraat'];
$Prijs = $_POST['Prijs'];
$BTW = $_POST['BTW'];

$sql = "";
?>