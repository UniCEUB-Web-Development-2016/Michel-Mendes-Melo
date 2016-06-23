<?php
// Point to where you downloaded the phar
include('httpful.phar');


$url = "http://localhost/oficina/car/?".$_POST['tipo']."=".$_POST['text'];

$response = \Httpful\Request::get($url)->send();
//var_dump($response);
include'selectcar.html';

$request_response = json_decode($response, true);
foreach($request_response as $p){
				echo "<center>";
				echo "<TABLE BORDER=2>";
				echo "<tr>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['licensePlate'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['client'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['model'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['color'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['year'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['renavam'] . "</td>";
				echo "<TD ALIGN=MIDDLE WIDTH=200>" . $p['chassi'] . "</td>";
				echo "<td><a href='updatecar.php?id=" . $p ['id']. "'>Alterar</a></td>";
				echo "<td><a href='deletecar.php?id=" . $p ['id']. "'>Deletar</a></td>";
				echo "<tr>";
			}