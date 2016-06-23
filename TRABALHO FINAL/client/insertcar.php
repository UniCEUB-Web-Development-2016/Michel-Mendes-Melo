<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/car/?licensePlate=".$_POST['licensePlate']."&client=".$_POST['client']."&model=".$_POST['model']."&color=".$_POST['color']."&year=".$_POST['year']."&renavam=".$_POST['renavam'] . "&chassi=".$_POST['chassi'];

$response = \Httpful\Request::post($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Cadastrado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=insertcar.html">';
exit;