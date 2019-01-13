<?php
session_start();
include '../Include/db.php';

$ID = $_SESSION['GebruikerID'];
$sql = "SELECT * FROM gebruikersinfo WHERE GebruikerID ='$ID'";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Offerte pagina</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</head>
    <html>
    <style>
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php
echo '
<title>'.$_SESSION['FacNaam'].'</title>
<h1>'.$_SESSION['FacNaam'].'</h1>
<div class="row">
<div class="col-md-4"> Aan: '.$_SESSION['KVnaam'].' '.$_SESSION['KAnaam'].'</br>'.
$_SESSION['KStraat'].' '.$_SESSION['Khnr'].'</br>'.
$_SESSION['KPcd'].'</br>'.
$_SESSION['KStad'].'
<br>
<br>
<br>
Offerte nummer: '.$_SESSION['Facnum'].'<br>
Offerte datum: '.$_SESSION['FDate'].'<br>
Referentie: '.$_SESSION['Ref'].'<br>
Offerte verval datum: '.$_SESSION['FvvDate'].'<br>

</div>
<div class="col-md-4">
</div>
<div class="col-md-4">
Bedrijf: Elst Klusbedrijf<br>
Straat: '.$row['GebStraat'].' '.$row['GebHnr'].'<br>
Postcode: '.$row['GebPostc'].' '.$row['GebWoonP'].' <br>
Nederland <br>
<br>
<br>
Teloofnummer: '.$row['GebTelnummer'].' <br>
Email: '.$_SESSION['ID'].' <br>
<br>
<br>
Kvk: '.$row['GebKvk'].'<br>
Iban: '.$row['GebIban'].'<br>
</div>
</div>
';
?>
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Datum</th>
      <th scope="col">Omschrijving</th>
      <th scope="col">Aantal</th>
      <th scope="col">Prijs</th>
      <th scope="col">BTW</th>
      <th scope="col">Bedrag</th>
    </tr>
  </thead>
  <tbody>
<?php
$OffID = $_SESSION['Facnum'];
$sqlProd = "SELECT * FROM product WHERE OfferteID = '$OffID'";
mysqli_select_db($conn, $database);
		$resultProd = mysqli_query($conn, $sqlProd);
		
		if (!$resultProd) {
			die('SQL Error: ' . mysqli_error($conn));
		}
		
		while ($rowProd = mysqli_fetch_array($resultProd)) {
   
   $Bedrag = $rowProd['PPrijs'] / 100 * ($rowProd['PBTW'] + 100);
      echo '
    <tr>
      <th scope="row">'.$rowProd['ExcDate'].'</th>
      <td>'.$rowProd['PNaam'].'</td>
      <td>'.$rowProd['PAantal'].'</td>
      <td>€'.$rowProd['PPrijs'].'</td>
      <td>'.$rowProd['PBTW'].'</td>
      <td>€'.$Bedrag.'</td>
    ';
    }

?>
  </tbody>
</table>
</div>
</html>
