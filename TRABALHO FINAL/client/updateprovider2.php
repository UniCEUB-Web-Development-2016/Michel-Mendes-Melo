<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/provider/?name=".$_POST['name']."&tradename=".$_POST['tradename']."&phone=".$_POST['phone']."&addres=".$_POST['addres']."&cep=".$_POST['cep'].
											"&city=".$_POST['city']."&cnpj=".$_POST['cnpj']."&id=".$_POST['id'];

$response = \Httpful\Request::put($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Alterado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=selectprovider.html">';
exit;