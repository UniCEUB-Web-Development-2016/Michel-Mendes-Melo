<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/car/?licensePlate=".$_POST['licensePlate']."&client=".$_POST['client']."&model=".$_POST['model']."&color=".$_POST['color']."&year=".$_POST['year']."&renavam=".$_POST['renavam'] . "&chassi=".$_POST['chassi']."&id=" .$_POST['id'];

$response = \Httpful\Request::put($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Alterado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=selectcar.html">';
exit;