<?php
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: sender@sender.com" . "\r\n";
mail("you@yourdomain.com","test subject","test body",$headers);
?>