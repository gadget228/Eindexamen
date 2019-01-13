<?php
session_start();
include '../Include/db.php';
$ID = $_SESSION['GebruikerID'];
$sql = "SELECT * FROM gebruikersinfo WHERE GebruikerID ='$ID'";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );

/* $whileloop= $OffID = $_SESSION['Facnum'];
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
    };*/

$table = '
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



  </tbody>
</table>
';


$apikey = '5ee2d0da-293a-4c43-8f0b-cbc576b8b0f7';
$value = '
<style>
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<title>'.$_SESSION['FacNaam'].'</title>
<h1>'.$_SESSION['FacNaam'].'</h1>
<div class="row">
<p class="alignleft"> Aan: '.$_SESSION['KVnaam'].' '.$_SESSION['KAnaam'].'</br>'.
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

</p>
<p class="alignright">
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
</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<p>'.$table.'</p>
'; // can aso be a url, starting with http..
 
// Convert the HTML string to a PDF using those parameters.  Note if you have a very long HTML string use POST rather than get.  See example #5
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($value));
 
// Output headers so that the file is downloaded rather than displayed
// Remember that header() must be called before any actual output is sent
header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . strlen($result));
 
// Make the file a downloadable attachment - comment this out to show it directly inside the 
// web browser.  Note that you can give the file any name you want, e.g. alias-name.pdf below:
header('Content-Disposition: attachment; filename=' . 'Offerte - '.$_SESSION['KVnaam'].' '.$_SESSION['KAnaam'].'.pdf' );
 
// Stream PDF to user
echo $result;
?>