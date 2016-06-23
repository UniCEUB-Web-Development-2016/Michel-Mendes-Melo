<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/service/?".$_POST['tipo']."=".$_POST['text'];

$response = \Httpful\Request::get($url)->send();
//var_dump($response);
include'selectservice.html';

$request_response = json_decode($response, true);

foreach($request_response as $p){

				echo "<center>";
				echo "<TABLE BORDER=2>";
				echo "<tr>";
				echo "<td ALIGN=MIDDLE WIDTH=200>" . $p['name'] . "</td>";
				echo "<td ALIGN=MIDDLE WIDTH=200>" . $p['employee'] . "</td>";
				echo "<td ALIGN=MIDDLE WIDTH=200>" . $p['value'] . "</td>";
				echo "<td><a href='updateservice.php?id=" . $p ['id']. "'>Alterar</a></td>";
				echo "<td><a href='deleteservice.php?id=" . $p ['id']. "'>Deletar</a></td>";
				echo "<tr>";
			}		