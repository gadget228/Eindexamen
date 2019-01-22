<?php
session_start();
include '../Include/db.php';


$Email = $_POST['Email'];
$Pass =  hash('sha512', $_POST['Pass']);

$SQL = "SELECT * FROM gebruiker,gebruikersinfo WHERE gebruiker.Gebemail ='$Email' AND gebruiker.Gebpass = '$Pass'
AND gebruiker.gebruikerID = gebruikersinfo.gebruikerID";
$_SESSION['ID'] = $Email;
mysqli_select_db($conn, $database);
$result = mysqli_query($conn, $SQL);
$count = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);
    
    if ($count == "1")
    {
        if($row['GebPermision'] == "0")
        {
            $_SESSION['Bad_Login'] = "1";
            header("Location:../Pages/inlog.php");
        }
        if ($row['GebPermision'] == "1"){
            if($row['GebruikerID'] == "1")
        {
            $_SESSION['ID'] = $Email;
            header("Location: ../Pages/AdminPagina.php");
        }
        else{
        $_SESSION['ID'] = $Email;
        echo $row['GebruikerID'];
        header("Location: ../Pages/Offerte.php");
        }
        }
    }
    if ($count != "1")
    {
        $_SESSION['Bad_Login'] = "1";
        header("Location:../Pages/inlog.php");
    }
if (!$result)
{
    printf("Error: %s\n", mysqli_error($db));
    exit();
}

?>