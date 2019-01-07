<?php
session_start();

if($_SESSION['Bad_Login'] == "1")
{
echo '
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
	  <h4 class="modal-title">Foute Login</h4>
	</div>
	<div class="modal-body">
	  <p>U heeft de foute inlog gegevens ingevuld.</p>
	</div>
	<div class="modal-footer">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
  </div>
</div>
</div>
';
  $_SESSION['Bad_Login'] = "0";
}
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link href="../css/custom.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Inlog pagina</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</head>
    <html>
<div class="login-page">
  <div class="form">
    <form method="POST" class="register-form" id="Register" action="../Php/Register.php">
      <input type="text" placeholder="E-mail" name="email"/>
      <input type="password" placeholder="Wachtwoord" name="password"/>
      <input type="text" placeholder="Voornaam" name="Vnaam"/>
      <input type="text" placeholder="Achternaam" name="Anaam"/>
      <input type="text" placeholder="Straat" name="Straat"/>
      <input type="text" placeholder="Huisnummer" name="Hnr"/>
      <input type="text" placeholder="Postcode" name="Postc"/>
      <input type="text" placeholder="Woonplaats" name="WoonP"/>
      <button type="submit" form="Register" value="Submit">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
   
    <form class="login-form" method="POST" id="login" action="../Php/Inloggen.php">
      <input type="text" placeholder="E-mail" name="Email"/>
      <input type="password" placeholder="password" name="Pass"/>
      <button type="submit" form="login" value="Submit">login</button>
    <p class="message">Not registered? <a href="#" class="Create">Create an account</a></p>
    </form>
     
  </div>
</div>  


<script>
    
    $(document).ready(function(){        
	$('#myModal').modal('show');
	 }); 

            $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

            </script>
</html>