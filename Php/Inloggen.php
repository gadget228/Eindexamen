<?php
session_start();
include '../Include/db.php';


$Email = $_POST['Email'];
$Pass =  hash('sha512', $_POST['Pass']);

$SQL = "SELECT * FROM gebruiker WHERE Gebemail ='$Email' AND Gebpass = '$Pass'";
$_SESSION['ID'] = $Email;
mysqli_select_db($conn, $database);
$result = mysqli_query($conn, $SQL);
$count = mysqli_num_rows($result);
    mysqli_fetch_assoc($result);
    
    if ($count == "1")
    {
        $_SESSION['Email'] = $Email;
        header("Location: ../Pages/Offerte.php");
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