<?php
// Point to where you downloaded the phar
include('httpful.phar');

$url = "http://localhost/oficina/employee/?name=".$_POST['name']."&last_name=".$_POST['last_name']."&cpf=".$_POST['cpf']."&rg=".$_POST['rg']."&birthdate=".$_POST['birthdate'].
														"&phone=".$_POST['phone']."&addres=".$_POST['addres']."&category=".$_POST['category']."&salary=".$_POST['salary'];

$response = \Httpful\Request::post($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Cadastrado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=insertemployee.html">';
exit;
