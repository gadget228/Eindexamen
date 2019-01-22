<?php
session_start();
include '../Include/db.php';

$ID = $_SESSION['GebruikerID'];
$sql = "SELECT * FROM gebruikersinfo,gebruiker WHERE gebruiker.GebruikerID ='$ID'
AND gebruikersinfo.GebruikerID = gebruiker.GebruikerID";
mysqli_select_db($conn, $database);
$row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );

$KlantnaamLength = strlen($_SESSION['FacKVnaam']);
$Firstletter = $KlantnaamLength - 1;

$FACTUURID = $_SESSION['Facnum'];
?>
<!DOCTYPE html>
<?php
$to=$row['Gebemail'];
$subject=$_SESSION['FacNaam'];
// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: <'.$row['Gebemail'].'>';
$headers[] = 'From: OfferteFactuur@outlook.nl';
$message='
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
        
                            
                            <td>
                                Factuur nummer: '.$_SESSION['Facnum'].'<br>
                                Factuur datum: '.$_SESSION['FDate'].'<br>
                                Referentie: '.$_SESSION['FRef'].'<br>
                                Factuur vervaldatum: '.$_SESSION['FvvDate'].'
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Bedrijf: Elst Klusbedrijf<br>
                                Straat: '.$row['GebStraat'].' '.$row['GebHnr'].'<br>
                                Postcode: '.$row['GebPostc'].' '.$row['GebWoonP'].' <br>
                                Nederland <br>
                                <br>
                                Teloofnummer: '.$row['GebTelnummer'].' <br>
                                Email: '.$_SESSION['ID'].' <br>
                                Kvk: '.$row['GebKvk'].'<br>
                                BTW Nummer: '.$row['GebBTWNr'].'<br>
                                Iban: '.$row['GebIban'].'<br>
                            </td>
                            
                            <td>
                            Aan: '.$_SESSION['FacKAanspraak'].' '.substr($_SESSION['FacKVnaam'], 0, -$Firstletter).'. '.$_SESSION['FacKAnaam'].'</br>
                            Straat: '.$_SESSION['FacKStraat'].' '.$_SESSION['FacKhnr'].'</br>
                            Postcode: '.$_SESSION['FacKPcd'].' '.$_SESSION['FacKStad'].'</br>
                            Nederland
                            
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Datum
                </td>
                
                <td>
                    Omschrijving
                </td>
                
                <td>
                   Aantal
                </td>

                <td>
                    Prijs
                </td>

                <td>
                    BTW
                </td>

                <td>
                    Bedrag
                </td>
            </tr>
            
            <tr class="item">
            </tr>
            ';$FacID = $_SESSION['Facnum'];
            $sqlProd = "SELECT * FROM product WHERE FactuurID = '$FacID'";
            mysqli_select_db($conn, $database);
                $resultProd = mysqli_query($conn, $sqlProd);
                
                if (!$resultProd) {
                  die('SQL Error: ' . mysqli_error($conn));
                }
                $totaal = 0;
                while ($rowProd = mysqli_fetch_array($resultProd)) {
               
               $Bedrag = $rowProd['PPrijs'] * $rowProd['PAantal'] / 100 * ($rowProd['PBTW'] + 100);
                  $message.='
                <tr class="item">
                  <td>'.$rowProd['ExcDate'].'</th>
                  <td>'.$rowProd['PNaam'].'</td>
                  <td>'.$rowProd['PAantal'].'</td>
                  <td>&euro;'.$rowProd['PPrijs'].'</td>
                  <td>'.$rowProd['PBTW'].'</td>
                  <td>&euro;'.number_format($Bedrag, 2, ',', '.').'</td>
                  </tr>
                ';
                $totaal += $Bedrag;
                }
            
            $message .='
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> Subtotaal:</td>
                <td>
                 &euro;'.number_format($totaal, 2, ',', '.').'
                </td>
            </tr> 
            </table>
            <br>
            <br>
            <br>
            <p>
            Wij verzoeken u vriendelijk het verschuldigde bedrag voor de verval datum van de offerte over te maken naar onze IBAN: <br>
              '.$row['GebIban'].'  ten name van  Elst Klusbedrijf  onder vermelding van factuurnummer
            </p>
    </div>
</body>
</html>';
            $fulltotaal = $totaal / 100 * 121;
         /*   $message .='
            <tr class="total">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td> Totaal:</td>
            <td>
             &euro;'.number_format($fulltotaal, 2, ',', '.').'
            </td>
            </tr>
       
'; */
if(mail($to, $subject, $message, implode("\r\n", $headers)))
{
  $_SESSION['MailSend'] = "1";
  $sqlUP = "UPDATE factuur SET FPrijs='$fulltotaal' WHERE FactuurID = '$FACTUURID'";

  if (mysqli_query($conn, $sqlUP)) {
      header("Location:../Pages/Factuur.php");
      echo "Mail send";
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
}
else{
  echo "Er is een probleem opgetreden";
}
?>