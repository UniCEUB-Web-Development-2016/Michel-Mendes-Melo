<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/client/?name=".$_POST['name']."&last_name=".$_POST['last_name']."&cpf=".$_POST['cpf']."&rg=".$_POST['rg']."&birthdate=".$_POST['birthdate']."&licensePlate=".$_POST['licensePlate']."&phone=".$_POST['phone']."&addres=".$_POST['addres']."&email=".$_POST['email']."&id=".$_POST['id'];

$response = \Httpful\Request::put($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Alterado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=selectclient.html">';
exit;