<?php
session_start();
include '../Include/db.php';
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Admin pagina</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  color: #5e5d52;
}

a {
  color: #337aa8;
}
a:hover, a:focus {
  color: #4b8ab2;
}

.container {
  margin: 5% 3%;
}
@media (min-width: 48em) {
  .container {
    margin: 2%;
  }
}
@media (min-width: 75em) {
  .container {
    margin: 2em auto;
    max-width: 75em;
  }
}

.responsive-table {
  width: 100%;
  margin-bottom: 1.5em;
  border-spacing: 0;
}
@media (min-width: 48em) {
  .responsive-table {
    font-size: .9em;
  }
}
@media (min-width: 62em) {
  .responsive-table {
    font-size: 1em;
  }
}
.responsive-table thead {
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  /* IE6, IE7 */
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}
@media (min-width: 48em) {
  .responsive-table thead {
    position: relative;
    clip: auto;
    height: auto;
    width: auto;
    overflow: auto;
  }
}
.responsive-table thead th {
  background-color: #1d96b2;
  border: 1px solid #1d96b2;
  font-weight: normal;
  text-align: center;
  color: white;
}
.responsive-table thead th:first-of-type {
  text-align: left;
}
.responsive-table tbody,
.responsive-table tr,
.responsive-table th,
.responsive-table td {
  display: block;
  padding: 0;
  text-align: left;
  white-space: normal;
}
@media (min-width: 48em) {
  .responsive-table tr {
    display: table-row;
  }
}
.responsive-table th,
.responsive-table td {
  padding: .5em;
  vertical-align: middle;
}
@media (min-width: 30em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em .5em;
  }
}
@media (min-width: 48em) {
  .responsive-table th,
  .responsive-table td {
    display: table-cell;
    padding: .5em;
  }
}
@media (min-width: 62em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em .5em;
  }
}
@media (min-width: 75em) {
  .responsive-table th,
  .responsive-table td {
    padding: .75em;
  }
}
.responsive-table caption {
  margin-bottom: 1em;
  font-size: 1em;
  font-weight: bold;
  text-align: center;
}
@media (min-width: 48em) {
  .responsive-table caption {
    font-size: 1.5em;
  }
}
.responsive-table tfoot {
  font-size: .8em;
  font-style: italic;
}
@media (min-width: 62em) {
  .responsive-table tfoot {
    font-size: .9em;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody {
    display: table-row-group;
  }
}
.responsive-table tbody tr {
  margin-bottom: 1em;
}
@media (min-width: 48em) {
  .responsive-table tbody tr {
    display: table-row;
    border-width: 1px;
  }
}
.responsive-table tbody tr:last-of-type {
  margin-bottom: 0;
}
@media (min-width: 48em) {
  .responsive-table tbody tr:nth-of-type(even) {
    background-color: rgba(94, 93, 82, 0.1);
  }
}
.responsive-table tbody th[scope="row"] {
  background-color: #1d96b2;
  color: white;
}
@media (min-width: 30em) {
  .responsive-table tbody th[scope="row"] {
    border-left: 1px solid #1d96b2;
    border-bottom: 1px solid #1d96b2;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody th[scope="row"] {
    background-color: transparent;
    color: #5e5d52;
    text-align: left;
  }
}
.responsive-table tbody td {
  text-align: right;
}
@media (min-width: 48em) {
  .responsive-table tbody td {
    border-left: 1px solid #1d96b2;
    border-bottom: 1px solid #1d96b2;
    text-align: center;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody td:last-of-type {
    border-right: 1px solid #1d96b2;
  }
}
.responsive-table tbody td[data-type=currency] {
  text-align: right;
}
.responsive-table tbody td[data-title]:before {
  content: attr(data-title);
  float: left;
  font-size: .8em;
  color: rgba(94, 93, 82, 0.75);
}
@media (min-width: 30em) {
  .responsive-table tbody td[data-title]:before {
    font-size: .9em;
  }
}
@media (min-width: 48em) {
  .responsive-table tbody td[data-title]:before {
    content: none;
  }
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>
    <html>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin pagina</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Offerte.php">Offerte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Factuur.php">Factuur</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Overzicht.php">Overzicht </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="AdminPagina.php">Admin Pagina <span class="sr-only">(current)</span></a>
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
<div class="container">
    <h1> Gebruikers </h1>
  <table class="responsive-table">
    
    <thead>
      <tr>
        <th scope="col">Gebruiker naam</th>
        <th scope="col">Gebruikers straat</th>
        <th scope="col">Gebruikers postcode</th>
        <th scope="col">Gebruikers email</th>
        <th scope="col">Gebruikers telefoon nummer</th>
        <th scope="col">Gebruiker toestaan?</th>
      </tr>
    </thead>
    <tbody>
    <?php
       $ID = $_SESSION['ID'];
       $sql = "SELECT * FROM gebruiker,gebruikersinfo WHERE gebruiker.GebruikerID = gebruikersinfo.GebruikerID
       AND GebPermision = 0";
       
       mysqli_select_db($conn, $database);
               $result = mysqli_query($conn, $sql);
               
               if (!$result) {
                   die('SQL Error: ' . mysqli_error($conn));
               }
               
		
		while ($row = mysqli_fetch_array($result)) {
            echo'
            <tr>
            <td data-title="Offerte Naam">'.$row['GebVNaam'].' '.$row['GebANaam'].'</td>
            <td data-title="Offerte Naam">'.$row['GebStraat'].' '.$row['GebHnr'].'</td>
            <td data-title="Offerte Naam">'.$row['GebPostc'].' '.$row['GebWoonP'].'</td>
            <td data-title="Offerte Naam">'.$row['Gebemail'].'</td>
            <td data-title="Offerte Naam">'.$row['GebTelnummer'].'</td>
            <form method="POST" action="../Php/GebruikerToevoegen.php">
            <td data-title="Gebruikers-ID" style="display:none;"><input type="text" name="GebID" style="display:none;" value="'.$row['GebruikerID'].'"./></td>
            <td data-title="Download"><button class="btn btn-primary" type="submit">Voeg gebruiker toe</button></td>
            </form>
            </tr>
            ';
        }
        ?>
      
    </tbody>
  </table>
</div>