<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/client/?id=".$_GET['id'];

$response = \Httpful\Request::delete($url)->send();
//var_dump($response);
echo "<script type='text/javascript'>window.alert('Deletado com sucesso!');</script>";
echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=selectclient.html">';
exit;