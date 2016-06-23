<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/product/?name=".$_POST['name']."&value=".$_POST['value']."&category=".$_POST['category']."&amount=".$_POST['amount']."&barcode=".$_POST['barcode'];

$response = \Httpful\Request::post($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Cadastrado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=insertproduct.html">';
exit;