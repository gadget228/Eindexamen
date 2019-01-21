<?php
session_start();
include '../Include/db.php';

$ID = $_SESSION['GebruikerID'];
$sql = "SELECT * FROM gebruikersinfo,gebruiker WHERE gebruiker.GebruikerID ='$ID'
AND gebruikersinfo.GebruikerID = gebruiker.GebruikerID";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );

$KlantnaamLength = strlen($_SESSION['KVnaam']);
$Firstletter = $KlantnaamLength - 1;
?>
<!DOCTYPE html>
<?php
$to=$row['Gebemail'];
$subject=$_SESSION['OffNaam'];
// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Bastiaan <'.$row['Gebemail'].'>';
$headers[] = 'From: Birthday Reminder <birthday@example.com>';
$message='
<html>
	<head>
        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <title>'.$_SESSION['OffNaam'].'</title>
        
	</head>
    <html>
    <style>
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
<style>
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
table {
  border-collapse: collapse;
}
.table {
  width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}
.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .table {
  background-color: #fff;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-borderless th,
.table-borderless td,
.table-borderless thead th,
.table-borderless tbody + tbody {
  border: 0;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-primary,
.table-primary > th,
.table-primary > td {
  background-color: #b8daff;
}

.table-primary th,
.table-primary td,
.table-primary thead th,
.table-primary tbody + tbody {
  border-color: #7abaff;
}

.table-hover .table-primary:hover {
  background-color: #9fcdff;
}

.table-hover .table-primary:hover > td,
.table-hover .table-primary:hover > th {
  background-color: #9fcdff;
}

.table-secondary,
.table-secondary > th,
.table-secondary > td {
  background-color: #d6d8db;
}

.table-secondary th,
.table-secondary td,
.table-secondary thead th,
.table-secondary tbody + tbody {
  border-color: #b3b7bb;
}

.table-hover .table-secondary:hover {
  background-color: #c8cbcf;
}

.table-hover .table-secondary:hover > td,
.table-hover .table-secondary:hover > th {
  background-color: #c8cbcf;
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #c3e6cb;
}

.table-success th,
.table-success td,
.table-success thead th,
.table-success tbody + tbody {
  border-color: #8fd19e;
}

.table-hover .table-success:hover {
  background-color: #b1dfbb;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #b1dfbb;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #bee5eb;
}

.table-info th,
.table-info td,
.table-info thead th,
.table-info tbody + tbody {
  border-color: #86cfda;
}

.table-hover .table-info:hover {
  background-color: #abdde5;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #abdde5;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #ffeeba;
}

.table-warning th,
.table-warning td,
.table-warning thead th,
.table-warning tbody + tbody {
  border-color: #ffdf7e;
}

.table-hover .table-warning:hover {
  background-color: #ffe8a1;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #ffe8a1;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f5c6cb;
}

.table-danger th,
.table-danger td,
.table-danger thead th,
.table-danger tbody + tbody {
  border-color: #ed969e;
}

.table-hover .table-danger:hover {
  background-color: #f1b0b7;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #f1b0b7;
}

.table-light,
.table-light > th,
.table-light > td {
  background-color: #fdfdfe;
}

.table-light th,
.table-light td,
.table-light thead th,
.table-light tbody + tbody {
  border-color: #fbfcfc;
}

.table-hover .table-light:hover {
  background-color: #ececf6;
}

.table-hover .table-light:hover > td,
.table-hover .table-light:hover > th {
  background-color: #ececf6;
}

.table-dark,
.table-dark > th,
.table-dark > td {
  background-color: #c6c8ca;
}

.table-dark th,
.table-dark td,
.table-dark thead th,
.table-dark tbody + tbody {
  border-color: #95999c;
}

.table-hover .table-dark:hover {
  background-color: #b9bbbe;
}

.table-hover .table-dark:hover > td,
.table-hover .table-dark:hover > th {
  background-color: #b9bbbe;
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table .thead-dark th {
  color: #fff;
  background-color: #212529;
  border-color: #32383e;
}

.table .thead-light th {
  color: #495057;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.table-dark {
  color: #fff;
  background-color: #212529;
}

.table-dark th,
.table-dark td,
.table-dark thead th {
  border-color: #32383e;
}

.table-dark.table-bordered {
  border: 0;
}

.table-dark.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(255, 255, 255, 0.05);
}

.table-dark.table-hover tbody tr:hover {
  background-color: rgba(255, 255, 255, 0.075);
}

@media (max-width: 575.98px) {
  .table-responsive-sm {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }
  .table-responsive-sm > .table-bordered {
    border: 0;
  }
}

@media (max-width: 767.98px) {
  .table-responsive-md {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }
  .table-responsive-md > .table-bordered {
    border: 0;
  }
}

@media (max-width: 991.98px) {
  .table-responsive-lg {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }
  .table-responsive-lg > .table-bordered {
    border: 0;
  }
}

@media (max-width: 1199.98px) {
  .table-responsive-xl {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }
  .table-responsive-xl > .table-bordered {
    border: 0;
  }
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive > .table-bordered {
  border: 0;
}
.center {
  margin: auto;
  width: 50%;
  text-align: center;
}
</style>

<h1>'.$_SESSION['OffNaam'].'</h1>
<p class="alignleft"> Aan: '.$_SESSION['KAanspraak'].' '.substr($_SESSION['KVnaam'], 0, -$Firstletter).'. '.$_SESSION['KAnaam'].'</br>'.
$_SESSION['KStraat'].' '.$_SESSION['Khnr'].'</br>'.
$_SESSION['KPcd'].'</br>'.
$_SESSION['KStad'].'
<br>
<br>
<br>
Offerte nummer: '.$_SESSION['Offnum'].'<br>
Offerte datum: '.$_SESSION['OffDate'].'<br>
Referentie: '.$_SESSION['Ref'].'<br>
Offerte verval datum: '.$_SESSION['OffvvDate'].'<br>

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
BTW Nummer: '.$row['GebBTWNr'].'<br>
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
<div class="center">
Geachte '.$_SESSION['KAanspraak'].' '.substr($_SESSION['KVnaam'], 0, -$Firstletter).'. '.$_SESSION['KAnaam'].', </br>
</br>
Hierbij ontvangt u van ons een vrijblijvende prijsopgave voor het leveren van onderstaande producten en diensten.
</div>
<div class="row">
<div class="col-md-2">
</div>
<div class="center">
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
'.
$OffID = $_SESSION['Offnum'];
$sqlProd = "SELECT * FROM product WHERE OfferteID = '$OffID'";
mysqli_select_db($conn, $database);
		$resultProd = mysqli_query($conn, $sqlProd);
		
		if (!$resultProd) {
			die('SQL Error: ' . mysqli_error($conn));
		}
		
		while ($rowProd = mysqli_fetch_array($resultProd)) {
   
   $Bedrag = $rowProd['PPrijs'] * $rowProd['PAantal'] / 100 * ($rowProd['PBTW'] + 100);
      $message.='
    <tr>
      <th scope="row">'.$rowProd['ExcDate'].'</th>
      <td>'.$rowProd['PNaam'].'</td>
      <td>'.$rowProd['PAantal'].'</td>
      <td>€'.$rowProd['PPrijs'].'</td>
      <td>'.$rowProd['PBTW'].'</td>
      <td class="count-me">'.$Bedrag.'</td>
    ';
    }
'
<tr>
<th scope="row" style="display:none;">'.$rowProd['ExcDate'].'</th>
      <td style="display:none;">'.$rowProd['PNaam'].'</td>
      <td style="display:none;">'.$rowProd['PAantal'].'</td>
      <th style="">Subtotaal</td>
      <td style=""></td>
      <td><a href="" class="btn werk" id="myPopover" data-content="Je heb te weinig uren ingevoerd voor vandaag.">
		<p id="result">#</p>
                                    </a></td>
</tr>
<tr>
<th>Eindtotaal</th>
<td>
  <a href="" class="btn werk" id="myPopover" data-content="Je heb te weinig uren ingevoerd voor vandaag.">
		<p id="result">#</p>
  </a> 
</td>
<td>
  <p id="btw">#</p>
</td>                             
</tr>
  </tbody>
</table>
</div>
</html>
<script>
                      	var total = 0.0;
                    		$(".count-me").each(function () {
                    			val = parseFloat($(this).html());
                    			if (val > 0) {
                    				total += val;
                    			}
                    		});

                        $("#result").html(parseFloat(total).toFixed(2));
</script>
';
mail($to, $subject, $message, implode("\r\n", $headers));
?>