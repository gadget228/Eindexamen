<?php
session_start();
include '../Include/db.php';
$ID = $_SESSION['GebruikerID'];
$sql = "SELECT * FROM gebruikersinfo WHERE GebruikerID ='$ID'";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );

 

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
'.
$OffID = $_SESSION['Offnum'];
  $sqlProd = "SELECT * FROM product WHERE OfferteID = '$OffID'";
  mysqli_select_db($conn, $database);
      $resultProd = mysqli_fetch_array($conn, $sqlProd);
      echo "Sql error: " . $sqlProd . "<br>" . mysqli_error($conn);
      
      for($i = 0; $i < count($resultProd); $i++) {
        $row = $resultProd[$i];
        $Bedrag = $row['PPrijs'] / 100 * ($row['PBTW'] + 100);
        echo '
          <tr>
            <th scope="row">'.$row['ExcDate'].'</th>
            <td>'.$row['PNaam'].'</td>
            <td>'.$row['PAantal'].'</td>
            <td>€'.$row['PPrijs'].'</td>
            <td>'.$row['PBTW'].'</td>
            <td>€'.$Bedrag.'</td>
          </tr>
        ';
      }
      // $i = 0;
      // while ($rowProd = mysqli_fetch_array($resultProd)) {
      //   // $i++;
        
      //   // $Bedrag = $rowProd['PPrijs'] / 100 * ($rowProd['PBTW'] + 100);
      //   // echo '
      //   //   <tr>
      //   //     <th scope="row">'.$rowProd['ExcDate'].'</th>
      //   //     <td>'.$rowProd['PNaam'].'</td>
      //   //     <td>'.$rowProd['PAantal'].'</td>
      //   //     <td>€'.$rowProd['PPrijs'].'</td>
      //   //     <td>'.$rowProd['PBTW'].'</td>
      //   //     <td>€'.$Bedrag.'</td>
      //   //   </tr>
      //   // ';
      //   echo $rowProd;
      // }
      // echo $i;
      mysqli_free_result($resultProd);
'
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

</style>
<title>'.$_SESSION['OffNaam'].'</title>
<h1>'.$_SESSION['OffNaam'].'</h1>
<div class="row">
<p class="alignleft"> Aan: '.$_SESSION['KVnaam'].' '.$_SESSION['KAnaam'].'</br>'.
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
';  // can aso be a url, starting with http..


 
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