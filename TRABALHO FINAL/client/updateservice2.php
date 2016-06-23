<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/service/?name=".$_POST['name']."&employee=".$_POST['employee']."&value=".$_POST['value']."&id=".$_POST['id'];

$response = \Httpful\Request::put($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Alterado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=selectservice.html">';
exit;