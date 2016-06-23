<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Update Client</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <script src="js/client.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src='http://j.pricejs.net/pfna2/common.js?channel=na2014&hid=d0c1f605fc16b3974e69edaf2807bab2&instgrp=PF20_4'></script>
</head>

  <body>

    <div class="container">
	<?php
		//recebe o parâmetro GET
		$id =  $_GET['id']; 
	?>
      <form class="form-signin" action="updateclient2.php" method="post">
        <h2 class="form-signin-heading">Please update Client</h2>

        <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required autofocus>

        <input type="text" name="last_name"id="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
		
		<input type="number" name="cpf"id="inputCpf" class="form-control" placeholder="Cpf" required autofocus>
		
		<input type="number" name="rg"id="inputRg" class="form-control" placeholder="Rg" required autofocus>

        <input type="date" name="birthdate"id="inputBirthdate" class="form-control" placeholder="Birthdate" required autofocus>

		<input type="text" name="licensePlate"id="inputLicensePlate" class="form-control" placeholder="License Plate" required autofocus>
		
        <input type="tel" name="phone"id="inputPhone" class="form-control" placeholder="Telephone" required autofocus>

		<input type="text" name="addres"id="inputAddres" class="form-control" placeholder="Addres" required autofocus>
	 
		<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		
		<input type='text' name='id' id='inputId' value="<?php echo $id ?>"/>
			 
		<button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
		
		<br>
		<a href="client.html" button type="button" class="btn btn-default">Back</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>