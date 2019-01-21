<?php
   session_start();
   include '../Include/db.php';
   $email = $_SESSION['ID'];
   $sql = "SELECT * FROM gebruiker WHERE Gebemail = '$email'";
   mysqli_select_db($conn, $database);
   $row = mysqli_fetch_assoc( mysqli_query($conn,$sql) );
   $_SESSION['GebruikerID'] = $row['GebruikerID'];
   if (!isset($_SESSION['GebruikerID']))
   {
     echo "asergdfuinpajodfgpiuadsnvfpiasduonfpasoDU:fn asdp;ikgfjhn adpiouvfnaspdoiudv";
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../css/util.css">
	   <link rel="stylesheet" type="text/css" href="../css/main.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <title>Offerte pagina</title>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   </head>
   <html>
      <nav class="navbar navbar-expand-lg navbar-light" style="background: white;">
         <a class="navbar-brand" href="#" style="font-family: Raleway-Black;">Offerte Pagina</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="Offerte.php">Offerte <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="Factuur.php">Factuur</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="Overzicht.php">Overzicht</a>
               </li>
            </ul>
            <span class="nav-item">
            <?php
               $ID = $_SESSION['ID'];
               $sql = "SELECT * FROM gebruiker,gebruikersinfo WHERE gebruiker.Gebemail = '$ID'
               AND gebruiker.GebruikerID = gebruikersinfo.GebruikerID";
               
               mysqli_select_db($conn, $database);
               		$result = mysqli_query($conn, $sql);
               		
               		if (!$result) {
               			die('SQL Error: ' . mysqli_error($conn));
               		}
               		
               		while ($row = mysqli_fetch_array($result)) {
                     echo '<span class="nav-link">  '.$row['GebVNaam'].' '.$row['GebANaam'].'</span>
               				';
                   }
               
                      ?>
            </span>
            <span class="nav-item">
    <a class="btn btn-primary" href="../Php/logout.php">
    logout
  </a>
         </div>
      </nav>
      <div class="container-login100">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <h1>Klant toevoegen</h1>
               </br>
               <form method="POST" class="klant-form" id="KlantADD" action="../Php/KlantToevoegen.php">
                  <div class="form-group">
                     <input type="email" class="form-control" id="KlantEmail" aria-describedby="KlantEmail" placeholder="Klant email" name="KEmail">
                     <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
                  <div class="form-group">
                  <select class="form-control" id="exampleFormControlSelect1" name="Aanspraak">
                   <option value="De heer">De heer</option>
                   <option value="Mevrouw">Mevrouw</option>
                  </select>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantVn" aria-describedby="KlantVn" placeholder="Voornaam" name="KVnaam">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantAn" aria-describedby="KlantAn" placeholder="Achternaam" name="KAnaam">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantPc" aria-describedby="KlantPc" placeholder="Postcode" name="KPcd">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantStn" aria-describedby="KlantStn" placeholder="Straatnaam" name="KStraat">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantHnr" aria-describedby="KlantHnr" placeholder="Huisnummer" name="Khnr">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantWP" aria-describedby="KlantWP" placeholder="Stad" name="KStad">
                  </div>
                  <button type="submit" form="KlantADD" value="Submit" class="btn btn-primary">Klant toevoegen</button>
               </form>
            </div>
            <div class="col-md-4">
               <h1>Offerte gegevens</h1>
               </br>
               <form method="POST" class="Factuur-form" id="FactuurADD" action="../Php/GegevensToevoegen.php">
                  <div class="form-group">
                     <input type="text" class="form-control" id="FacNaam" aria-describedby="FacNaam" placeholder="Offerte Naam" name="FacNaam">
                  </div>
                  <div class="form-group">
                     <input type="date" class="form-control" id="KlantVn" aria-describedby="KlantVn" placeholder="Offerte datum" name="FDate">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="KlantAn" aria-describedby="KlantAn" placeholder="Referentie" name="Ref">
                  </div>
                  <div class="form-group">
                     <input type="date" class="form-control" id="KlantPc" aria-describedby="KlantPc" placeholder="Offerte verval datum" name="FvvDate">
                  </div>
                  <button type="submit" form="FactuurADD" value="Submit" class="btn btn-primary">Gegevens toevoegen</button>
               </form>
            </div>
            <div class="col-md-4">
               <h1>Product toevoegen</h1>
               </br>
               <form method="POST" class="Product-form" id="ProductADD" action="../Php/ProductToevoegen.php">
                  <div class="form-group">
                     <input type="date" class="form-control" id="ExcDate" aria-describedby="ExcDate" placeholder="Datum uitvoeren opdracht" name="ExcDate">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="ProdDesc" aria-describedby="ProdDesc" placeholder="Product Omschrijving" name="ProdDesc">
                  </div>
                  <div class="form-group">
                     <input type="number" class="form-control" id="Aantal" aria-describedby="Aantal" placeholder="Aantal" name="Aantal">
                  </div>
                  <div class="form-group">
                     <input type="number" class="form-control" id="Prijs" aria-describedby="Prijs" placeholder="Prijs" name="Prijs">
                  </div>
                  <div class="form-group">
                     <input type="number" class="form-control" id="BTW" aria-describedby="BTW" placeholder="BTW" name="BTW">
                  </div>
                  <button type="submit" form="ProductADD" value="Submit" class="btn btn-primary">Product toevoegen</button>
               </form>
            </div>
         </div>
      </div>
      <div id="htmlTableId">
         <form method="POST" action="../Php/Pdfgenerator2.php">
            <div class="row">
               <div class="col-md-4">
                  <?php
                     $KlantnaamLength = strlen($_SESSION['KVnaam']);
                     $Firstletter = $KlantnaamLength - 1;
                     echo 
                     $_SESSION['KEmail'].'</br>'.
                     $_SESSION['KAanspraak'].' '.substr($_SESSION['KVnaam'], 0, -$Firstletter).'. '.$_SESSION['KAnaam'].'</br>'.
                     $_SESSION['KStraat'].' '.$_SESSION['Khnr'].'</br>'.
                     $_SESSION['KPcd'].'</br>'.
                     $_SESSION['KStad'];
                     ?>
               </div>
               <div class="col-md-4">
               </div>
               <div class="col-md-4 text-right">
                  <?php
                     echo
                     $_SESSION['OffNaam'].'</br>'.
                     $_SESSION['Offnum'].'</br>'.
                     $_SESSION['OffDate']. '</br>'.
                     $_SESSION['Ref']. '</br>'.
                     $_SESSION['OffvvDate']. '</br>';
                     ?>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Datum</th>
                           <th scope="col">Omschrijving</th>
                           <th scope="col">Aantal</th>
                           <th scope="col">Prijs per stuk</th>
                           <th scope="col">BTW</th>
                           <th scope="col">Totaal bedrag</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $OffID = $_SESSION['Offnum'];
                           $sqlProd = "SELECT * FROM product WHERE OfferteID = '$OffID'";
                           mysqli_select_db($conn, $database);
                           		$resultProd = mysqli_query($conn, $sqlProd);
                           		
                           		if (!$resultProd) {
                           			die('SQL Error: ' . mysqli_error($conn));
                           		}
                           		
                           		while ($rowProd = mysqli_fetch_array($resultProd)) {
                              
                              $Bedrag = $rowProd['PPrijs'] * $rowProd['PAantal'] / 100 * ($rowProd['PBTW'] + 100);
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
               <button class="login100-form-btn" type="submit">Generate pdf</button>
         </form>
         </div>
         <div class="col-md-2"></div>
      </div>
                              </div>
   
      </body>
   </html>
   `