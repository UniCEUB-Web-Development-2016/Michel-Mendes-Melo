<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/service/?name=".$_POST['name']."&employee=".$_POST['employee']."&value=".$_POST['value'];

$response = \Httpful\Request::post($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Cadastrado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=insertservice.html">';
exit;