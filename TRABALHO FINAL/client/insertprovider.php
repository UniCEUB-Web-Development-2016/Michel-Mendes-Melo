<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/provider/?name=".$_POST['name']."&tradename=".$_POST['tradename']."&phone=".$_POST['phone']."&addres=".$_POST['addres']."&cep=".$_POST['cep'].
											"&city=".$_POST['city']."&cnpj=".$_POST['cnpj'];

$response = \Httpful\Request::post($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Cadastrado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=insertprovider.html">';
exit;